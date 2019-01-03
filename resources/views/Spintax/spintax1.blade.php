<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
		<p style="text-align:left;">
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
{{sitename()}} - Thank you for visiting the article {{$getKeywordUC}} for free. We are a website that {{ spin('{adds|provides}')}} {{ spin('{advertising|promoting|information|counsel|tips|suggestions}')}} about the key to the {{ spin('{answer|reply}')}} education, {{ spin('{physical|bodily}')}} {{ spin('{subjects|topics}')}} {{ spin('{subjects|topics}')}} chemistry, mathematical {{ spin('{subjects|topics}')}} and mechanic subject. In addition to {{ spin('{advertising|promoting|information|counsel|tips|suggestions}')}} about <b>{{$getKeywordUC}}</b> we {{ spin('{also|additionally}')}} provide articles about the good way of {{ spin('{learning|studying|getting to know|researching|discovering}')}} experiential {{ spin('{learning|studying|getting to know|researching|discovering}')}} and discuss about the sociology, psychology and {{ spin('{user|consumer|person}')}} guide.
<br><br>
<img border="0" height="20" src="https://2.bp.blogspot.com/-CY1QQzNAeHY/Ww5HKlVnhNI/AAAAAAAAA8k/z9fEiLRWIAUmp9d4XdJSe-SgTn9WqHX0wCK4BGAYYCw/s200/PDF-download-icon.png" width="20" /><a href="/" >Download as PDF {{ spin('{explanation|description|story|report|version|relation|financial credit|bank account|checking account|savings account|credit|bill|tab|tally|balance}')}} of {{$getKeywordUC}}</a>
<br><br>
To search for words within a {{$getKeywordUC}} PDF {{ spin('{dossier|file}')}} you can use the Search {{$getKeywordUC}} PDF window or a Find toolbar. While {{ spin('{basic|primary|fundamental}')}} function {{ spin('{conducted|carried out|performed|talk to|seek advice from|consult with}')}} by the {{ spin('{2|two}')}} {{ spin('{alternatives|options|alternate options}')}} is {{ spin('{almost|virtually|nearly|pretty much|just about|very nearly}')}} the same, there are {{ spin('{adaptations|variations|diversifications}')}} in the scope of the search {{ spin('{conducted|carried out|performed|talk to|seek advice from|consult with}')}} by each. The Find toolbar {{ spin('{allows|permits|makes it possible for|allows for}')}} you to search for text within the at the moment {{$getKeywordUC}} PDF doc while the Search {{$getKeywordUC}} PDF window {{ spin('{allows|permits|makes it possible for|allows for}')}} for you to search more places by {{ spin('{offering|providing}')}} {{ spin('{advanced|superior}')}} {{ spin('{alternatives|options|alternate options}')}} for searching in more than one {{$getKeywordUC}} PDF, {{ spin('{indexed|listed}')}} {{$getKeywordUC}} PDF or {{$getKeywordUC}} PDF {{ spin('{data|knowledge|information|info}')}} that are online. Search {{$getKeywordUC}} PDF {{ spin('{additionally|moreover}')}} makes it possible for you to search your attachments to {{ spin('{specially|specifically|precise|unique|distinct|exact|special|specified|targeted|detailed|designated|distinctive}')}} in the search options.
<br><br>
<b>RELATED OF {{$getKeywordUC}}</b><br>
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
Query('us',strtolower($getKeywordUC));
?>
<?php
autoPing();
?>
<div style="position: fixed;bottom: 10px; left: 10px;font-size:10px; "><hr>{{$getKeywordUC}} - 2018 {{sitename()}}</div>
