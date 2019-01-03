<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="'.$urlsite.'/assets/sitemap-theme.xsl"?>';?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php sort($data); ?>
@foreach($data as $key)
<?php
$pecah = explode('/',$key);
$hitung = count($pecah);
?>
<sitemap>
	<loc>{{$urlsite}}{{$pecah[$hitung-1]}}</loc>
	<lastmod>{{date('c')}}</lastmod>
</sitemap>
@endforeach
</sitemapindex>
