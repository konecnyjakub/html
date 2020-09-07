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
    $this->elements[] = $element = new Elements\Paragraph($content);
    return $element;
  }
  
  /**
   * Add a row break
   */
  public function addRowBreak(): Elements\RowBreak {
    $this->elements[] = $element = new Elements\RowBreak();
    return $element;
  }

  /**
   * Add new div element
   */
  public function addDiv(string $id = ""): Elements\Div {
    $this->elements[] = $element = new Elements\Div($id);
    return $element;
  }
  
  /**
   * Add new span element
   */
  public function addSpan(string $id = ""): Elements\Span {
    $this->elements[] = $element = new Elements\Span($id);
    return $element;
  }
  
  /**
   * Add new table
   */
  public function addTable(int $colls): Table {
    $this->elements[] = $element = new Table($colls);
    return $element;
  }

  public function addList(string $type = "ul"): Elements\ListElement {
    $this->elements[] = $element = new Elements\ListElement($type);
    return $element;
  }
  
  /**
   * Add new image
   */
  public function addImage(string $source = ""): Elements\Image {
    $this->elements[] = $element = new Elements\Image($source);
    return $element;
  }

  /**
   * Adds new heading
   */
  public function addHeading(int $level, string $content = ""): Elements\Heading {
    $this->elements[] = $element = new Elements\Heading($level, $content);
    return $element;
  }
  
  /**
   * Add new link
   */
  public function addLink(string $text = "", string $href = ""): Elements\Link {
    $this->elements[] = $element = new Elements\Link($text, $href);
    return $element;
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
    $this->elements[] = $element = new Container($type, $id);
    return $element;
  }
  
  /**
   * Add new form
   */
  public function addForm(string $name = "", string $action = "", string $method = "", string $target = "", string $id = ""): Forms\Form {
    $this->elements[] = $element = new Forms\Form($name, $action, $method, $target, $id);
    return $element;
  }
}
?>