<?php
class ItemModel
{
    private $id;
    private $title;
    private $description;
    private $price;
    private $category_id;
    private $picture; // TODO

    const MAX_TITLE_LENGTH = 100;
    const MAX_DESCRIPTION_LENGTH = 255;

    public function __construct($id, $title, $description, $price, $category_id) {
        $this->id = $id;
        $this->setTitle($title);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setCategoryId($category_id);
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function setTitle($title) {
        if (strlen($title) > self::MAX_TITLE_LENGTH) {
            throw new Exception("Item title must not be more than " . self::MAX_TITLE_LENGTH . " characters long.");
        }

        $this->title = $title;
    }

    public function setDescription($description) {
        if (strlen($description) > self::MAX_DESCRIPTION_LENGTH) {
            throw new Exception("Item description must not be more than " . self::MAX_DESCRIPTION_LENGTH . " characters long.");
        }

        $this->description = $description;
    }

    public function setPrice($price) {
        if (!is_int($price)) {
            throw new Exception("Given price value " . $price . " is invalid. Price value must be whole number.");
        }

        if ($price < 0) {
            throw new Exception("Given price value " . $price . " is invalid. Price value must be non-negative.");
        }

        $this->price = $price;
    }

    public function setCategoryId($category_id) {
        if (is_null($category_id)) {
            throw new Exception("Category ID provided is null.");
        }

        if (!is_int($category_id)) {
            throw new Exception("Category ID provided is not an integer.");
        }

        $this->category_id = $category_id;
    }
}