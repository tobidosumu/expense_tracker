<?php
    class CategoryValidation {
        //properties
        private $data;
        private $errors = [];
        private static $fields = ['catName'];

        //methods 
        public function __construct($post_data) {
            $this->data  =  $post_data;
        }

        //validates addCat.inc.php form inputs
        public function validateCategoryForm() {
            foreach(self::$fields as $field) {
                if(!array_key_exists($field, $this->data)) {
                    $this->addError($field, "$field not present in data");
                }
            }
            $this->categoryValid();
            return $this->errors;
        }

        //ensures catName is not empty and is greater one
        public function categoryValid() {
            $val =  trim($this->data['catName']);

            if (empty($val)) {
                $this->addError('catName', 'This field cannot be empty.');
            } else {
                if(strlen(filter_var($val, FILTER_SANITIZE_SPECIAL_CHARS)) === 1) {
                    $this->addError('catName', 'category must be at least 2 chars long.');
                }
            }
        }

        //handles errors...stores errors
        private function addError($key, $val) {
            $this->errors[$key] = $val;

        }
       
    }

?>