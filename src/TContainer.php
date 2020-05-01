<?php
declare(strict_types=1);

namespace HTML;

/**
 * Trait Container
 * Contains common methods for Page and Container
 * 
 * @author Jakub Konečný
 */
trait TContainer {
  /** @var IRenderable[] */
  protected array $elements = [];
  
  /**
   * Append an element
   */
  public function append(BaseElement $element): void {
    $this->elements[] = $element;
  }
  
  /**
   * Insert text/html code
   */
  public function inject(string $content): void {
    $this->elements[] = new HTMLCode($content);
  }
  
  /**
   * Remove an element
   */
  public function remove(int $node): void {
    unset($this->elements[$node]);
  }
  
  /**
   * Add new text node
   */
  public function addText(string $text): void {
    $this->elements[] = new TextNode($text);
  }
  
  /**
   * Add new paragraph
   */
  public function addParagraph(string $content = ""): Elements\Paragraph {
    $element = new Elements\Paragraph($content);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }
  
  /**
   * Add a row break
   */
  public function addRowBreak(): Elements\RowBreak {
    $element = new Elements\RowBreak();
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }

  /**
   * Add new div element
   */
  public function addDiv(string $id = ""): Elements\Div {
    $element = new Elements\Div($id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }
  
  /**
   * Add new span element
   */
  public function addSpan(string $id = ""): Elements\Span {
    $element = new Elements\Span($id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }
  
  /**
   * Add new table
   */
  public function addTable(int $colls): Table {
    $element = new Table($colls);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }

  public function addList(string $type = "ul"): Elements\ListElement {
    $element = new Elements\ListElement($type);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }
  
  /**
   * Add new image
   */
  public function addImage(string $source = ""): Elements\Image {
    $element = new Elements\Image($source);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }

  /**
   * Adds new heading
   */
  public function addHeading(int $level, string $content = ""): Elements\Heading {
    $element = new Elements\Heading($level, $content);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }
  
  /**
   * Add new link
   */
  public function addLink(string $text = "", string $href = ""): Elements\Link {
    $element = new Elements\Link($text, $href);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }
  
  /**
   * Add new section
   */
  public function addSection(string $id = "", string $type = "section"): Container {
    $allowed_types = ["section", "article", "aside", "nav", "header", "footer"];
    $type = strtolower($type);
    if(!in_array($type, $allowed_types, true)) {
      $type = "section";
    }
    $element = new Container($type, $id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }
  
  /**
   * Add new form
   */
  public function addForm(string $name = "", string $action = "", string $method = "", string $target = "", string $id = ""): Forms\Form {
    $element = new Forms\Form($name, $action, $method, $target, $id);
    $count = count($this->elements);
    $this->elements[$count] = $element;
    return $this->elements[$count];
  }
}
?>