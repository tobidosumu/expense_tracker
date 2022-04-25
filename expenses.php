<?php 
include_once "./classes/expense.php";
include_once "./classes/category.php";
//include "./includes/autoloader.php";

  if (isset($_POST['submit']))
  {
    require_once "./classes/expense.php";

    $narration = $_POST['expNarrate'];
    $category = $_POST['expCategory'];
    $amount = $_POST['expAmount'];

    Expense::createExpense($narration, $category, $amount);
}

  // including HTML files
  include "./includes/addExp.php";
  include "./includes/sidebar.php";
?>

<div class="container-fluid padding">

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <h4 class="text-uppercase">Expenses</h4>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ml-auto">
          <li class="nav-item">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fa fa-plus-square"></i> Add Expense</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col" class="h6">SN</th>
        <th scope="col" class="h6">Expense Narration</th>
        <th scope="col" class="h6">Category</th>
        <th scope="col" class="h6">Amount</th>
        <th scope="col" class="h6">Date of Expenditure</th>
      </tr>
    </thead>
    <tbody>

      <?php
        $expenses = Expense::getExpenses();
        foreach ($expenses as $expense) {
          
          echo "<tr>";
          echo "<td>" . $expense->getId() . "</td>";
          echo "<td>" . $expense->getExpNarrate() . "</td>";
          echo "<td>" . $expense->getExpCategory() . "</td>";
          echo "<td>" . $expense->getExpAmount() . "</td>";
          echo "<td>" . $expense->getExpDate() . "</td>";
          echo "</tr>";
        }
        ?>
        
    </tbody>
  </table>

</div>