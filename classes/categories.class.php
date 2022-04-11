<?php
    class Categories extends DbConnect {

        protected function getCategory($catName) {
            $sql = "SELECT * FROM categories WHERE catName = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$catName]);

            $results = $stmt->fetchAll();
            return $results;
        }
    }
?>