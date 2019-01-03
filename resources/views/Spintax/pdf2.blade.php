<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://ebookrich.com/inc/js/bootstrap.min.js"></script>
<link href="http://ebookrich.com/inc/fbfeed.css" rel="stylesheet">
<style>
.page-break {
    page-break-after: always;
}
.multi-column { 
  column-count: 2; -moz-column-count: 2; 
  column-gap: 1.5em; -moz-column-gap: 1.5em;
  column-fill: auto; 
  text-align: justify;
}
</style>

<?php
$url     = $_SERVER['REQUEST_URI'];
$get     = explode("/", $url);
$Keyword = str_replace("_", " ", $get[3]);
$getKeyword = str_replace(".pdf", "", $Keyword);
$getKeywordUC = urldecode(ucwords($getKeyword));
?>
<title> {{$getKeywordUC}} | {{sitename()}}</title>

<h2><u>{{sitename()}}</u></h2>
<center><h1>{{$getKeywordUC}}</h1></center>
<?php
	$start = strtotime("01 April 2017");
	$end = strtotime("27 April 2018");
	$timestamp = mt_rand($start, $end);
	$ukuran = mt_rand(999,9999);
	$kapan = mt_rand(2,59);
	$names = array( 'Christopher', 'Ryan', 'Ethan', 'John', 'Zoey', 'Sarah', 'Michelle', 'Samantha', 'Kridler', 'Lampley', 'Kral', 'Manders', 'Giancola', 'Adkison', 'Mcduffy', 'Cartier', 'Amante', 'Clark', 'Gary', 'Clore', 'Mellin', 'Falgout', 'Leone', 'Greeson', 'Bouie', 'Coppedge', 'Rutherford', 'Nuckles', 'Dixon', 'Pfaff', 'Rogue', 'Daley', 'Tonn', 'Davin', 'Vickers', 'Wohlwend', 'Houseman', 'Chowdhury');
	$nametengah = array('C', 'F', 'E', 'S', 'U', 'G', 'R', 'L', 'Y', 'M', 'T', 'P', 'O', 'J', 'K', 'N', 'X', 'Z', 'Q', 'H', 'A', 'I', 'D', 'B', 'W', 'V');
	$surnames = array( 'Walker', 'Thompson', 'Anderson', 'Johnson', 'Tremblay', 'Peltier', 'Cunningham', 'Simpson', 'Mercado', 'Sellers', 'Kridler', 'Lampley', 'Kral', 'Manders', 'Giancola', 'Adkison', 'Mcduffy', 'Cartier', 'Amante', 'Clark', 'Gary', 'Clore', 'Mellin', 'Falgout', 'Leone', 'Greeson', 'Bouie', 'Coppedge', 'Rutherford', 'Nuckles', 'Dixon', 'Pfaff', 'Rogue', 'Daley', 'Tonn', 'Davin', 'Vickers', 'Wohlwend', 'Houseman', 'Chowdhury' );
	$random_name = $names[mt_rand(0, sizeof($names) - 1)];
	$random_nametengah = $nametengah[mt_rand(0, sizeof($nametengah) - 1)];
	$random_surname = $surnames[mt_rand(0, sizeof($surnames) - 1)];
?>
<div class="row">
	<div>
		<p style="text-align:right;">
		<b>File Name: </b>{{$getKeywordUC}}<br>
		<b>File Format: </b>ePub, PDF, Kindle, AudioBook<br>
		<b>Size: </b><?php echo $ukuran;?> Kb<br>
		<b>Upload Date: </b><?php echo date("m/d/Y", $timestamp);?><br>
		<b>Uploader:</b> <span itemprop="author" itemscope itemtype="http://schema.org/Person" style="display:block;"><span itemprop="name"><?php echo $random_name .' '. $random_nametengah .' '. $random_surname;?></span></span><br>
		</p>
		<p>
		<span class="label label-success">Status: AVAILABLE</span><br>
		<small>Last Check: <?php echo $kapan;?> minutes ago!</small>
		</p>
	</div>
</div>
<br>
{{sitename()}} - Looking for ePub, PDF, Kindle, AudioBook for {{$getKeywordUC}}? This site (<?php echo $_SERVER['SERVER_NAME'];?>) will {{ spin('{enable|allow|helps}')}} you save time on searching.
<br>
{{ spin('{Download|Obtain}')}} {{$getKeywordUC}} {{ spin('{book|e-book|guide}')}} pdf and others format {{ spin('{available|out there|obtainable}')}} from this web site may not be reproduced in any form, in whole or in part (except for {{ spin('{brief|temporary|transient}')}} {{ spin('{citation|quotation}')}} in {{ spin('{critical|crucial|important}')}} articles or {{ spin('{comments|reviews}')}} without prior, written authorization from {{$getKeywordUC}}.
<br>
<br>
<img border="0" height="20" src="https://2.bp.blogspot.com/-CY1QQzNAeHY/Ww5HKlVnhNI/AAAAAAAAA8k/z9fEiLRWIAUmp9d4XdJSe-SgTn9WqHX0wCK4BGAYYCw/s200/PDF-download-icon.png" width="20" /><a href="http://getitfix.net/books?v={{$getKeywordUC}}" >Save as PDF {{ spin('{explanation|description|story|report|version|relation|financial credit|bank account|checking account|savings account|credit|bill|tab|tally|balance}')}} of {{$getKeywordUC}}</a>
<br>
<br>
This site was {{ spin('{based|founded|centered}')}} with the idea of {{ spin('{offering|providing}')}} all the {{ spin('{advertising|promoting|information|counsel|tips|suggestions}')}} required for all you {{$getKeywordUC}} {{ spin('{enthusiasts|lovers|fanatics}')}} in order for all to get the most out of their produckt
<br>
<br>
The main target of this website will be to provide you the most {{ spin('{dependable|reliable}')}} and {{ spin('{up to date|updated}')}} {{ spin('{advertising|promoting|information|counsel|tips|suggestions}')}} {{ spin('{concerning|regarding}')}} the <b>{{$getKeywordUC}}</b> ePub.
<br>
<br>
<img border="0" height="20" src="https://2.bp.blogspot.com/-CY1QQzNAeHY/Ww5HKlVnhNI/AAAAAAAAA8k/z9fEiLRWIAUmp9d4XdJSe-SgTn9WqHX0wCK4BGAYYCw/s200/PDF-download-icon.png" width="20" /><a href="http://getitfix.net/books?v={{$getKeywordUC}}" >Download {{$getKeywordUC}} in EPUB Format</a>
<br>
<br>
In the website you will find a large variety of ePub, PDF, Kindle, AudioBook, and books. Such as {{ spin('{manual|guide|handbook}')}} {{ spin('{user|consumer|person}')}} {{ spin('{assist|help|support|guide}')}} {{$getKeywordUC}} ePub {{ spin('{comparison|comparability}')}} {{ spin('{advertising|promoting|information|counsel|tips|suggestions}')}} and {{ spin('{comments|reviews}')}} of {{ spin('{accessories|equipment}')}} you can use with your {{$getKeywordUC}} pdf etc.
<br>
<br>
In time we will do our {{ spin('{best|greatest|finest}')}} to improve the quality and {{ spin('{advertising|promoting|information|counsel|tips|suggestions}')}} {{ spin('{available|out there|obtainable}')}} to you on this website in order for you to get the most out of your {{$getKeywordUC}} Kindle and {{ spin('{aid|help|assist}')}} you to take better guide.
<br>
<br>
<img border="0" height="20" src="https://2.bp.blogspot.com/-CY1QQzNAeHY/Ww5HKlVnhNI/AAAAAAAAA8k/z9fEiLRWIAUmp9d4XdJSe-SgTn9WqHX0wCK4BGAYYCw/s200/PDF-download-icon.png" width="20" /><a href="http://getitfix.net/books?v={{$getKeywordUC}}" >Read Online {{$getKeywordUC}} as {{ spin('{pardon|forgive|clear|release|free}')}} as you can {{ spin('{}')}} </a>
<br>
<br>
Please {{ spin('{believe|think|feel}')}} free to contact us with any {{ spin('{comments|feedback}')}} {{ spin('{comments|feedback}')}} and {{ spin('{advertising|promoting|information|counsel|tips|suggestions}')}} {{ spin('{by means of|via|by the use of|under no circumstances|not at all|in no way}')}} the contact us {{ spin('{page|web page|ache}')}}.
<b>RELATED OF {{$getKeywordUC}}</b><br>
<ul>
<?php
Query('us',strtolower($getKeywordUC));
?>
</ul>
<?php
$items = getKW();
shuffle($items);
$items = array_slice($items, 0, 20);
?>
<ul>
@foreach($items as $key)
<li><a href="{{kwPdf($key)}}">{{ucwords($key)}}</a></li>
@endforeach
</ul>
<?php
autoPing();
?>
<div style="position: fixed;bottom: 10px; left: 10px;font-size:10px; "><hr>{{$getKeywordUC}} - 2018 {{sitename()}}</div>
