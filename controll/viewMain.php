    <?php

    try {
        $loader = new Twig_Loader_Filesystem("./templates");
        $twig = new Twig_Environment($loader);

        $template = $twig->load('main.tmpl');

        $cont =  $template->render(array('links' => $gallery,'page'=>$page, 'link' => $link));
        echo $cont;
    } catch (Exception $e) {
        die('ERROR - ' . $e->getMessage());
    }

    ?>