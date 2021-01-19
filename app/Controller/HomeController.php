<?php

    class HomeController {
	public function index() {
	    //echo 'Home';
	    Postagem::selecionaTodos();
	}
    }
