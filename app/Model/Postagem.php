<?php

    class Postagem {
	//A função com 'static' permite acesso ao metodo sem instanciar a classe
	public static function selecionaTodos(){
	    $con = Connection::getConn();

	    $sql = "SELECT * FROM postagem ORDER BY id DESC";
	    $sql = $con->prepare($sql);
	    $sql->execute();

	    $resultado = array();

	    while($row = $sql->fetchObject('Postagem')) {
		$resultado[] = $row;
	    }
	    
	    if(!$resultado) {
		    throw new Exception("Não foi encontrado nenhum registro no banco");
	    }

	    return $resultado;
	}
    }
