<?php
session_start();
$_SESSION["connecter"] = FALSE;

require_once '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use App\Classes\Manager\UserManager;

$logger = new Logger('main');

$logger->pushHandler(new StreamHandler(__DIR__.'/../log/app.log', Logger::DEBUG));  // création anonyme

$logger->info('Start...');

$loader = new FilesystemLoader('../templates');

$twig = new Environment($loader, ['cache' => '../cache']);

$error = '';

require_once("conf.php");

try {
    if (isset($_POST['email'])&&(isset($_POST['password']))){
        $db = new PDO($dsn, $usr, $pwd);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $newuser = new UserManager($db);
        $password = $_POST['password'];
        // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $newuser->connectUser($_POST['email'], $password);
    }    
} catch(PDOException $e) {
    print('erreur de connection : ' . $e->getMessage());
}     
echo $twig->render('connect.html.twig', [
    'title' => 'Connectez vous !!!!!!!!',
    'error' => $error,
    ]
);    
