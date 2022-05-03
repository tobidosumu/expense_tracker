<?php require_once "./require/dbConnect.php";

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

    //saves category to database
    public static function createCategory($category)
    {
        self::$dbConn->query("INSERT INTO categories (catName) VALUES ('$category')");

    }

    //validates category name before inserting it into the database
    private static function validateCategoryName($catName) 
    {
        $query = self::$dbConn->query("SELECT catName FROM categories WHERE catName = '$catName'");

        if (empty($catName)) {
            
            return "<h6 class='ml-3 text-danger'>" ."Please enter a category name.". "</h6>";

        } elseif (mysqli_num_rows($query) > 0) {

            return "<h6 class='ml-3 text-danger'>This category name already exists.</h6>";

        } else {
  
            return self::createCategory($catName) ."". "<h6 class='ml-3 text-success'>Category name successfully added!</h6>";
              
        }
    }

    //update category name
    public static function updateCategoryName($id, $newCatName)
    {
        $query = self::$dbConn->query("UPDATE categories SET catName='$newCatName' WHERE id='$id'");

        $result = mysqli_num_rows($query);

        if ($result === false) {

            return "<h6 class='ml-3 text-danger'>Sorry, category name not updated.</h6>";

        } else {
            
            return self::createCategory($newCatName) ."". "<h6 class='ml-3 text-info'>Category name successfully updated!</h6>";
        }
        
    }

    //returns catname validation message
    public static function getValidCatNameMessage($catName) 
    {
        return self::validateCategoryName($catName);
    }

    //fetches categories from database
    private static function fetchCategories()
    {
        $result = self::$dbConn->query("SELECT * from categories");
        
        if ($result->num_rows > 0)  {
            foreach ($result as $category) {
                new Category($category['catName'], $category['dateCreated'], $category['active']);
            }
        }
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
