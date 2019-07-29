<?php include './includes/admin_header.php'; ?>

<?php include './includes/admin_sidebar.php'; ?>

<div class="main-panel">

<?php include './includes/admin_navigation.php'; ?>

<div class="content">
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
    <!-- Add Category  -->
      <div class="card">
      <div class="card-header card-header-primary">
            <h4 class="card-title ">Add Categories</h4>
            <p class="card-category"> Here you can add new categories</p>
          </div>
          <!-- Function addCategory() in functions.php -->
          <?php addCategory(); ?>
            <form method="post" class='p-4' action="categories.php">
              <div class="form-group">
                <label for="add-category" class="bmd-label-floating">Add Category</label>
                <input type="text" name="cat_title" class="form-control" id="add-category">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Add Category</button>
            </form>
          </div>

    <!-- Edit Category  -->
    <?php editCategory(); ?>
    <!-- Categories Table  -->
    </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Categories</h4>
            <p class="card-category"> Here you'll find all categories</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class=" text-primary">
                  <th> 
                    ID
                  </th>
                  <th>
                    Category Name
                  </th>
                  <th class="text-center">
                    Edit
                  </th>
                  <th class="text-center">
                  Delete
                  </th>
                </thead>

    <tbody>
    <!-- Shows Categories in Table data through looping  -->
      <?php showCategories();  ?>
    <!-- Delete Category  -->
      <?php deleteCategory(); ?>
    </tbody>
      </table>
      </div>
      </div>
      </div>
      </div>
    </div>
  </div>          
 </div>
</div>

<?php include './includes/admin_footer.php'; ?>