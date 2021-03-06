<?php

    class Core {
	public function start($urlGet){

	    //condição para saber se há requisição de metodo para lê-lo, caso contrario chamar metodo index
	    if (isset($urlGet['metodo'])) {
		$acao = $urlGet['metodo'];
	    } else {
		$acao = 'index';
	    } 

	    if (isset($urlGet['pagina'])) {
		$controller = ucfirst($urlGet['pagina'].'Controller');
	    } else {
		$controller = 'HomeController';
	    }
	    
	    if (!class_exists($controller)) {
		$controller = 'ErrorController';
	    }

	    if(isset($urlGet['id']) && $urlGet['id'] != null) {
		$id = $urlGet['id'];
	    } else {
		$id = null;
	    }
	    call_user_func_array(array(new $controller, $acao), array('id' => $id));
	}
    }
