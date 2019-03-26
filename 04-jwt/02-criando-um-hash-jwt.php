<?php

class JWT {

  private $secret;

  public function __construct(){
    $this->secret = "abC123!";
  }

  public function create($data){

    // HEADER
    $header = json_encode(array("typ" => "JWT", "alg" => "HS256"));

    // PAYLOAD
    $payload = json_encode($data);

    $hbase = $this->base64url_encode($header);
    $pbase = $this->base64url_encode($payload);

    // SIGNATURE
    $signature = hash_hmac("sha256", $hbase.".".$pbase, $this->secret, true);
    $bsig = $this->base64url_encode($signature);

    // JWT FINAL
    $jwt = $hbase.".".$pbase.".".$bsig;

    return $jwt;

  }

  // Gerar um base64url
  private function base64url_encode( $data ){
    return rtrim( strtr( base64_encode( $data ), '+/', '-_'), '=');
  }

  private function base64url_decode( $data ){
    return base64_decode( strtr( $data, '-_', '+/') . str_repeat('=', 3 - ( 3 + strlen( $data )) % 4 ));
  }

  // Validar o JWT
  public function validade($token){
    // Passo 1: Verificar se o token tem 3 partes
    // Passo 2: Bater a assinatura com os dados

    $array = array();

    // Passo 1
    $jwt_split = explode('.', $token);
    if(count($jwt_split) == 3){

      // Passo 2
      $signature = hash_hmac("sha256", $jwt_split[0].".".$jwt_split[1], $this->secret, true);
      $bsig = $this->base64url_encode($signature);

      if($bsig == $jwt_split[2]){

        $array = json_decode($this->base64url_decode($jwt_split[1]));
        return $array;

      }else{
        return false;
      }

    }else{
      return false;
    }
  }

}


$jwt = new JTW();

$token = $jwt->create(array("id_user" => 123, "nome" => "Gandalf Cinzento"));

echo $token;


// Validando o Token

if(!empty($_GET['jwt'])){

  $token = $_GET['jwt'];
  $check = $jwt->validade($token);

  if($check){
    echo "Token Válido";
  }else{
    echo "Token inválido";
  }

}else{
  echo "Token não enviado";
}