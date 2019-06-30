<?php
$url = "https://api.telegram.org/bot647977222:AAHuPrLQJp8WlxZLYBYluwRxFyy5tCj5aMs/sendMessage?parse_mode=html&chat_id=830303259";
$url = $url . "&text=".urlencode('Sampah telah penuh');
$ch = curl_init();
$optArray = array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true
);
curl_setopt_array($ch, $optArray);
$result = curl_exec($ch);
curl_close($ch);