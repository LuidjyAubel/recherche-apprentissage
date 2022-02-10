<?php
require_once '../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use App\Classes\Manager\ApprentissageManager;

$logger = new Logger('main');

$logger->pushHandler(new StreamHandler(__DIR__.'/../log/app.log', Logger::DEBUG));  // création anonyme

$logger->info('Start...');

$loader = new FilesystemLoader('../templates');

$twig = new Environment($loader, ['cache' => '../cache']);

$error = '';

require_once("conf.php");

session_cache_expire(10);
session_start();

if ($_SESSION['connecter'] = TRUE) {
    try {
        $db = new PDO($dsn, $usr, $pwd);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $ApprentissageManager = new ApprentissageManager($db);
        
        $apprentissage = $ApprentissageManager->getList();

    } catch(PDOException $e) {
        $error = 'erreur de connection : ' . $e->getMessage();
    }
    echo $twig->render('apprentissageList.html.twig', [
        'title' => 'Liste des opportunités',
        'apprentissages' => $apprentissage,
        'error' => $error,
        ]
    );
} else {
    header("connect.php");
    session_abort();
}