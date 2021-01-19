<?php

//Inserção das classes no site a partir da página index.php
require_once 'app/Core/Core.php';

require_once 'lib/Database/Connection.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErrorController.php';

require_once 'app/Model/Postagem.php';

$template = file_get_contents('app/Template/estrutura.html');

ob_start();
    $core = new Core;
    $core->start($_GET);

    $saida = ob_get_contents();
ob_end_clean();

//substituindo o local definido pra áre a dinãmica pra função que retorna o que deve aparecer nela
$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);

echo $tplPronto;
