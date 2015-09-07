<?php
namespace HTML;

/**
 * Container
 *
 * @author Jakub Konečný
 */
class Container extends BaseElement {
  /** @var array */
  protected $parts = array();
  
  /**
   * @param string $name
   * @param string $id
   */
  function __construct($name, $id = "") {
    $this->name = (string) $name;
    $this->id = (string) $id;
  }
  
  /**
   * @param Element|Container $element
   * @return int
   */
  function append($element) {
    if($element instanceof BaseElement) { } else { exit("Invalid value for parametr element passed to method Container::append. Expected Element or Container."); }
    $count = count($this->parts);
    $this->parts[] = $element;
    return $count;
  }
  
  /**
   * @param string|HTMLCode $content
   * @return void
   */
  function inject($content) {
    if(is_string($content)) $this->parts[] = new HTMLCode($content);
    elseif($content instanceof HTMLCode) $this->parts[] = $content;
    else exit("Invalid value for parametr content passed to method Page::inject. Expected HTMLCode or string.");
  }
  
  /**
   * @param int $nodeId
   * @return void
   */
  function remove($nodeId) {
    unset($this->parts[$nodeId]);
  }
  
  /**
   * @param TextNode|string $node
   * @return void
   */
  function addText($node) {
    if(is_string($node)) $this->parts[] = new TextNode($node);
    elseif($node instanceof TextNode) $this->parts[] = $node;
    else exit("Invalid value for parametr node passed to method Container::addText. Expected string or TextNode.");
  }
  
  /**
   * @param string $content
   * @return Elements\Paragraph
   */
  function addParagraph($content = "") {
    $element = new Elements\Paragraph($content);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * @param string $source
   * @return Elements\Image
   */
  function addImage($source = "") {
    $element = new Elements\Image($source);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  } 
  
  /**
   * @param int $level
   * @param string $content
   * @return Elements\Heading
   */
  function addHeading($level, $content = "") {
    $element = new Elements\Heading($level, $content);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * @param string $id
   * @return Elements\Div
   */
  function addDiv($id = "") {
    $element = new Elements\Div($id);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * @param string $id
   * @return Elements\Span
   */
  function addSpan($id = "") {
    $element = new Elements\Span($id);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * @param int $colls
   * @return Table
   */
  function addTable($colls) {
    $element = new Table($colls);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  
  /**
   * @param string $type
   * @return Elements\ListElement
   */
  function addList($type = "ul") {
    $element = new Elements\ListElement($type);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * 
   * @param string $text
   * @param string $href
   * @return Elements\Link
   */
  function addLink($text = "", $href = "") {
    $element = new Elements\Link($text, $href);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
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
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * @param string $name
   * @param string $action
   * @param string $method
   * @param string $target
   * @param string $id
   * @return Forms\Form
   */
  function addForm($name = "", $action = "", $method = "", $target = "", $id = "") {
    $element = new Forms\Form($name, $action, $method, $target, $id);
    $count = count($this->parts);
    $this->parts[$count] = $element;
    $return = & $this->parts[$count];
    return $return;
  }
  
  /**
   * Render the container
   * 
   * @return string
   */
  function render() {
    $return = "<$this->name";
    if($this->class) $return .= " class=\"$this->class\"";
    if($this->id) $return .= " id=\"$this->id\"";
    $return .= ">\n";
    foreach($this->parts as $part) {
      $return .= $part->render();
    }
    $return .= "</$this->name>\n";
    return $return;
  }
}
?>