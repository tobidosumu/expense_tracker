<?php
    require_once "./require/dbConnect.php";

    //extend to DbConnect class so I can access the connection property
    class CatNameValidator extends DbConnect
    {
        //properties
        private $field = ['catName'];

        //methods 
        public function __construct($catName)
        {
            $this->field = $catName;
        }

        //method
        public function validateCategoryName($field)
        {

            //using connection property to connect to database to check if catName exists
            $record = $this->connection->query("SELECT catName FROM categories WHERE catName=$field");
            
            //passing validation messages into variables
            $errorMsg = "<h6 class='text-danger'>" ."This category name already exists!". "</h6>";
            $validMsg = "<h6 class='text-success'>" ."Category name successfully created!". "</h6>";

            //if a record of catName exists in db echo errorMsg if not echo validMsg
            if($record) {
                echo $errorMsg;
            } else {
                echo $validMsg;
            } return $this;

        }

    }
 
?>