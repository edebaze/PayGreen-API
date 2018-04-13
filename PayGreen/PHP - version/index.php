<?php

    require 'vendor/autoload.php';

    $router = new App\Router\Router($_GET['url']);

    $router->get('/', function() {echo '
        <form action=__DIR__ . "/transactions" method="post">
            <input type="number" name="amount">
            <input type="text" name="currency">
            <button type="submit"> Envoyer </button>
        </form>
    ';});
//    $router->get('/transactions', function() use ($router) {echo $router->url('transactions.show');}, 'transactions.show');
//    $router->get('/transactions/:id', function($id) use ($router) {echo $router->url('transactions.show', ['id' => $id]);}, 'transactions.show');
//    $router->post('/transactions', function() use ($router) {echo $router->url('transactions.show');}, 'transactions.show');
//    $router->put('/transactions', function() {echo 'MODIFICATIONS';});

    // CONTROLLER
    $router->get('/transactions', "Transactions#findAll");
    $router->get('/transactions/:id', "Transactions#findOne");
    $router->post('/transactions', "Transactions#add");
    $router->put('/validate/:id', "Transactions#validate");
    $router->put('/denied/:id', "Transactions#denied");



    $router->run();
