<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/model/User.php';
require_once __DIR__.'/model/Token.php';
use Ramsey\Uuid\Uuid;

$conf_file = file_get_contents("./config.json");
$config = json_decode($conf_file, true);

$app = new Silex\Application();
$app['debug']=true;

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array(
        'dbname' => $config['db']['dbname'],
        'user' => $config['db']['user'],
        'password' => $config['db']['password'],
        'host' => $config['db']['host'],
        'driver' => $config['db']['driver'],
    ),
));

$app->get('/invoices', function () use ($app){
    $sql = "SELECT * FROM user";
    $users = $app['db']->fetchAssociative($sql);
    return json_encode($users);
});

$app->post('/login', function () use ($app){
    $data = json_decode(file_get_contents('php://input'), true);
    print_r($data);
    return json_encode($_POST);
});

$app->post('/register', function () use ($app){
    $data = json_decode(file_get_contents('php://input'), true);
    $user = new User($data);
    $user->find($app['db']);
    return json_encode($user);
});


$app->get('/', function () {
    $api=new stdClass();
    $api->version = "0.1";
    $api->api ="oficina virtual";
    return json_encode($api);
});

$app->run();
?>