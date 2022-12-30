<?php

namespace app\middlewares;

use app\core\exeption\ForbiddenExeption;
use app\core\middleware\Middleware;
use app\core\request\Request;
use app\core\response\Response;

class AuthMiddleware extends Middleware
{
  public function handle(Request $request, Response $response, $callback, $next)
  {
    if (!$request->user()) {
      $exeption = new ForbiddenExeption();
      $response->setStatusCode(403);
      return view('unauthorized', ['exeption' => $exeption], 'auth');
    }
    return $next($callback);
  }
}
