<?php
require 'fb.php';

// Verificar se a sessão do Facebook está ativa

if(isset($_SESSION['fb_access_token']) && !empty($_SESSION['fb_access_token'])){
	
	//echo 'Tá logado';

	// Pegar as informações do Facebook do usuário

	$res = $fb->get('/me?fields=email,name,id,picture', $_SESSION['fb_access_token']);

	/* Parâmetros: */

	// me = retorna informações de perfil do usuário
	// picture = retorna a url da foto de perfil
	// Todos os comandos estão presentes na plataforma de desenvolvedores do 
	// Facebook Graph API Explorer

	$r = json_decode($res->getBody()); // Retorna o corpo da mensagem

	//print_r($r);

	echo 'Meu nome é: '.$r->name;

	echo '<br/><br/>';

	// Imprimir a url da imagem de perfil:
	$img = $r->picture->data->url;

	echo "<img src='".$img."' />"

	echo "<a href='sair.php'>Sair</a>";

}else{
	header('Location: login.php');
}