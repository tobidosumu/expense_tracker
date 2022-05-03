<?php 
  include "./classes/categoryValidation.php";
   
    $catValid = $catUpdate = $catName = $id = false;
    
    //when add category name is clicked
    if (isset($_POST['submit'])) {

      $catName = $_POST['catName'];

      //instantiates Category Class for getValidCatNameMessage method
      $catValid = Category::getValidCatNameMessage($catName);

    }

    //when update category button is clicked
    if (isset($_POST['update'])) {

      echo "I'm here!";
      //instantiates Category Class for editCategoryName
      $newCatName = $_POST['newCatName'];
      $id = $_POST['id'];
      
      $result = Category::updateCategoryName($id, $catName);
      var_dump($result);

      header("Location: index.php?newCatName={$newCatName}");
    }

  // including HTML files
  include "./includes/addCat.php";
  include "./includes/updateModal.php";
  include "./includes/sidebar.php";
?>

<div class="container-fluid padding">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <h4 class="text-uppercase">Categories</h4> 

      <?php 
         echo $catValid;
         echo $catUpdate;
      ?>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa fa-plus-square"></i> Add Category</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col" class="h6">SN</th>
        <th scope="col" class="h6">Category Name</th>
        <th scope="col" class="h6">Date Created</th>
        <th scope="col" class="h6">Active</th>
      </tr>
    </thead>
  
    <tbody>

      <?php
        $categories = Category::getCategories();
        
        foreach ($categories as $category) {
          echo "<tr>";
          echo "<td>" . $category->getSerialNum() . "</td>";
          echo "<td>" . $category->getCategoryName() . "</td>";
          echo "<td>" . $category->getDateCreated() . "</td>";
          echo "<td>" . "<a href='updateModal.php?catName={$category->getCategoryName()}&&sn={$category->getSerialNum()}' class='btn btn-outline-info btn-sm' 
          data-bs-toggle='modal' data-bs-target='#updateModal'><i class='fa fa-edit'></i> Update</a>" . "</td>";
          echo "</tr>";
        }
      ?>

    </tbody>
  </table>

</div>