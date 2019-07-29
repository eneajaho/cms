<div class="col-sm-12 col-md-4 mb-3">

<!-- Search Box -->
  <div class="d-flex justify-content-center align-items-center card mb-4 shadow-lg bg-white p-2 rounded border-0">
    <form class="form-inline" action="<?php echo $cms_url; ?>/includes/search.php" method="get" >
      <div class="form-group mb-3 mt-3 mr-3">
        <input type="text" class="form-control" name="search" placeholder="Search...">
      </div>
     <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>  Search</button>
    </form>
  </div>

<?php

 if (isset($_GET['id'])) {
  $post_id = $_GET['id'];

  global $connection;
  global $cms_url;

  $select_post = "SELECT * FROM posts WHERE post_id = '{$post_id}' ";
  $select_post_query = mysqli_query($connection, $select_post);

  while ($row = mysqli_fetch_assoc($select_post_query)) { 
    $post_author = $row['post_author'];
  
    $select_user = "SELECT * FROM users WHERE username = '$post_author'";
    $select_user_query = mysqli_query($connection, $select_user);

    while ($row = mysqli_fetch_assoc($select_user_query)) {
      $user_firstname = $row['user_firstname'];   
      $user_lastname = $row['user_lastname']; 
      $user_email = $row['user_email']; 
      $user_role = $row['user_role'];
      $user_description = $row['user_description'];
      $user_image = $row['user_image'];

      echo "  <div class='card mb-4 bg-white rounded shadow-lg border-0 card-profile'>
      <div class='card-avatar'>
          <img class='img-fluid' src='{$cms_url}/img/$user_image' />
      </div>
      <div class='card-body'>
        <h6 class='card-category text-gray'>This post was written by:</h6>
        <h4 class='card-title'>{$user_firstname} {$user_lastname}</h4>
        <p class='card-description'>{$user_description}</p>
        <a href='mailto:{$user_email}' class='btn btn-primary btn-round'>Send Email</a>
      </div>
    </div>";

    }
    }
 }
?>

<div class="card mb-4 shadow-lg bg-white rounded border-0">
  <div class="card-header text-white bg-primary">Categories</div>
    <ul class="list-group list-group-flush">
      <?php  
      $query = "SELECT * FROM categories";
      $select_all_categories_query = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li class='list-group item'><a class='nav-link' href='{$cms_url}/category.php?id={$cat_id}'>{$cat_title}</a></li>";
      }
      ?>
    </ul>
</div>

<div class="list-group mb-4 shadow-lg bg-white rounded border-0">
    <a href="#" class="list-group-item list-group-item-action active">Cras justo odio</a>
    <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
</div>

<div class="card mb-4 shadow-lg bg-white rounded border-0">
    <div class="card-header text-white bg-primary">Header</div>
    <div class="card-body">
      <h5 class="card-title">Primary card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
</div>