<?php


define('CATEGORY_ID', 0);
define('CATEGORY_NAME', 1);
define('CATEGORY_DESCRIPTION', 2);

class DataManager {
    private $flatfile_db;

    public function __construct($flatfile_db) {
        global $config;
        echo 'hey flafile';
        $this->flatfile_db = $flatfile_db;
        $this->flatfile_db->datadir = $config['DATA_PATH'];
    }

    public function addCategory($id, $name, $description) {
        // Create Category object first. The constructor validates the given values.
        // If object is created successfully, the given values are valid.
        $category_obj = new CategoryModel($id, $name, $description);
        // Save
        $new_category[CATEGORY_ID] = $id;
        $new_category[CATEGORY_NAME] = $name;
        $new_category[CATEGORY_DESCRIPTION] = $description;
        echo '<br /> before inserting';
        //$this->flatfile_db->insert('categories.txt', $new_category);
    }

    public function updateCategory($category_id, $title, $description) {
        // TODO
    }
    public function RemoveCategory($category_id) {

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