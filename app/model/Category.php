<?php
class Category
{
    private $id;
    private $name;
    private $description;
    const MAX_NAME_LENGTH = 60;
    const MAX_DESCRIPTION_LENGTH = 100;
    public function __construct($id, $name, $description) {
        // Generate ID only if the given name and description are valid.
        $this->id = $id;
        $this->setName($name);
        $this->setDescription($description);
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function setName($name) {
        if (trim($name) === '') {
            throw new Exception("Category name provided is empty.");
        }

        if (strlen($name) > self::MAX_NAME_LENGTH) {
            throw new Exception("Category name must not be more than " . self::MAX_NAME_LENGTH . " characters long.");
        }

        $this->name = $name;
    }

    public function setDescription($description) {
        if (trim($description) === '') {
            throw new Exception("Category description provided is empty.");
        }

        if (strlen($description) > self::MAX_DESCRIPTION_LENGTH) {
            throw new Exception("Category description must not be more than " . self::MAX_DESCRIPTION_LENGTH . " characters long.");
        }

        $this->description = $description;
    }
}