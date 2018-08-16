<?php 
session_start();
require 'Facebook/autoload.php';

// Configurando a conexão com a biblioteca
$fb = new Facebook\Facebook([
	'app_id' => '476370812768515', // Disponível na conta do site https://developers.facebook.com/
	'app_secret' => '92d3b75311551738cbf615e27054044f', // Disponível na conta do site https://developers.facebook.com/
	'default_graph_version' => 'v2.10'
]);
