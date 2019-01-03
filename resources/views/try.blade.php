<!DOCTYPE html>
<html>
<head>
	<title>{{sitename()}}</title>
<meta name="msvalidate.01" content="F1155818A00603FB92576BAE032B3F7A" />
</head>
<body>
	<h3>This Site Is Under Contraction, Please Contact The Web Administrator</h3>
	<h1>{{sitename()}}</h1>
<?php 
$r = array_rand($items,100); 

$no = 1;
?>

@for($i=0;$i<=99;$i++)
<a href="{{kwPdf($items[$r[$i]])}}">{{ucwords($items[$r[$i]])}}</a>
@endfor
<center>Copyright © 2006 - {{date('Y')}} - <a href="{{url('/sitemap_index.xml')}}">Sitemap</a></center> -->
<?php autoPing(); ?>
</body>
</html>

