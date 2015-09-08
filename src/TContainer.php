<?php
namespace HTML;

trait TContainer {
  /** @var array */
  protected $elements = array();
  
  /**
   * Append an element
   * 
   * @param BaseElement $element
   */
  function append(BaseElement $element) {
    $this->elements[] = $element;
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
   * Adds new heading
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
}
?>