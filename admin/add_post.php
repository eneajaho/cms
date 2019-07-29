<?php include './includes/admin_header.php'; ?>

<?php include './includes/admin_sidebar.php'; ?>

<div class="main-panel">

<?php include './includes/admin_navigation.php'; ?>

<div class="content">
  <div class="container-fluid">

    <div class="row m-0">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Add New Post</h4>
          <p class="card-category">Here you can add new posts</p>
        </div>
        <div class="card-body">
        <?php addPost(); ?>
        
        <form action="" method="post" enctype="multipart/form-data" >

        <div class="row">

          <div class="col-md-8 mb-3">

          <div class="col-md-12 mb-3 ">
            <label for="title">Post Title</label>
              <input type="text" class="form-control" name="title" >
          </div>
          <div class="col-md-12 mb-3 ">
            <label for="post_content">Post Content</label>
            <br>
            <textarea class="form-control border" name="post_content" id="post-body" cols="70%" rows="10"></textarea> 
          </div>

          <hr>
          <div class="text-center">SEO</div>

          <div class="col-md-12 mb-3 ">
          <label for="post_tags">Post Tags</label>
              <input type="text" class="form-control" name="post_tags">
              </div>
              <hr>
          </div>
        
          <div class="col-md-4 mb-3">
            <div class="col-md-12 mb-3 ">
              <label for="post_status">Post Status</label>
              <br>
                <select value="<?php echo $post_status; ?>" name="post_status" class="custom-select">
                  <option value='published'>Published</option>
                  <option value='draft'>Draft</option>
                </select>
            </div>
            <div class="col-md-12 mb-3 ">
            <label for="post_category">Post Category</label>        
            <select id="post_category" name="post_category_id" class="custom-select">
                <?php 
                  $query = "SELECT * FROM categories";
                  $select_categories = mysqli_query($connection, $query);       
                  while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='$cat_id'>{$cat_title}</option>";
                  }
                ?>
              </select>        
              </div>
        
            <div class="col-md-12 mb-3 ">
            <label for="post_author">Post Author</label>
            <select id="post_author" name="post_author" class="custom-select">
                <?php 
                  $query = "SELECT * FROM users";
                  $select_user = mysqli_query($connection, $query);       
                  while ($row = mysqli_fetch_assoc($select_user)) {
                    $user_id = $row['user_id'];
                    $username = $row['username'];
                    echo "<option value='$username'> {$username} </option>";
                  }
                ?>
              </select>     
              </div>
            <div class="col-md-12 mb-3 ">
              <label for="post_image">Post Image</label>
              <div><img src="../img/<?php echo $post_image; ?>" width="100%" alt=""></div>
              <input type="file" class="form-control-file btn btn-primary" name="image">
            </div>
        
          </div>

          
        <input class="btn btn-primary pull-right" name="create_post" type="submit" value="Create Post">
    </div>
        
          
        </form>



          
      </div>
      </div>

    </div>




      </div>          
 </div>
</div>

<?php include './includes/admin_footer.php'; ?>