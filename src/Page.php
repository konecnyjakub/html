<?php
namespace HTML;

/**
 * HTML Page
 *
 * @author Jakub Konečný
 */
class Page {
  /** @var array */
  protected $elements = array();
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
   * Add new text node
   * 
   * @param \HTML\TextNode|string $node
   */
  function addText($node) {
    if(is_string($node)) $this->elements[] = new TextNode($node);
    elseif($node instanceof TextNode) $this->elements[] = $node;
    else throw new InvalidValueException("Invalid value for parametr node passed to method Container::addText. Expected string or TextNode.");
  }
  
  /**
   * Add new paragraph
   * 
   * @param string $content
   * @return Elements\Paragraph
   * 
   */
  function addParagraph($content = "") {
    $element = new Elements\Paragraph($content);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new div element
   * 
   * @param string $id
   * @return Elements\Div
   */
  function addDiv($id = "") {
    $element = new Elements\Div($id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new span element
   * 
   * @param string $id
   * @return Elements\Span
   */
  function addSpan($id = "") {
    $element = new Elements\Span($id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new table
   * 
   * @param string $colls
   * @return Table
   */
  function addTable($colls) {
    $element = new Table($colls);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new image
   * 
   * @param string $source
   * @return Elements\Image
   */
  function addImage($source = "") {
    $element = new Elements\Image($source);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  } 
  
  /**
   * 
   * @param string $type
   * @return Elements\ListElement
   */
  function addList($type = "ul") {
    $element = new Elements\ListElement($type);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * 
   * @param int $level
   * @param string $content
   * @return Elements\Heading
   */
  function addHeading($level, $content = "") {
    $element = new Elements\Heading($level, $content = "");
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new link
   * 
   * @param string $text
   * @param string $href
   * @return Elements\Link
   */
  function addLink($text = "", $href = "") {
    $element = new Elements\Link($text, $href);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new section
   * 
   * @param string $id
   * @param string $type
   * @return Container
   */
  function addSection($id = "", $type = "section") {
    $allowed_types = array("section", "article", "aside", "nav", "header", "footer");
    $type = strtolower($type);
    if(!in_array($type, $allowed_types)) $type = "section";
    $element = new Container($type, $id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new form
   * 
   * @param string $name
   * @param string $action
   * @param string $method
   * @param string $target
   * @param string $id
   * @return Forms\Form
   */
  function addForm($name = "", $action = "", $method = "", $target = "", $id = "") {
    $element = new Forms\Form($name, $action, $method, $target, $id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Append an element
   * 
   * @param BaseElement $element
   */
  function append($element) {
    if($element instanceof BaseElement) $this->elements[] = $element;
    else throw new InvalidValueException("Invalid value for parametr element passed to method Page::append. Expected Element or Container.");
  }
  
  /**
   * Insert text/html code
   * 
   * @param HTMLCode|string $content
   */
  function inject($content) {
    if(is_string($content)) $this->elements[] = new HTMLCode($content);
    elseif($content instanceof HTMLCode) $this->elements[] = $content;
    else throw new InvalidValueException("Invalid value for parametr content passed to method Page::inject. Expected HTMLCode or string.");
  }
  
  /**
   * Remove an element
   * 
   * @param int $node
   */
  function remove($node) {
    unset($this->elements[$node]);
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
switch($meta["name"]) {
case "content-type":
case "content-language":
case "refresh":
case "cache-control":
  $attribute = "http-equiv";
  break;
case "charset":
  $attribute = "charset";
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