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

	public function change($paramId) {

		//renderizando a vizualisação de página a partir do Twig
		$loader = new \Twig\Loader\FilesystemLoader('app/View');
		$twig = new \Twig\Environment($loader);
		$template = $twig->load('update.html');

		$post = Postagem::selecionaPorId($paramId);

		$parametros = array(); 
		$parametros['id'] = $post->id;
		$parametros['titulo'] = $post->titulo;
		$parametros['conteudo'] = $post->conteudo;

		$conteudo = $template->render($parametros);
		echo $conteudo;

	}

	public function update() {
	    
	    try {
		Postagem::update($_POST);
		//retornando para a página do admin
		echo '<script>alert("Postagem alterada com sucesso!!");</script>';
		echo '<script>location.href = "http://localhost/tutorial-site/?pagina=admin&metodo=index"</script>';
	    } catch(Exception $e) {
		echo '<script>alert("'.$e->getMessage().'");</script>';
		echo '<script>location.href = "http://localhost/tutorial-site/?pagina=admin&metodo=change&id='.$_POST['id'].'"</script>';
	    }
	}

	public function delete($paramId) {

	    try {
		Postagem::delete($paramId);
		//retornando para a página do admin
		echo '<script>alert("Postagem deletada com sucesso!!");</script>';
		echo '<script>location.href = "http://localhost/tutorial-site/?pagina=admin&metodo=index"</script>';
	    } catch(Exception $e) {
		echo '<script>alert("'.$e->getMessage().'");</script>';
		echo '<script>location.href = "http://localhost/tutorial-site/?pagina=admin&metodo=index"</script>';
	    }
	}
    }
?>
