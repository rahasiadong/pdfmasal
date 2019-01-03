<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="'.$urlsite.'assets/sitemap-theme.xsl"?>';?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($data as $key)
<url>
	<loc>{{$urlsite}}{{permalink()['keyword-url']}}/{{urlPdf($key)}}</loc>
  	<lastmod>{{date('c')}}</lastmod>
  	
</url>
@endforeach
</urlset>
