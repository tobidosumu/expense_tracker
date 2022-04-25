<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">Add New Expense</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="expenses.php" method="POST">
              <div class="mb-4">
                <label for="recipient-name" class="col-form-label mt-2">Expense Narration:</label>
                <textarea class="form-control" name="expNarrate" placeholder="Enter expense narration"></textarea>
                <label for="recipient-name" class="col-form-label mt-3">Select Category:</label>
                <select name="expCategory" class="form-select">
                  <option selected>Select Category</option>
                  <?php
                    $categories = Category::getCategories();
                    foreach ($categories as $category) {
                      echo "<option value='".$category->getCategoryName()."'>" .$category->getCategoryName(). "</option>";
                    }
                  ?>
                </select>
                <label for="recipient-name" class="col-form-label mt-3">Expense Amount:</label>
                <input type="text" class="form-control text-black" name="expAmount" placeholder="Enter expense amount">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-success" value="Add Expense" name="submit">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>