<!-- <div class='row'>
		  
  <div class='col-xl-4 col-lg-12'>
    <div class='card card-chart'>
      <div class='card-header card-header-success'>
        <div class='ct-chart' id='dailySalesChart'></div>
      </div>
      <div class='card-body'>
        <h4 class='card-title'>Daily Sales</h4>
        <p class='card-category'>
          <span class='text-success'><i class='fa fa-long-arrow-up'></i> 55% </span> increase in today sales.</p>
      </div>
      <div class='card-footer'>
        <div class='stats'>
          <i class='material-icons'>access_time</i> updated 4 minutes ago
        </div>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-12'>
    <div class='card card-chart'>
      <div class='card-header card-header-warning'>
        <div class='ct-chart' id='websiteViewsChart'></div>
      </div>
      <div class='card-body'>
        <h4 class='card-title'>Email Subscriptions</h4>
        <p class='card-category'>Last Campaign Performance</p>
      </div>
      <div class='card-footer'>
        <div class='stats'>
          <i class='material-icons'>access_time</i> campaign sent 2 days ago
        </div>
      </div>
    </div>
  </div>
  <div class='col-xl-4 col-lg-12'>
    <div class='card card-chart'>
      <div class='card-header card-header-danger'>
        <div class='ct-chart' id='completedTasksChart'></div>
      </div>
      <div class='card-body'>
        <h4 class='card-title'>Completed Tasks</h4>
        <p class='card-category'>Last Campaign Performance</p>
      </div>
      <div class='card-footer'>
        <div class='stats'>
          <i class='material-icons'>access_time</i> campaign sent 2 days ago
        </div>
      </div>
    </div>
  </div>
</div> -->


<div class='row'>
      
  <div class='col-xl-3 col-lg-6 col-md-6 col-sm-6'>
    <div class='card card-stats'>
      <div class='card-header card-header-warning card-header-icon'>
        <div class='card-icon'>
          <i class='material-icons'>content_paste</i>
        </div>
        <p class='card-category'>Posts</p>
        <h3 class='card-title'>
        <?php 
        global $connection;
        $published_posts = "SELECT * FROM posts WHERE post_status = 'published'";
        $published_posts_query = mysqli_query($connection, $published_posts);
        $published_posts_number = mysqli_num_rows($published_posts_query);

        $all_posts = "SELECT * FROM posts";
        $all_posts_query = mysqli_query($connection, $all_posts);
        $all_posts_number = mysqli_num_rows($all_posts_query);

        echo "$published_posts_number / $all_posts_number" ;
        ?>

        <br>

          <small>Published</small>
        </h3>
      </div>
      <div class='card-footer'>
        <div class='stats'>
          <i class='material-icons text-warning'>add</i>
          <a href='add_post.php' class='warning-link'>Add new post...</a>
        </div>
      </div>
    </div>
  </div>
  <div class='col-xl-3 col-lg-6 col-md-6 col-sm-6'>
    <div class='card card-stats'>
      <div class='card-header card-header-success card-header-icon'>
        <div class='card-icon'>
          <i class='material-icons'>comment</i>
        </div>
        <p class='card-category'>Comments</p>
        <h3 class='card-title'>

        <?php 
        global $connection;
        $approved_comments = "SELECT * FROM comments WHERE comment_status = 'approved'";
        $approved_comments_query = mysqli_query($connection, $approved_comments);
        $approved_comments_number = mysqli_num_rows($approved_comments_query );

        $all_comments = "SELECT * FROM comments";
        $all_comments_query = mysqli_query($connection, $all_comments);
        $all_comments_number = mysqli_num_rows($all_comments_query);

        echo "$approved_comments_number / $all_comments_number" ;
        ?>
                <br>

        <small>Approved</small>

        </h3>
      </div>
      <div class='card-footer'>
        <div class='stats'>
          <i class='material-icons text-success'>add_comment</i> 
          <a href='comments.php' class='success-link'>Review Comments</a>
        </div>
      </div>
    </div>
  </div>
  <div class='col-xl-3 col-lg-6 col-md-6 col-sm-6'>
    <div class='card card-stats'>
      <div class='card-header card-header-danger card-header-icon'>
        <div class='card-icon'>
          <i class='material-icons'>style</i>
        </div>
        <p class='card-category'>Categories</p>
        <h3 class='card-title'>

        <?php
        $query = "SELECT * FROM categories";
        $categories_query = mysqli_query($connection, $query);
        $categories_number = mysqli_num_rows($categories_query);
        echo $categories_number;
        ?>

        <br>
        <small>In Use</small>
        </h3>
      </div>
      <div class='card-footer'>
        <div class='stats'>
        <i class='material-icons text-danger'>bookmarks</i> 
          <a href='categories.php' class='danger-link'>Review Categories</a>
        </div>
      </div>
    </div>
  </div>
  <div class='col-xl-3 col-lg-6 col-md-6 col-sm-6'>
    <div class='card card-stats'>
      <div class='card-header card-header-info card-header-icon'>
        <div class='card-icon'>
        <i class='material-icons'>group</i>
        </div>
        <p class='card-category'>Users</p>
        <h3 class='card-title'>
        <?php
        $query = "SELECT * FROM users";
        $users_query = mysqli_query($connection, $query);
        $users_number = mysqli_num_rows($users_query);
        echo $users_number;
        ?>
        <br>
      <small>Registered</small>

        </h3>
      </div>
      <div class='card-footer'>
        <div class='stats'>
        <i class='material-icons text-info'>add</i> 
          <a href='user.php' class='info-link'>Add New User...</a>            </div>
      </div>
    </div>
  </div>

</div>

<div class='row'>
  <div class='col-lg-6 col-md-12'>
    <div class='card'>
      <div class='card-header card-header-primary'>
        <h4 class='card-title'>Add Draft Post</h4>
        <p class='card-category'>Add draft post quickly</p>
      </div>
      <div class='card-body'>
 
      <?php addPost(); ?>
        
        <form action="" method="post" enctype="multipart/form-data" >

        <div class="row">

          <div class="col-md-12 mb-3">

          <div class="col-md-12 mb-3 ">
            <label for="title">Post Title</label>
              <input type="text" class="form-control" name="title" >
          </div>
          <div class="col-md-12 mb-3 ">
            <label for="post_content">Post Content</label>
            <br>
            <textarea class="form-control border" name="post_content" id="post-body" cols="70%" rows="10"></textarea> 
          </div>

          </div>

        <div class="row col-md-12">
            <div class="col-4 mb-3 ">
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
        
            <div class="col-4 d-none mb-3 ">
            <label for="post_author">Post Author</label>
            <select id="post_author" name="post_author" class="custom-select">
                <?php 
                if(isset($_SESSION["username"])) { $username = $_SESSION["username"]; 
                    echo "<option value='$username'> {$username} </option>";
                  }
                ?>
              </select>     
              </div>
            <div class="col-4 mb-3">
              <label for="post_image">Post Image</label>
              <input type="file" class="form-control-file  btn-primary" name="image">
              <div><img src="../img/<?php echo $post_image; ?>" width="100%" alt=""></div>
            </div>
            <div class="col-4 mb-3">
            <label>Create Draft</label>
            <input class="btn btn-success" name="create_post" type="submit" value="Add Draft">
            </div>


        </div>
    </div>
        
          
        </form>






      </div>
    </div>
  </div>

  <div class='col-lg-6 col-md-12'>
    <div class='card'>
      <div class='card-header card-header-tabs card-header-warning'>
        <div class='nav-tabs-navigation'>
          <div class='nav-tabs-wrapper'>
            <span class='nav-tabs-title'>Check:</span>
            <ul class='nav nav-tabs' data-tabs='tabs'>
              <li class='nav-item'>
                <a class='nav-link active' href='#profile' data-toggle='tab'>
                  <i class='material-icons'>bubble_chart</i> Comments
                  <div class='ripple-container'></div>
                </a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='#messages' data-toggle='tab'>
                  <i class='material-icons'>content_paste</i> Posts
                  <div class='ripple-container'></div>
                </a>
              </li>
              <li class='nav-item'>
                <a class='nav-link' href='#settings' data-toggle='tab'>
                  <i class='material-icons'>group</i> Users
                  <div class='ripple-container'></div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class='card-body'>
        <div class='tab-content'>
          <div class='tab-pane active' id='profile'>
            <table class='table'>
              <tbody>
              
             <?php 
             showNotificationComment(); 
             deleteNotification();
             ?>


              </tbody>
            </table>
          </div>
          <div class='tab-pane' id='messages'>
            <table class='table'>
              <tbody>
              <?php showNotificationPost(); ?>
              </tbody>
            </table>
          </div>
          <div class='tab-pane' id='settings'>
            <table class='table'>
              <tbody>
              <?php showNotificationUser(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


          