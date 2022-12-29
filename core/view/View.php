<?php
namespace app\core\view;
use app\core\application\Application;

class View
{
  public static function renderView($view, $params = [], ?string $layout=null)
  {
    $layoutContent = self::layoutContent($layout);
    $viewContent = self::renderOnlyView($view, $params);
    return str_replace('{{content}}', $viewContent, $layoutContent);
  }

  public static function renderContent($content, ?string $layout)
  {
    $layoutContent = self::layoutContent($layout);
    return str_replace('{{content}}', $content, $layoutContent);
  }

  private static function layoutContent(?string $layout)
  {
    ob_start();
    include_once Application::$ROOT_DIR . "/views/layouts/$layout.php";
    return ob_get_clean();
  }

  private static function renderOnlyView($view, $params)
  {
    foreach ($params as $key => $value) {
      $$key = $value;
    }

    ob_start();
    include_once Application::$ROOT_DIR . "/views/$view.php";
    return ob_get_clean();
  }
}
