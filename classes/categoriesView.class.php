<?php
    class CategoriesView extends Categories {

        public function showCategory($catName) {
            $results = $this->getCategory($catName);
            return $results;
            // echo "Category Name: " . $results['catName'];
        }

    }
?>