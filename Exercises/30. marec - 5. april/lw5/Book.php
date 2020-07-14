<?php

class Book {
    public $title = null;
    public $author = null;
    public $id = 0;
    public $price = 0;

    /**
     * Constructor: creates a new instance.
     * @param type $id
     * @param type $title
     * @param type $author
     */
    public function __construct($id, $title, $author, $price) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    /**
     * A string representation
     * @return type String
     */
    public function __toString() {
        return sprintf("Book{%d, %s, %s}", $this->id, $this->author, $this->title);
    }

}