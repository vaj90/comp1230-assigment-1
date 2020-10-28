<?php

//require '../model/Category.php';

define('CATEGORY_ID', 0);
define('CATEGORY_NAME', 1);
define('CATEGORY_DESCRIPTION', 2);

class DataManager {
    private $flatfile_db;

    public function __construct($flatfile_db) {
        $this->flatfile_db = $flatfile_db;
        $this->flatfile_db->datadir = __DIR__ . DS . 'data' . DS;
    }

    public function addCategory($id, $name, $description) {
        // DEBUG
        echo '<br />' . $id;
        echo '<br />' . $name;
        echo '<br />' . $description;

        // Create Category object first. The constructor validates the given values.
        // If object is created successfully, the given values are valid.
        echo '<br /> before inserting'; // DEBUG
        $category_obj = new Category($id, $name, $description); // WHY Category constructor is not called?
        echo '<br /> after inserting'; // DEBUG

        // Save
        $new_category[CATEGORY_ID] = $id;
        $new_category[CATEGORY_NAME] = $name;
        $new_category[CATEGORY_DESCRIPTION] = $description;
        echo '<br /> before inserting';
        $this->flatfile_db->insert('categories.txt', $new_category);
    }

    public function updateCategory($category_id, $title, $description) {
        // TODO
    }

    public function fetchAllCategories() {
        // TODO
    }

    public function addItem($title, $description, $price) {
        // TODO
    }

    public function fetchItem($item_id) {
        // TODO
    }

    public function updateItem($item_id, $title, $description, $price) {
        // TODO
    }

    public function deleteItem($item_id) {
        // TODO
    }

    public function fetchAllItems() {
        // TODO
    }

    public function fetchAllItemsOfCategory($category_id) {
        // TODO
    }

    public function searchItems($search_keyword) {
        // TODO
    }
}