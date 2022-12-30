<?php

namespace app\middlewares;

class MiddlewareProvider
{
  public static function middlewares()
  {
    return [
      'auth' => AuthMiddleware::class
    ];
  }

  public static function execute()
  {
    middleware()->registerMiddlewares(self::middlewares());
  }
}
