<?php include "./includes/autoloader.inc.php";

$error_message = false;
if (isset($_POST['submit'])) {

  //create new allowance
  $categoryValidation = new CategoryValidation($_POST);
  $errors = $categoryValidation->validateCategoryForm();

  if ($errors) {
    $catName = $errors['catName'];

    echo "<p>" . $catName . "</p>";
    // header("Location: index.php?catName={$catName}");
  }

  $catName = $_POST['catName'];

  Category::createCategory($catName);
}

// including HTML files
include "./includes/addCat.inc.php";
include "./includes/sidebar.inc.php";
?>

<div class="container-fluid padding">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <h4 class="text-uppercase">Categories</h4>

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
        echo "<td>" . date('d-M-Y') . "</td>";
        echo "<td>" . "Active" . "</td>";
        echo "</tr>";
      }
      ?>

    </tbody>
  </table>

</div>