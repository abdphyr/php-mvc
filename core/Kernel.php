<?php

namespace app\core;

class Kernel
{
  public static ServiceContainer $services;

  public static function boot()
  {
    self::$services = new ServiceContainer();
  }
}
