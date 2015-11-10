<?php
/**
 * User: lee <ligangmingx@gmail.com>
 * Date: 15-9-21 下午4:30
 */

include_once('simple_html_dom.php');

//$target_url='http://movie.douban.com/subject/26147706/';

//$target_url = 'http://movie.douban.com/subject/25723907';

//$target_url = 'http://movie.douban.com/subject/25895276';


/*$target_url = "http://movie.douban.com/subject/2998373/?from=subject-page";
$target_url="http://movie.douban.com/subject/10827341/?from=subject-page";
$target_url="http://movie.douban.com/subject/11808948/?from=subject-page";
$target_url="http://movie.douban.com/subject/11810348/?from=subject-page";
$target_url="http://movie.douban.com/subject/4824512/?from=subject-page";
$target_url="http://movie.douban.com/subject/3769423/?from=subject-page";
$target_url="http://movie.douban.com/subject/2303163/?from=subject-page";
$target_url="http://movie.douban.com/subject/1994876/?from=subject-page";
$target_url="http://movie.douban.com/subject/1793912/?from=subject-page";
$target_url="http://movie.douban.com/subject/1891211/?from=subject-page";
$target_url="http://movie.douban.com/subject/1437339/?from=subject-page";
$target_url="http://movie.douban.com/subject/1428068/?from=subject-page";
$target_url="http://movie.douban.com/subject/1830941/?from=subject-page";
$target_url="http://movie.douban.com/subject/10727641";*/

//$target_url="movie.douban.com/subject/20415220";

$target_url=$_POST['url'];
if(!isset($target_url)){
    die();
}
//$target_url='http://movie.douban.com/subject/25881482/';
if (!preg_match("/^(http):/", $target_url)){
    $target_url = 'http://'.$target_url;
}


$doubans=explode("/",$target_url);

$douban=$doubans[4];

$html = new simple_html_dom();
$html->load_file($target_url);


$data = array();

//0 标题
$title = array();
foreach ($html->find('span[property=v:itemreviewed]') as $post) {
    $titles = $post->innertext;
}
$findme = ' ';
$pos = strpos($titles, $findme);
if($pos){
    $title[] = trim(substr($titles, 0, $pos));
    $title[] = trim(substr($titles, -(strlen($titles) - $pos)));
}else{
    $title[]=$titles;
    $title[]='';
}


//1又名
$alias = array();
$gzs = '/<span class="pl">又名:<\/span> (.*?)<br\/>/';
$rs = preg_match_all($gzs, $html, $rss);
if ($rs) {
    $a=explode('/', strip_tags($rss[1][0]));
    foreach($a as $k=>$v){
        $alias[]=trim($v);
    }
    /*foreach($aliass as $k=>$v){}*/

}

//2 标签


//3 地区
$area = array();
$gzs = '/<span class=\"pl\">制片国家\/地区:<\/span> (.*?)<br\/>/';
$rs = preg_match_all($gzs, $html, $rss);
if ($rs) {
    $a=explode('/',strip_tags($rss[1][0]));
    foreach($a as $k=>$v){
        $area[]=trim($v);
    }
}

//4 导演
$director = array();
foreach ($html->find('a[rel=v:directedBy]') as $post) {
    $director[] = $post->innertext;
}


//5 编剧
$writer = array();
$gz = "/<span class='pl'>编剧<\/span>: <span class='attrs'>(.*?)<\/span><\/span>/";
$rs = preg_match_all($gz, $html, $rss);
if ($rs) {
    $a=explode('/',strip_tags($rss[1][0]));
    foreach($a as $k=>$v){
        $writer[]=trim($v);
    }
    /*foreach ($rss[2] as $k => $v) {
        $writer[] =trim($v) ;
    }*/
}

//6 主演
$cast = array();
foreach ($html->find('a[rel=v:starring]') as $post) {
    $cast[] = $post->innertext;
}


$imdb = '';
$gzs = '/<span class="pl">IMDb链接:<\/span> <a href="(.*?)" target="_blank" rel="nofollow">(.*?)<\/a>/';
$rs = preg_match_all($gzs, $html, $rss);
if ($rs) {
    $imdb=$rss[2][0];
}


//10 豆瓣

$target_url;

//11 类型
$type = array();
foreach ($html->find('span[property=v:genre]') as $post) {
    $type[] = $post->innertext;
}


// 照片
$pic = array();
foreach ($html->find('img[rel=v:image]') as $post) {
    $pic[] = $post->src;
}

//上映时间

$datas=array();
foreach ($html->find('span[property=v:initialReleaseDate]') as $post) {
    $dates[] = $post->innertext;
}



$num = '';
foreach ($html->find('strong[property=v:average]') as $post) {
    $num = $post->innertext;
}


$data['douban'] = $douban;
$data['title'] = $title;
$data['alias'] = $alias;
$data['director'] = $director;
$data['writer'] =$writer;
$data['cast'] = $cast;
$data['area'] = $area;
$data['imdb'] = $imdb;
$data['type'] = $type;
$data['pic'] = $pic[0];
$data['num'] = (int)$num;

$data['date'] = (int)$dates[0];


echo json_encode($data);


//$gz="<span class='pl'>编剧</span>: <span class='attrs'><a href="/celebrity/1312751/">.*</a></span></span>";


$html->clear();