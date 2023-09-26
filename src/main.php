<?php
    include_once __DIR__."/../vendor/autoload.php";
    
    use App\SystemServices\MonologFactory;
    use Laminas\Diactoros\Request;
    use Laminas\Diactoros\Response;
    use Selective\BasePath\BasePathMiddleware;
    use Slim\Factory\AppFactory;
    
    MonologFactory::getInstance()->debug("A main está sendo executada");

    $app = AppFactory::create();

    $app->addRoutingMiddleware();
    $app->add(new BasePathMiddleware($app));
    $app->addErrorMiddleware(true,true, true);

    $app->get('/', function (Request $request, Response $response){
        $response->getBody()->write('Hello World');
        return $response;
    });

    $app->get('/inserirusuario', function(Request $request, Response $response){
        $response->getBody()->write('Hello World!');
        return $response;
    });

    $app->run();
