<?php

namespace app\core\exeption;

class ForbiddenExeption extends \Exception
{
  protected $message = "You don't have access this page";
  protected $code = 403;
}
