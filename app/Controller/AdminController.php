<?php

    /**
    * Controller do modelo MVC Para controlar as funcionalidades
    * na página admin da aplicação  
    *
    * @author João Paulo Vaz <joaovaz94.4@gmail.com>
    */
    class AdminController {

	/**
    	 * Renderiza a página /admin
    	 *
	 * Carrega a página a partir do template html do site
	 * e usa Twig para capturar variáveis e transmitie na html
    	 *
    	 * @param string  $originFile The original filename
    	 * @param boolean $override   Whether to override an existing file or not
    	 *
    	 * @param string  $loader Registro para o Twig de onde agir no html
    	 * @param string  $twigRegistro de local do Twig para que ele execute no controller
    	 * @param string  $template Registro do HTML com o template e a view admin
    	 * @param Postagem  $objPostagens Iteração do objeto Postagem para mostrar todas as postagens
    	 * @param array  $parametros Registro dos parâmetros de cada postagem para passar pras funções
    	 * @param string  $conteudo Registro da HTML com o template usando os parâmetros recebidos
	 *
    	 */
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
