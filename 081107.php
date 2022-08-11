<?php

// 初始化 CURL
$curl=curl_init("https://data.ntpc.gov.tw/api/datasets/71CD1490-A2DF-4198-BEF1-318479775E8A/json?page=0&size=10");

// https 要取得
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 

//回傳結果到 不會輸出在畫面上 傳給前端js要記得加這行
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//執行$curl
$output=curl_exec($curl);

//加入User Agent 模擬browser行為 (可有可無)
// curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.71 Safari/537.36");


//關閉$curl
curl_close($curl);

echo $output;

?>