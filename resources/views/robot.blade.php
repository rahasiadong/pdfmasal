User-agent: *

<?php $hitung = ceil(count($getkw)) / 999; ?>
Sitemap: {{$urlsite}}sitemap.xml
<?php sort($data); ?>
@foreach($data as $key)
<?php
$pecah = explode('/',$key);
$hitung = count($pecah);

?>
Sitemap: {{$urlsite}}{{$pecah[$hitung-1]}}
@endforeach