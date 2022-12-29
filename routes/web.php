<?php
namespace app\routes;

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\router\Router;


Router::get('/', [SiteController::class, 'home']);
Router::get('/contact', [SiteController::class, 'contact']);
Router::post('/contact', [SiteController::class, 'handleContact']);

Router::get('/login', [AuthController::class, 'loginView']);
Router::post('/login', [AuthController::class, 'login']);
Router::get('/register', [AuthController::class, 'registerView']);
Router::post('/register', [AuthController::class, 'register']);

