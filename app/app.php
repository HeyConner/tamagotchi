<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/tamagotchi.php";

    session_start();
    if (empty($_SESSION['tama_list'])) {
        $_SESSION['tama_list'] = array();
    }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app)
    {
        return $app['twig']->render('tamagotchi_list.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    $app->get("/tamagotchi_form", function() use ($app)
    {
        return $app['twig']->render('tamagotchi_form.html.twig');
    });

    $app->post("/", function() use ($app)
    {
        $tamas = new Tamagotchi(100, 100, 100, $_POST['name']);
        $tamas->save();
        return $app['twig']->render('tamagotchi_list.html.twig', array('tamagotchis' => Tamagotchi::getAll()));
    });

    $app->post("/delete_tama", function() use ($app)
    {
        Tamagotchi::deleteAll();

        return $app['twig']->render('delete_tama.html.twig');
    });

    return $app;
?>
