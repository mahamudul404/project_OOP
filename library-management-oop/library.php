<?php
class Library
{
  public $books = [];
  public $members = [];

  public function addBook($book)
  {
    $this->books[] = $book;
  }

  public function listBooks()
  {
    foreach ($this->books as $book) {
      echo "Title: {$book->title}, Author: {$book->author}, Status: {$book->status} \n";
    }
  }

  public function addMember($member)
  {
    $this->members[] = $member;
  }

  public function borrowBook($member, $book)
  {
    if ($member->borrowBook($book)) {
      echo "{$member->name} borrowed {$book->title}\n";
    } else {
      echo "{$book->title} is not available.\n";
    }
  }

  public function returnBook($member, $book)
  {
    if ($member->returnBook($book)) {
      echo "{$member->name} returned {$book->title}\n";
    } else {
      echo "{$book->title} was not borrowed by {$member->name}\n";
    }
  }
}
