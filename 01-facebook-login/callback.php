<?php 
require 'fb.php';

$helper = $fb->getRedirectLoginHelper();

// Salvar na sessão o código gerado pelo Facebook e retornar ao index.php
try{

	$_SESSION['fb_access_token'] = (string) $helper->getAccessToken();

}catch(Facebook\Exceptions\FacebookResponseException $e){
	echo 'ERRO: '.$e->getMessage();
	exit;

}catch(Facebook\Exceptions\FacebookSDKException $e){
	echo 'ERRO: SDK: '.$e->getMessage();
	exit;
}

header('Location: index.php');