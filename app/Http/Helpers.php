<?php
ini_set('memory_limit', '-1');
ini_set('max_execution_time', '-1');


// function site_redirect()
// {
// 	return env("SITE_REDIRECT");
// }

// function server_name()
// {
// 	return env("SERVER_NAME");
// }
function kwPdf($kw)
{
	return url('/').'/'.permalink()['keyword-url'].'/'.str_replace(' ','_',strtolower(clear($kw))).".pdf";
}

function urlPdf($kw)
{
	$kw = str_replace(' ','_',strtolower(clear($kw))).'.pdf';
	return str_replace(' ','',$kw);
}
function sitemapx()
{
	$min = strtotime('2010-01-01');
	$max =  strtotime(date('Y-m-d'));
	$val = rand($min, $max);
	$tahun = date('Y', $val);
	$bulan =  date('m', $val);

	$doc = ['DOC','PDF','EPUB','PPT','FILE','FILES','DOCUMENT','EBOOK','EBOOKS'];
	$r =array_rand($doc,1);
	$zz =  "[".$doc[$r]."] Document Database Online Site";

	$hitungtitik = explode('.',$zz);

	$data['url'] = 'https://'.$_SERVER['SERVER_NAME'];
	$keySeparator = ['file','read','reads','online','docs','pdf','download','dir','directory','read-online'];
	$data['keyword-url'] = 'dir/'.$hitungtitik[0]; 
	$data['jumlahKeyword'] = 999;
	return $data;
}

function permalink()
{
	$min = strtotime('2010-01-01');
	$max =  strtotime(date('Y-m-d'));
	$val = rand($min, $max);
	$tahun = date('Y', $val);
	$bulan =  date('m', $val);
	$hitungtitik = explode('.',$_SERVER['SERVER_NAME']);
	$data['url'] = 'https://'.$_SERVER['SERVER_NAME'];
	$data['keyword-url'] = 'dir/'.str_replace(' ','-',$hitungtitik[0]); 
	$data['jumlahKeyword'] = 999;
	return $data;
}


function sitename()
{
	$doc = ['DOC','PDF','EPUB','PPT','FILE','FILES','DOCUMENT','EBOOK','EBOOKS'];
	$r =array_rand($doc,1);
	return "[".$doc[$r]."] Document Database Online Site";
}

// function siteurl($kw)
// {
// 	return site_redirect()."/?v=".clear($kw).".pdf";;
// }

function spin($text){
	return preg_replace_callback(
		'/{(.*?)}/',
		function($matches) { 
			return explode('|', $matches[1])
			[mt_rand(0, count(explode('|', $matches[1])) - 1)]; 
		}, 
		$text);
}



function randomPdf()
{
	$files = glob(public_path('dataSpintax').'/*.txt', GLOB_BRACE);
	$hitung = count($files);
	if($hitung != 1)
	{

		$data= rand(0,$hitung);
		$data = $files[$data];
	}
	else
	{
		$data = $files[0];
	}
	return $data;
}

function getKW()
{
	$files = glob(public_path('keywords').'/*.txt', GLOB_BRACE);
	$keywords = '';
	foreach($files as $file) {
		$keywords.=  file_get_contents($file);

	}
	return explode(PHP_EOL,$keywords);
}

function clear($teks)
{
	$filter = array('~', '`', '!', '@', '#', '$', '%', '^', '&','*','*','(',')','-','_','=','+','.','/','?','”','[','{','}',']','\\','”',';','<','>','|',':');
	$result= str_replace(' ','_',trim(str_replace($filter,' ',strtolower($teks))));
	$result = str_replace('-pdf','',$result);
	return $result;
}

function pinger( $url = '' ){
	if( empty($url) ) {
		$url = site_url( $url );
	}
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	return true;
}

function autoPing($url = '')
{	
	$minu = array(0, 10, 28, 30, 40, 50, 59);
	if( in_array(date('i'), $minu) ) 
	{
		$s = $url."/sitemap_index.xml";
		$url = "http://www.google.com/webmasters/sitemaps/ping?sitemap=".$s;
		pinger($url);
		$url = "http://www.bing.com/webmaster/ping.aspx?siteMap=".$s;
		pinger($url);
	}
}

// function get_delimiter($ref) {
// 	$search_engines = array('google.com' => 'q',
// 		'go.google.com' => 'q',
// 		'images.google.com' => 'q',
// 		'video.google.com' => 'q',
// 		'news.google.com' => 'q',
// 		'blogsearch.google.com' => 'q',
// 		'maps.google.com' => 'q',
// 		'local.google.com' => 'q',
// 		'search.yahoo.com' => 'p',
// 		'search.msn.com' => 'q',
// 		'bing.com' => 'q',
// 		'msxml.excite.com' => 'qkw',
// 		'search.lycos.com' => 'query',
// 		'alltheweb.com' => 'q',
// 		'search.aol.com' => 'query',
// 		'search.iwon.com' => 'searchfor',
// 		'ask.com' => 'q',
// 		'ask.co.uk' => 'ask',
// 		'search.cometsystems.com' => 'qry',
// 		'hotbot.com' => 'query',
// 		'overture.com' => 'Keywords',
// 		'metacrawler.com' => 'qkw',
// 		'search.netscape.com' => 'query',
// 		'looksmart.com' => 'key',
// 		'dpxml.webcrawler.com' => 'qkw',
// 		'search.earthlink.net' => 'q',
// 		'search.viewpoint.com' => 'k',
// 		'yandex.kz' => 'text',
// 		'yandex.ru' => 'text',
// 		'baidu.com' => 'wd',			
// 		'mamma.com' => 'query');
// 	$delim = false;
// 	if (isset($search_engines[$ref])) {
// 		$delim = $search_engines[$ref];
// 	} else {
// 		if (strpos('ref:'.$ref,'google'))
// 			$delim = "q";
// 		elseif (strpos('ref:'.$ref,'search.atomz.'))
// 			$delim = "sp-q";
// 		elseif (strpos('ref:'.$ref,'search.msn.'))
// 			$delim = "q";
// 		elseif (strpos('ref:'.$ref,'search.yahoo.'))
// 			$delim = "p";
// 		elseif (strpos('ref:'.$ref,'yandex'))
// 			$delim = "text";
// 		elseif (strpos('ref:'.$ref,'baidu'))
// 			$delim = "wd";	
// 		elseif (preg_match('/home\.bellsouth\.net\/s\/s\.dll/i', $ref))
// 			$delim = "bellsouth";
// 	}
// 	return $delim;
// }

// function get_terms($d) {
// 	$terms       = null;
// 	$query_array = array();
// 	$query_terms = null;
// 	$query = explode($d.'=', $_SERVER['HTTP_REFERER']);
// 	$query = explode('&', $query[1]);
// 	$query = urldecode($query[0]);
// 	$query = str_replace("'", '', $query);
// 	$query = str_replace('"', '', $query);
// 	$query_array = preg_split('/[\s,\+\.]+/',$query);
// 	$query_terms = implode(' ', $query_array);
// 	$terms = htmlspecialchars(urldecode(trim($query_terms)));
// 	return $terms;
// }

// function get_referer() {
// 	if (!isset($_SERVER['HTTP_REFERER']) || ($_SERVER['HTTP_REFERER'] == '')) return false;
// 	$referer_info = parse_url($_SERVER['HTTP_REFERER']);
// 	$referer = $referer_info['host'];
// 	if(substr($referer, 0, 4) == 'www.')
// 		$referer = substr($referer, 4);
// 	return $referer;
// }

// function GetKeyword() {
// 	$referer = get_referer();
// 	if (!$referer) return false;
// 	$delimiter = get_delimiter($referer);
// 	if( $delimiter ){
// 		$term =get_terms($delimiter);	
// 		return $term;
// 	}

// }

// function randomDate()
// {
// 	$min = strtotime('2013-01-01');
// 	$max =  strtotime(date('Y-m-d'));
// 	$val = rand($min, $max);
// 	return date('D, d M Y H:i:s', $val);
// }

// function randomDateSitemap()
// {
// 	$min = strtotime('2013-01-01');
// 	$max =  strtotime(date('Y-m-d'));
// 	$val = rand($min, $max);
// 	return date('c', $val);
// }

function Query($locale,$query){
	$query = urlencode($query);
	$agent = "AAPP Application/1.0 (Windows; U; Windows NT 5.1; de; rv:1.8.0.4)";
	$host = "http://clients1.google.com/complete/search?hl=en&output=toolbar&q=".$query;
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $host);
	curl_setopt($ch, CURLOPT_USERAGENT, $agent);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);

	$xml = curl_exec($ch);
	curl_close($ch);

	$pecah = explode('<suggestion data="',$xml);
	if(count($pecah)!=0){
		for($i=1;$i<count($pecah);$i++)
		{
			$pecahLagi = explode('"/>',$pecah[$i]);
			echo "<li><a href='http://".$_SERVER['SERVER_NAME']."/".permalink()['keyword-url']."/".urlPdf($pecahLagi[0])."'>".ucwords($pecahLagi[0])."</a></li>";
		}
	}
}

?>
