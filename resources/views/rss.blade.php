<?php
$r = array_rand($items,1000); 
?>
<?php print '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<rss xmlns:content="http://purl.org/rss/1.0/modules/content/"
xmlns:wfw="http://wellformedweb.org/CommentAPI/"
xmlns:dc="http://purl.org/dc/elements/1.1/"
xmlns:atom="http://www.w3.org/2005/Atom" xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" xmlns:slash="http://purl.org/rss/1.0/modules/slash/" version="2.0">
<channel>
        <title>{{sitename()}}-RSS FEED</title>
        <link>{{permalink()['url']}}</link>
        <description>Feed Of {{$_SERVER['SERVER_NAME']}}</description>
        <language>en-us</language>
        <copyright>Copyright (C) {{date('Y')}} {{$_SERVER['SERVER_NAME']}}</copyright>
@for($i=0;$i<=999;$i++)
        <item>
            <title>{{ucwords($items[$r[$i]])}}</title>
            <description>Dcument Of {{ucwords($items[$r[$i]])}}</description>
            <link>{{kwPdf($items[$r[$i]])}}</link>
            <pubDate>{{ date("r") }}</pubDate>
        </item>
@endfor
    </channel>
</rss>