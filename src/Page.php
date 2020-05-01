<?php
declare(strict_types=1);

namespace HTML;

/**
 * HTML Page
 *
 * @author Jakub Konečný
 */
class Page {
  public string $title;
  /** @var string[] */
  protected array $scripts = [];
  protected array $metas = [];
  /** @var string[] */
  protected array $styles = [];
  /** @var string[] */
  protected array $channels = [];
  
  use TContainer;
  
  /**
   * Add meta info about the page
   */
  public function addMeta(string $name, string $content): void {
    $this->metas[] = ["name" => $name, "content" => $content];
  }
  
  /**
   * Add more meta infos about the page
   */
  public function addMetas(array $metas = []): void {
    foreach($metas as $meta) {
      $this->addMeta($meta["name"], $meta["content"]);
    }
  }
  
  /**
   * Attach a channel to the page
   */
  public function addChannel(string $url, string $title): void {
    $this->channels[$title] = $url;
  }
  
  /**
   * Attach a style to the page
   */
  public function attachStyle(string $style): void {
    $this->styles[] = $style;
  }
  
  /**
   * Attach styles to the page
   * 
   * @param string[] $styles
   */
  public function attachStyles(array $styles = []): void {
    foreach($styles as $style) {
      $this->attachStyle($style);
    }
  }
  
  /**
   * Attach a script to the page
   */
  public function attachScript(string $script): void {
    $this->scripts[] = $script;
  }
  
  /**
   * Attach scripts to the page
   * 
   * @param string[] $scripts
   */
  public function attachScripts(array $scripts = []): void {
    foreach($scripts as $script) {
      $this->attachScript($script);
    }
  }
  
  /**
   * Render meta tags
   */
  protected function renderMetas(): string {
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
   */
  public function render(): string {
    $page = "<!DOCTYPE HTML>
<html>
<head>
  <title>$this->title</title>\n";
    $page .= $this->renderMetas();
    foreach($this->styles as $style) {
      $page .= "  <link rel=\"stylesheet\" type=\"text/css\" href=\"$style\">\n";
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

  public function __toString() {
    return $this->render();
  }
}
?>