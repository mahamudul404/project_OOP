<?php
class Book
{
  public $title;
  public $author;
  public $status; // 'available' or 'borrowed'

  public function __construct($title, $author)
  {
    $this->title = $title;
    $this->author = $author;
    $this->status = 'available';
  }

  public function borrow()
  {
    if ($this->status == 'available') {
      $this->status = 'borrowed';
      return true;
    }
    return false;
  }

  public function returnBook()
  {
    $this->status = 'available';
  }
}
