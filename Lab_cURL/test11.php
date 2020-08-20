<?php
header("content-type: text/html; charset=utf-8");

// 1. 初始設定
$ch = curl_init();              // 一個curl物件(憑證)

// 2. 設定 / 調整參數
curl_setopt($ch, CURLOPT_URL, "https://yahoo.com.tw");    // 使用curl抓取的網站
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);                         // 是否回傳結果(yes = 1)
curl_setopt($ch, CURLOPT_HEADER, 0);                                 // 標頭要不要
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11");

// 3. 執行，取回 response 結果
$output = curl_exec($ch);

// 4. 關閉與釋放資源
curl_close($ch);

echo htmlspecialchars($output);

?>