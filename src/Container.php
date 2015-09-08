<?php
namespace HTML;

/**
 * Container
 *
 * @author Jakub Konečný
 */
class Container extends BaseElement {
  /** @var array */
  protected $elements = array();
  
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
  function append(BaseElement $element) {
    $count = count($this->elements);
    $this->elements[] = $element;
    return $count;
  }
  
  /**
   * @param string|HTMLCode $content
   * @return void
   */
  function inject($content) {
    if(is_string($content)) $this->elements[] = new HTMLCode($content);
    elseif($content instanceof HTMLCode) $this->elements[] = $content;
    else throw new InvalidValueException("Invalid value for parametr content passed to method Page::inject. Expected HTMLCode or string.");
  }
  
  /**
   * @param int $nodeId
   * @return void
   */
  function remove($nodeId) {
    unset($this->elements[$nodeId]);
  }
  
  /**
   * @param TextNode|string $node
   * @return void
   */
  function addText($node) {
    if(is_string($node)) $this->elements[] = new TextNode($node);
    elseif($node instanceof TextNode) $this->elements[] = $node;
    else throw new InvalidValueException("Invalid value for parametr node passed to method Container::addText. Expected string or TextNode.");
  }
  
  /**
   * @param string $content
   * @return Elements\Paragraph
   */
  function addParagraph($content = "") {
    $element = new Elements\Paragraph($content);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
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
   * @param int $level
   * @param string $content
   * @return Elements\Heading
   */
  function addHeading($level, $content = "") {
    $element = new Elements\Heading($level, $content);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
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
   * @param int $colls
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
  
  function renderOpening() {
    return parent::renderOpening() . "\n";
  }
  
  /**
   * Render the container
   * 
   * @return string
   */
  function renderContent() {
    $return = "";
    foreach($this->elements as $part) {
      $return .= $part->render();
    }
    return $return;
  }
}
?>