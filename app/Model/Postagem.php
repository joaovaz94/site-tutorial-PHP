<?php

    class Postagem {
	//A função com 'static' permite acesso ao metodo sem instanciar a classe
	public static function selecionaTodos(){
	    $con = Connection::getConn();

	    var_dump($con);
	}
    }
