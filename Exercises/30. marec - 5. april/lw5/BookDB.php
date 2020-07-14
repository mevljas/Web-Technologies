<?php

require_once 'Book.php';

/*
 * BookDB simulates a database of books. 
 *
 * Usually, this kind of data would be fetched from a database. But
 * for this exercise, we will use a set of hard-coded books provided 
 * in a associative array.
 */
class BookDB {

    /**
     * Returns the list of all books from the 'database'  
     * 
     * @return Associative array of all books.
     */
    public static function getAllBooks() {
        $books = array();
        $books[1] = new Book(1, "Prolog Programming for Artificial Intelligence", "Ivan Bratko", 35);
        $books[2] = new Book(2, "Arhitektura računalniških sistemov", "Dušan Kodek", 56);
        $books[3] = new Book(3, "Managing Information Systems Security and Privacy", "Denis Trček", 23);
        $books[4] = new Book(4, "Študijski koledar", "FRI", 5);

        return $books;
    }

    /**
     * Returns a book with a given ID. If no such book exists, an exception is thrown.
     * @param type $id 
     * @return type Book
     */
    public static function get($id) {
        $allBooks = self::getAllBooks();

        if (isset($allBooks[$id])) {
            return $allBooks[$id];
        } else {
            throw new InvalidArgumentException("There is no book with id = $id.");
        }
    }

    public static function find($query) {
        # Implement search functionality.
        # You may find the following function useful http://php.net/stripos
        $found = [];
        foreach (self::getAllBooks() as $key => $value) {
            foreach ($value as $key2 => $value2) {
                if(stripos($value2, $query) !== false){
                    array_push($found, $value);
                }
            }
        }
        
        return $found;
    }
}