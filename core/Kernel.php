<?php

namespace app\core;

class Kernel
{
  public static ServiceContainer $services;

  public static function init()
  {
    self::$services = new ServiceContainer();
  }
}
