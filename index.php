<?php

require_once 'config.php';
require_once 'JWT.php';
require_once 'phpqrcode/qrlib.php';



$header = ['typ' => 'JWT','alg' => 'HS256',];

$payload = [ 'name' => 'johndoe', 'email' => 'johndoe@example.com', 'password' => '123456'];

$secret = SECRET;

$jwt = new JWT;

$token = $jwt->generate($header, $payload, $secret,30);


$path = 'images/';
$file = $path.uniqid().".png";



 $qrCode = QRcode::png($token, $file, 'L'); 

 echo $qrCode;


/* if($qrCode){
    $path = 'images/' .DIRECTORY_SEPARATOR . date("d/m/Y-H:i:s") . '.png' ;
    file_put_contents($path, $qrCode, FILE_APPEND); 
}

*/
