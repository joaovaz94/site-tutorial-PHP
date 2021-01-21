<?php

    class AdminController {

	public function index() {
	    
		//renderizando a vizualisação de página a partir do Twig
		$loader = new \Twig\Loader\FilesystemLoader('app/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('admin.html');

		$objPostagens = Postagem::selecionaTodos();

		$parametros = array(); 
		$parametros['postagens'] = $objPostagens;

		$conteudo = $template->render($parametros);
		echo $conteudo;
		    

	}

	public function create() {
		
		//renderizando a vizualisação de página a partir do Twig
		$loader = new \Twig\Loader\FilesystemLoader('app/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('create.html');

		$parametros = array(); 

		$conteudo = $template->render($parametros);
		echo $conteudo;
	}

	public function insert() {
	    
	    try {
		Postagem::insert($_POST);
		//retornando para a página do admin
		echo '<script>alert("Postagem adicionada com sucesso!!");</script>';
		echo '<script>location.href = "http://localhost/tutorial-site/?pagina=admin&metodo=index"</script>';
	    } catch(Exception $e) {
		echo '<script>alert("'.$e->getMessage().'");</script>';
		echo '<script>location.href = "http://localhost/tutorial-site/?pagina=admin&metodo=create"</script>';
	    }
	}
    }
?>
