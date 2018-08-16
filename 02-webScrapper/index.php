<?php 
/* WebScrapper é um robô que monitora sites para colher informações */

// Utilizamos a biblioteca simple_html_dom.php para auxiliar nesta tarefa
// Link: https://sourceforge.net/projects/simplehtmldom/

require 'simple_html_dom.php';
//OBS.: Caso ocorra erro na execução, a linha 75 do arquivo simple_html_dom.php,
// remover o atributo $offset da função file_get_contents
						
					  // Link do site que queremos monitorar
$html = file_get_html('http://www.advancerh.com.br/vagas-de-emprego.php');

		
// Devemos inspecionar o código fonte da página para selecionar apenas os elementos que queremos manipular
						// Selecionando o elemento html que queremos manipular
$results = $html->find('section[align=left]');

echo 'Total de vagas: '.count($results);

echo '<br/><br/>';

foreach($results as $vaga){

	$titulo = $vaga->find('span', 0)->plaintext;
	$subtitulo = $vaga->find('p', 1)->plaintext;
	$requisitos = $vaga->find('p', 2)->plaintext;
	$subtitulo2 = $vaga->find('p', 3)->plaintext;
	$atividades = $vaga->find('p', 4)->plaintext;
	$contato = $vaga->find('p', 5)->plaintext;	

	//print_r($titulo); exit;

	echo $titulo.'<br/><br/>';
	echo $subtitulo.'<br/><br/>';	
	echo $requisitos.'<br/><br/>';
	echo $subtitulo2.'<br/><br/>';
	echo $atividades.'<br/><br/>';
	echo $contato.'<br/><br/>';
	echo '<hr/>';
}

?>