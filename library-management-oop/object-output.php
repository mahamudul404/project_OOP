<?php 
include 'book.php';
include 'member.php';
include 'library.php';

$library = new Library();

// add some books to the library

$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald");
$book2 = new Book("1934", "george owrel");
$library->addBook($book1);
$library->addBook($book2);

//add a member

$member1 = new Member('john Doe');
$library->addMember($member1);

//list all books 

$library->listBooks();

//borrow a book

$library->borrowBook($member1,$book1);

//list all book after borrowing
echo "\nBooks in Library after borrowing : \n";
$library->listBooks();

//return the book
$library->returnBook($member1,$book1);

//list all books after returning 

echo "\nBooks in library after returning : \n";
$library->listBooks();


