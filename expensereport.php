<?php 
include "./includes/addCat.php";
include "./includes/sidebar.php";

?>



<div class="container-fluid padding">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <h4 class="text-uppercase">Expense Report</h4>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa fa-plus-square"></i> Add Category</button>
          </li>
        </ul>
      </div>
      
    </div>
  </nav>



  <div class="container-md mb-4 bg-dark text-center">
    <form action="" method="post">
      <input type="date" name="" id="">
      <input type="date" name="" id="">
    </form>
  </div>


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
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>

</div>