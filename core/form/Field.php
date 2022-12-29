<?php

namespace app\core\form;

class Field
{
  public const TYPE_TEXT = 'text';
  public const TYPE_EMAIL = 'email';
  public const TYPE_PASSWORD = 'password';

  public $errors;
  public $model;
  public $attribute;
  public $type;

  public function __construct($errors, $model, $attribute)
  {
    $this->errors = $errors;
    $this->model = $model;
    $this->attribute = $attribute;
    $this->type = self::TYPE_TEXT;
  }

  public function __toString()
  {
    $value = $this->model[$this->attribute] ?? '';
    $isError = $this->errors[$this->attribute] === null ? false : true;
    $firstError = $isError ? $this->errors[$this->attribute][0] : '';

    return sprintf(
      '
    <div class="mb-3">
        <label class="form-label">%s</label>
        <input type="%s" name="%s" value="%s" class="form-control%s">
        <div class="invalid-feedback">
          %s
        </div>
      </div>
    ',
      ucfirst($this->attribute),
      $this->type,
      $this->attribute,
      $value,
      $isError ? ' is-invalid' : '',
      $firstError
    );
  }

  public function email()
  {
    $this->type = self::TYPE_EMAIL;
    return $this;
  }

  public function password()
  {
    $this->type = self::TYPE_PASSWORD;
    return $this;
  }
}
