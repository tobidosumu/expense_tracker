<?php

use LDAP\Result;

require_once "./require/dbConnect.php";

Category::$dbConn = $dbConn;

class Category
{
    //properties
    public static $dbConn;
    private $sn;
    private $catName;
    private $dateCreated;
    private $status;
    private static $categories = [];

    //methods
    public function __construct($catName, $dateCreated = null, $status = null)
    {
        $this->sn = count(self::$categories) + 1;
        $this->catName = $catName;
        $this->dateCreated = $dateCreated;
        $this->status = $status;
        self::$categories[] = $this;
    }

    //saves categories to database
    public static function createCategory($category)
    {
        $insertCategory = self::$dbConn->query("INSERT INTO categories (catName) VALUES ('$category')");

    }

    //validates category name input with existing category names in db
    private static function validateCategoryName($catName) 
    {
        $result = self::$dbConn->query("SELECT catName FROM categories WHERE catName = '$catName'");

        if (mysqli_num_rows($result) > 0) {
            
            return "<h6 class='ml-3 text-danger'>" ."This category name already exists!". "</h6>";

        } else {
  
            return self::createCategory($catName) ."". "<h6 class='ml-3 text-success'>" ."Category name successfully inserted!". "</h6>";
              
        }
    }

    //fetches categories from db
    private static function fetchCategories()
    {
        $result = self::$dbConn->query("SELECT * from categories");
        
        if ($result->num_rows > 0)  {
            foreach ($result as $category) {
                new Category($category['catName'], $category['dateCreated'], $category['active']);
            }
        }
    } 

    //get catname validation message
    public static function getValidCatNameMessage($catName) 
    {
        return self::validateCategoryName($catName);
    }

    //returns category name
    public static function getCategories()
    {
        self::fetchCategories();
        return self::$categories;
    }

    //returns category id
    public function getSerialNum()
    {
        return $this->sn;
    }

    //returns category name
    public function getCategoryName()
    {
        return $this->catName;
    }

    //returns current date and time of enrty
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
}
