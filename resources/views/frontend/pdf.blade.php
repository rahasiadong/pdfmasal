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
$Keyword = str_replace("-", " ", $get[3]);
$getKeyword = str_replace(".pdf", "", $Keyword);
$getKeywordUC = urldecode(ucwords($getKeyword));
?>

@include(Spintax/spintax1)

<b>RELATED OF {{$getKeywordUC}}</b><br>
<ul>
<?php

Query('us',$getKeyword);
?>
</ul>
<?php
autoPing();
?>
<div style="position: fixed;bottom: 10px; left: 10px;font-size:10px; "><hr>{{$getKeywordUC}} - 2018 {{sitename()}}</div>