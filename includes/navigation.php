
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-primary shadow-lg">
  <a class="navbar-brand" href="<?php echo $cms_url; ?>">CMS System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <ul class="navbar-nav">
      <?php 
      $query = "SELECT * FROM categories";
      $select_all_categories_query = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];
        echo "<li class='nav-item active'><a class='nav-link' href='{$cms_url}/category.php?id={$cat_id}'>{$cat_title}</a></li>";
      }
      ?>
      

      <?php 
      if (isset($_SESSION['role'])) {
        if ($_SESSION['role'] == 'admin') {
          echo "<li class='nav-item active'><a class='nav-link' href='{$cms_url}/admin'>Dashboard</a></li>";
        }
      } else {
        echo "<li class='nav-item active'><a class='nav-link' href='{$cms_url}/includes/login.php'>Login</a></li>
        ";
      }
      
      ?>
    </ul>
  </div>
</nav>
<!-- Here starts the row of website -->
<div class="row mt-3">


