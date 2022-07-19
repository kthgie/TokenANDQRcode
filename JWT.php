<?php

class JWT
{
    public function generate(array $header, array $payload, string $secret, int $validity): string
    {
        if($validity > 0){
            $now = new DateTime();
            $expiration = $now->getTimestamp()+ $validity;
            $payload['iat'] = $now->getTimestamp();
            $payload['exp'] = $expiration;
        
        
        }



        // Création du token JWT
        $base64Header = base64_encode(json_encode($header));
        $base64Payload = base64_encode(json_encode($payload));

        $base64Header = str_replace(['+', '/', '='], ['-', '_', ' '], $base64Header);
        $base64Payload = str_replace(['+', '/', '='], ['-', '_', ' '], $base64Payload);



        $secret = base64_encode(SECRET);


        $signature = hash_hmac('sha256', $base64Header . '.' . $base64Payload, $secret, true);

        $base64Signature = base64_encode($signature);


        $base64Signature = str_replace(['+', '/', '='], ['-', '_', ' '], $base64Signature);
        

        $jwt = $base64Header . '.' . $base64Payload . '.' . $base64Signature;

        return $jwt;
    }

}