<?php
namespace app\routes;

use app\controllers\AuthController;
use app\controllers\SiteController;
use app\core\router\Route;


Route::get('/', [SiteController::class, 'home']);
Route::get('/contact', [SiteController::class, 'contact']);
Route::post('/contact', [SiteController::class, 'handleContact']);

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerView']);
Route::post('/register', [AuthController::class, 'register']);

