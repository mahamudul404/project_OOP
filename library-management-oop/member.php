<?php
class Member
{
  public $name;
  public $borrowedBooks = [];

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function borrowBook($book)
  {
    if ($book->borrow()) {
      $this->borrowedBooks[] = $book;
      return true;
    }
    return false;
  }

  public function returnBook($book)
  {
    foreach ($this->borrowedBooks as $key => $borrowedBook) {
      if ($borrowedBook === $book) {
        unset($this->borrowedBooks[$key]);
        $book->returnBook();
        return true;
      }
    }
    return false;
  }
}
