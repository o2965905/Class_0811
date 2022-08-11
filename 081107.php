<?php

/*
 * 
 * 
 * 發出 CORS Request 時瀏覽器會自動在 Request header 加上目前的 Origin
 * 後端必須在 Response header 中加上相符的 Access-Control-Allow-Origin 才能完成 CORS
 * 
 * 例如:
 * Access-Control-Allow-Origin: * => # 同意全部的
 * Access-Control-Allow-Origin: http://example.com  => # 只允許 http://example.com
 * 
 * 
 */
header("Access-Control-Allow-Origin: *");


// 初始化 CURL
$curl=curl_init("https://data.ntpc.gov.tw/api/datasets/71CD1490-A2DF-4198-BEF1-318479775E8A/json?page=0&size=10");

// https 要取得
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); 

/*
 * 
 * 使用PHP curl獲取頁面內容或提交資料，
 * 有時候希望返回的內容作為變數儲存，而不是直接輸出。
 * 這個時候就必需設定curl的CURLOPT_RETURNTRANSFER選項為1或true。
 * 
 */
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