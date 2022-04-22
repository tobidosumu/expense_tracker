<?php
    require_once "require/dbConnect.require.php";

    Category::$dbConn = $dbConn;

    class Category {
        //properties
        public static $dbConn;
        private $sn;
        private $catName;
        private $dateCreated;
        private $status;
        private static $categories = []; 

        //methods
        public function __construct($catName) {
            $this->sn = count(self::$categories)+1;
            $this->catName = $catName;
            $this->dateCreated;
            $this->status;
            self::$categories[] = $this; 
        }

        //saves categories to database
        public static function createCategory($category){
            $insertCategory = self::$dbConn->query("INSERT INTO categories 
            (catName) VALUES ('$category')");
            if ($insertCategory === true){
                return $category;
            }
        }

        //fetches categories from db
        private static function fetchCategories() {
            $result = self::$dbConn->query("SELECT * from categories");

            if ($result->num_rows > 0) { 
                foreach($result as $category) {
                   new Category($category['catName']);
                } 
            }
        } 

        //gets category name
        public static function getCategories() {
            self::fetchCategories();
            return self::$categories;
        }

        //returns category id
        public function getSerialNum() {
            return $this->sn;
        }

        //returns category name
        public function getCategoryName() { 
            return $this->catName;
        }

    }

?>