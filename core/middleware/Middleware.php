<?php

namespace app\core\middleware;

use app\core\request\Request;
use app\core\response\Response;

abstract class Middleware
{
  abstract public function handle(Request $request, Response $response, $callback, $next);
}
