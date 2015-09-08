<?php
namespace HTML;

/**
 * HTML Page
 *
 * @author Jakub Konečný
 */
class Page {
  /** @var string */
  protected $title;
  /** @var array */
  protected $scripts = array();
  /** @var array */
  protected $metas = array();
  /** @var array */
  protected $styles = array();
  /** @var array */
  protected $channels = array();
  
  use TContainer;
  
  /**
   * @param string $title
   */
  function setTitle($title) {
   $this->title = (string) $title;
  }
  
  /**
   * Add meta info about the page
   * 
   * @param string $name
   * @param string $content
   */
  function addMeta($name, $content) {
    $this->metas[] = array("name" => (string) $name, "content" => (string) $content);
  }
  
  /**
   * Add more meta infos about the page
   * 
   * @param array $metas
   */
  function addMetas(array $metas = array()) {
    foreach($metas as $meta) {
      $this->addMeta($meta["name"], $meta["content"]);
    }
  }
  
  /**
   * 
   * @param string $url
   * @param string $title
   */
  function addChannel($url, $title) {
    $this->channels["$title"] = $url;
  }
  
  /**
   * 
   * @param string $style
   */
  function attachStyle($style) {
    $this->styles[] = (string) $style;
  }
  
  /**
   * 
   * @param array $styles
   */
  function attachStyles(array $styles = array()) {
    foreach($styles as $style) {
      $this->attachStyle($style);
    }
  }
  
  /**
   * 
   * @param string $script
   */
  function attachScript($script) {
    $this->scripts[] = (string) $script;
  }
  
  /**
   * 
   * @param array $scripts
   */
  function attachScripts(array $scripts = array()) {
    if(!is_array($scripts)) throw new InvalidValueException("Invalid value for parametr scripts passed to method Page::attachScripts. Expected array.");
    foreach($scripts as $script) {
      $this->attachScript($script);
    }
  }
  
  /**
   * Render meta tags
   * 
   * @return string
   */
  protected function renderMetas() {
    $output = "";
    foreach($this->metas as $meta) {
      $meta["name"] = strtolower($meta["name"]);
      if($meta["name"] === "charset") {
        $output .= "  <meta charset=\"{$meta["content"]}\">\n";
        continue;
      }
switch($meta["name"]) {
case "content-type":
case "content-language":
case "refresh":
case "cache-control":
  $attribute = "http-equiv";
  break;
default:
  $attribute = "name";
  break;
}
      $output .= "  <meta $attribute=\"{$meta["name"]}\" content=\"{$meta["content"]}\">\n";
    }
    return $output;
  }
  
  /**
   * Render page
   * 
   * @return string
   */
  function render() {
    $page = "<!DOCTYPE HTML>
<html>
<head>
  <title>$this->title</title>\n";
    $page .= $this->renderMetas();
    foreach($this->styles as $style) {
      $page .= "  <link rel=\"stylesheet\" type=\"text/css\" href=\""."$style"."\">\n";
    }
    foreach($this->scripts as $script) {
      $page .= "  <script src=\"$script\"></script>\n";
    }
    foreach($this->channels as $title => $url) {
      $page .= "  <link rel=\"alternate\" type=\"application/rss+xml\" title=\"$title\" href=\"$url\">\n";
    }
    $page .= "</head>
<body>
";
    foreach($this->elements as $element) {
      $page .= $element->render();
    }
    $page .= "</body>
</html>";
    return $page;
  }
}
?>