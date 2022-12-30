<?php

namespace app\core\exeption;

class NotFoundExeption extends \Exception
{
  protected $message = "Not found ";
  protected $code = 404;
}
