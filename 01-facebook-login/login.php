<?php 
require 'fb.php';

$helper = $fb->getRedirectLoginHelper(); // Helper para gerar a url de login

$permissions = array('email'); // Representa as permissões do usuário. Todos os parâmetros podem ser consultados ena plataforma do Facebook Graph API Explorer

				// url que irá abrir após o login
$loginurl = $helper->getLoginUrl('http://localhost/web-services/01-facebook-login/callback.php', $permissions);

?>

<a href='<?= htmlspecialchars($loginurl); ?>'>Fazer login com Facebook</a>