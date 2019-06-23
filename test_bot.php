<?php
$url = "https://api.telegram.org/bot858754598:AAH6yoiHz_vBsiEJSdN0Wge1bjEY9s8MziY/sendMessage?parse_mode=html&chat_id=430265248";
$url = $url . "&text=".urlencode('<b>Hello, World!</b>
test');
$ch = curl_init();
$optArray = array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true
);
curl_setopt_array($ch, $optArray);
$result = curl_exec($ch);
curl_close($ch);