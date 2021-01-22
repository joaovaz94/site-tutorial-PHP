<?php

    class CamaraController {

	public function index() {
	    
		//renderizando a vizualisação de página a partir do Twig
		$loader = new \Twig\Loader\FilesystemLoader('app/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('camara.html');

		$parametros = array(); 

		$conteudo = $template->render($parametros);
		echo $conteudo;
		    

	}
    }
?>
