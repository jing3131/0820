<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.taipower.com.tw/TC/news2.aspx?mid=225");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);

$result = curl_exec($ch);
curl_close($ch);

$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($result);

$xpath = new DOMXPath($doc);                            // 用XPath定位到想要的地方
$entries = $xpath->query('//*[@id="news_box3"]/div[2]/ul/li');
foreach ($entries as $entry) 
{
    $title = $xpath->query("./a/div/h3", $entry);
    echo "Title：" . $title->item(0)->nodeValue . "<br>";
}


// echo htmlspecialchars($result);

?>