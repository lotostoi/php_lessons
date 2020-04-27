    <?php

    try {
        $loader = new \Twig\Loader\FilesystemLoader("./templates");
        $twig = new \Twig\Environment($loader);

        $template = $twig->load('main.tmpl');

        $cont =  $template->render(array('links' => $gallery,'page'=>$page, 'link' => $link));
        echo $cont;
    } catch (Exception $e) {
        die('ERROR - ' . $e->getMessage());
    }

    ?>