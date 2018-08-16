<?php 

class todoController extends controller{	

  	public function index(){}

  	public function listar(){
  		$array = array();

  		$t = new Tarefas();
  		$array = $t->listar();

  		// Transforma a página num arquivo do tipo JSON
  		header("Content-Type: application/json");
  		echo json_encode($array);

  		// url: http://localhost/web-services/03-criando-um-web-service/api/todo/listar
  	}
  	
  	public function add(){

  		// Adições de dados na arquitetura REST recebem requisições do tipo POST
  		// Para testar as requisições, devemos utilizar requisições AJAX ou a extensão
  		// Advanced Rest client do chrome ou RESTclient para firefox

  		// url: http://localhost/web-services/03-criando-um-web-service/api/todo/add

  		if(isset($_POST['titulo']) && !empty($_POST['titulo'])){

  			$titulo = addslashes($_POST['titulo']);

  			$t = new Tarefas();
  			$t->addTarefa($titulo);
  		}
  	}

  	public function del(){

  		if(isset($_POST['id']) && !empty($_POST['id'])){

  			$id = addslashes($_POST['id']);

  			$t = new Tarefas();
  			$t->delTarefa($id);

  		}
  		// url: http://localhost/web-services/03-criando-um-web-service/api/todo/del

  	}

  	public function update(){

  		if(isset($_POST['id']) && !empty($_POST['id'])){

  			$id = addslashes($_POST['id']);
  			$status = addslashes($_POST['status']);

  			$t = new Tarefas();
  			$t->updateTarefa($status, $id);

  		}
  		// url: http://localhost/web-services/03-criando-um-web-service/api/todo/update

  	}

}
