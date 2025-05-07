<?php 
use Helpers\View;
$router = new AltoRouter();


$router->map('GET', '/', function() {
    View::render('Landpage/index', ['data' => "fz"]);
});
























$match = $router->match();

if ($match && is_callable($match['target'])) {
    call_user_func_array($match['target'], [$match['params']]);
} else {
    echo "Page non trouvée";
    http_response_code(404);
}