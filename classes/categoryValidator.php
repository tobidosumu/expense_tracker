<?php
    require_once './require/dbConnect.php';
    //create a catName validator class to handle validation
    //create a constructor method which takes in the POST data(catName) from addCat form
    //create a method to check if category name already exists in the database
    //return error message: "This category already exists in database!" if category is present in db

    class CatNameValidator
    {
        //properties
        private $data;
        private $errors = [];
        private static $fields = ['catName'];


        //method
        public function __construct($postData)
        {
            $this->data = $postData;
        }

        public function validateCategoryForm()
        {
            foreach(self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    $this->addError($field, "$field not present in data");
                }
            }
            $this->categoryValid();
            return $this->errors;
        }

        public function categoryValid()
        {
            $val = trim($this->data['catName']);

            if (empty($val)) {
                $this->addError('catName', "This field cannot be empty.");
            } else {
                if (strlen(filter_var($val, FILTER_SANITIZE_STRING) >= 2) ) {
                    $this->addError('catName', "Category name must be at least 2 chars long.");
                }
            }
        }

        private function addError($key, $val) 
        {
            $this->errors[$key] = $val;
        }

    }
 
?>