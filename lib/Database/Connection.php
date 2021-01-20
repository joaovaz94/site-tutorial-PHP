<?php

    //O 'abstract' na classe não permite que ela seja instansiada mais de uma vez 
    //aplicando o padrão Singleton
    abstract class Connection {

	private static $conn;

	public static function getConn() {
	    if (self::$conn === null){
		self::$conn = new PDO('mysql:host=localhost;dbname=serie-criando-site', 'root', '8565');
	    }
	    return self::$conn;
	}
    }
