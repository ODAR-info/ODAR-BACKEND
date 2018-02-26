<?php
$file = "http://wolf359radio.libsyn.com/rss";
$xml = simplexml_load_file($file);
echo "<pre>";
print_r($xml);