<?php

    class CategoriesContr extends Categories {

        private $catName;

        public function __construct($catName) {
            $this->catName = $catName;
            return $catName;
        }

    }
?>