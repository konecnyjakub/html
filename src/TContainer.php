<?php
namespace HTML;

/**
 * Trait Container
 * Contains common methods for Page and Container
 * 
 * @author Jakub Konečný
 */
trait TContainer {
  /** @var array */
  protected $elements = array();
  
  /**
   * Append an element
   */
  function append(BaseElement $element) {
    $this->elements[] = $element;
  }
  
  /**
   * Insert text/html code
   * 
   * @param  IRenderable|string $content
   */
  function inject($content) {
    if(is_string($content)) {
      $this->elements[] = new HTMLCode($content);
    } elseif($content instanceof IRenderable) {
      $this->elements[] = $content;
    }
    throw new InvalidValueException("Invalid value for parametr content passed to method " . __CLASS__ . "::" . __METHOD__ . ". Expected IRenderable or string.");
  }
  
  /**
   * Remove an element
   */
  function remove(int $node) {
    unset($this->elements[$node]);
  }
  
  /**
   * Add new text node
   * 
   * @param TextNode|string $node
   */
  function addText($node) {
    if(is_string($node)) {
      $this->elements[] = new TextNode($node);
    } elseif($node instanceof TextNode) {
      $this->elements[] = $node;
    }
    throw new InvalidValueException("Invalid value for parametr node passed to method " . __CLASS__ . "::" . __METHOD__ . ". Expected string or TextNode.");
  }
  
  /**
   * Add new paragraph
   */
  function addParagraph(string $content = ""): Elements\Paragraph {
    $element = new Elements\Paragraph($content);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add a row break
   */
  function addRowBreak(): Elements\RowBreak {
    $element = new Elements\RowBreak();
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new div element
   */
  function addDiv(string $id = ""): Elements\Div {
    $element = new Elements\Div($id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new span element
   */
  function addSpan(string $id = ""): Elements\Span {
    $element = new Elements\Span($id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new table
   */
  function addTable(string $colls): Table {
    $element = new Table($colls);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }

  function addList(string $type = "ul"): Elements\ListElement {
    $element = new Elements\ListElement($type);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new image
   */
  function addImage(string $source = ""):  Elements\Image{
    $element = new Elements\Image($source);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  } 
  
  /**
   * Adds new heading
   */
  function addHeading(int $level, string $content = ""): Elements\Heading {
    $element = new Elements\Heading($level, $content);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new link
   */
  function addLink(string $text = "", string $href = ""): Elements\Link {
    $element = new Elements\Link($text, $href);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new section
   */
  function addSection(string $id = "", string $type = "section"): Container {
    $allowed_types = array("section", "article", "aside", "nav", "header", "footer");
    $type = strtolower($type);
    if(!in_array($type, $allowed_types)) {
      $type = "section";
    }
    $element = new Container($type, $id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
  
  /**
   * Add new form
   */
  function addForm(string $name = "", string $action = "", string $method = "", string $target = "", string $id = ""): Forms\Form {
    $element = new Forms\Form($name, $action, $method, $target, $id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    $return = & $this->elements[$count];
    return $return;
  }
}
?>