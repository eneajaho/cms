<?php ob_start(); ?>

<?php 

/* Categories Functions   */
function showCategories(){
    global $connection;
    // Loop through all categrories and show them in table data
    // Find all categories
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_categories)) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
      echo '<tr>';
      echo "<td> {$cat_id} </td>";
      echo "<td> {$cat_title} </td>";
      echo "<td class='td-actions text-center'> <a class='btn btn-success' rel='tooltip' href='categories.php?edit={$cat_id}'>
      <i class='material-icons'>edit</i></a> </td>";
      echo "<td class='td-actions text-center'> <a rel='tooltip' class='btn btn-danger' href='categories.php?delete={$cat_id}'>
      <i class='material-icons'>delete</i> </a>   </td>";
      echo '</tr>';
    }
}

function addCategory(){
       global $connection;
      if(isset($_SESSION['username'])) { $username = $_SESSION['username'];}
      // check if submit is clicked 
      if (isset($_POST['submit'])) {
        // decalares cat_title variable to POST
        $cat_title = $_POST['cat_title'];
        // checks if form is not completed of empty
        if ($cat_title == "" || empty($cat_title)) {    
          echo "<div class='alert text-center alert-warning'>Category cannot be empty!</div>";
        } else {
          // inserts in database the given category
          $query = "INSERT INTO categories (cat_title) VALUE ('{$cat_title}') ";
          $create_category_query = mysqli_query($connection, $query) or die('QUERY FAILED' . mysqli_error($connection) );

          // redirects site to categories
          header("location: categories.php");
        }}
}

function editCategory(){
   global $connection;
   // Displays form after button is clicked
   if (isset($_GET['edit'])) {
    $cat_id = $_GET['edit'];
    echo "
    <div class='card'>
     <div class='card-header card-header-primary'>
       <h4 class='card-title'>Edit Category with ID: {$cat_id}</h4>
       <p class='card-category'> Here you can edit your categories</p>
     </div>
     <form method='post' class='p-3' action='categories.php?edit={$cat_id}'>
       <div class='form-group'>
        <label for='add-category' class='bmd-label-floating'>Edit Category:</label>
        <input type='text' name='update_cat_title' class='form-control' id='add-category'>
       </div>
      <button type='submit' name='update_cat' class='btn btn-primary'>Edit Category</button>
      </form>
    </div>";
  }
  // checks the form if is filled and does the query
  if (isset($_POST['update_cat']) && !empty($_POST['update_cat_title'])) {
    $cat_id = $_GET['edit'];
    $update_cat_title = $_POST['update_cat_title'];   
    // Updates the category
    $query = "UPDATE `categories` SET `cat_title` = '{$update_cat_title}' WHERE `cat_id` = {$cat_id} ;";
    // query
    $update_categories_id = mysqli_query($connection, $query) or die('QUERY FAILED' . mysqli_error($connection) );

    // redirects to categories
    header("location: categories.php");
  } 
}

function deleteCategory(){
  global $connection;
  if (isset($_GET['delete'])) {   
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete_category_query = mysqli_query($connection, $query) or die('QUERY FAILED' . mysqli_error($connection) );
    header("location: categories.php");
  }
}
/* End Categories Functions   */


/* Posts Functions   */
function showPostsTable(){

  global $connection;
  // Loop through all categrories and show them in table data
  // Find all categories
  $query = "SELECT * FROM posts";
  $select_posts = mysqli_query($connection, $query);


  // post table format
  echo "<div class='row m-0'>
    <div class='col-md-12'>
    <div class='card'>
      <div class='card-header card-header-primary'>
        <h4 class='card-title'>Posts</h4>
        <p class='card-category'> Here youll find all posts</p>
      </div><div class='card-body'><div class='table-responsive'>
          <table class='table table-hover'>
            <thead class='text-primary'>
              <th>ID</th>
              <th>Title</th>
              <th>Author</th>
              <th>Status</th>
              <th>Action</th>
              <th>Cat</th>
              <th>Views</th>
              <th>Image</th>
              <th>Tags</th>
              <th><i class='material-icons'>comment</i></th>
              <th>Date</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </thead><tbody>";

  // Looping through posts and declaring variables
  while ($row = mysqli_fetch_assoc($select_posts)) {
    $post_id = $row['post_id'];
    $post_url = $row['post_url'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_user = $row['post_user'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_views_count = $row['post_views_count'];
    $post_status = $row['post_status'];
    $post_category_id = $row['post_category_id'];
    
    if ($post_status == 'published') {
      $post_status_ico = '<i class="text-success material-icons" data-toggle="tooltip" data-placement="top" title="Published">check_circle_outline</i>';
    } else {
      $post_status_ico = "<i class='text-danger material-icons' data-toggle='tooltip' data-placement='top' title='Draft'>check_circle_outline</i>";
    }

  // Posts format
      echo '<tr>';
      echo "<td> {$post_id} </td>";
      echo "<td> <a href='.././post.php?id={$post_id}'>{$post_title}</a> </td>";
      echo "<td> {$post_author} </td>";
      echo "<td> {$post_status_ico} </td>";

       // if post status is approved show unapprove and vice versa
       if ($post_status == "published") {
        echo "<td> <a class='text-warning' href='posts.php?id={$post_id}&publish=0'>Draft</a> </td>";
      } else{
        echo "<td> <a class='text-success' href='posts.php?id={$post_id}&publish=1'>Publish</a> </td>";
      }

      $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
      $select_categories = mysqli_query($connection, $query);
      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<td>{$cat_title}</td>";
      }
      
      
      echo "<td> {$post_views_count } </td>";
      echo "<td> <img style='max-width: 100px; height:auto;' src='../img/{$post_image}'></td>";
      echo "<td> {$post_tags} </td>";
      echo "<td> {$post_comment_count} </td>";
      echo "<td> {$post_date} </td>";
      echo "<td class='text-center'> <a href='.././post.php?id={$post_id}'><i class='text-info  material-icons'>launch</i></a> </td>";
      echo "<td class='text-center'> <a href='edit_post.php?id={$post_id}'><i class='text-success  material-icons'>edit</i></a> </td>";
      echo "<td class='text-center'> <a href='posts.php?delete={$post_id}'><i class='text-danger  material-icons'>delete</i></a> </td>";
      echo '</tr>';

      
    }

  echo "</tbody></table></div></div></div></div></div>";

}

function showPostsGrid(){

  global $connection;
  $query = "SELECT * FROM posts";
  $select_posts = mysqli_query($connection, $query);

 echo "
  <div class='col-sm-12 col-md-6 col-lg-4 col-xl-4 d-md-block d-none' >
  <div class='card rounded' style='height: 305px; background-color: white;'>
   <div class='card-body'>
   <br>
   <h4 class='text-center'>Add New Post </h4>
   <div class='d-flex justify-content-center align-items-center'>
   <a href='add_post.php'><div style='border-radius: 1000px;   font-size: 90px;
   background-color: #fff;   -webkit-box-shadow: 0 1px 15px 1px rgba(39,39,39,.1); box-shadow: 0 1px 15px 1px rgba(39,39,39,.1); width: 150px; height: 150px; margin-top: 50px; margin-bottom: 50px;' class='d-flex justify-content-center align-items-center text-center'>
   <h1><i class='text-success  material-icons' style='font-size:100px'>add</i></h1>
   </div></a>
   </div>
    </div>
    </div>
    </div>
      ";


  // Looping through posts and declaring variables
  while ($row = mysqli_fetch_assoc($select_posts)) {
    
    //declares variables
    $post_id = $row['post_id'];
    $post_url = $row['post_url'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_user = $row['post_user'];
    $post_date = $row['post_date'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_views_count = $row['post_views_count'];
    $post_status = $row['post_status'];
    $post_category_id = $row['post_category_id'];
    $post_content = $row['post_content'];

    $post_title_truncated = substr($post_title , 0, 20); 


    if ($post_status == 'published') {
      $post_status_ico = '<i class="text-success material-icons" data-toggle="tooltip" data-placement="top" title="Published">check_circle_outline</i>';
    } else {
      $post_status_ico = "<i class='text-danger material-icons' data-toggle='tooltip' data-placement='top' title='Draft'>check_circle_outline</i>";
    }
    
    // Posts format
    echo "
    <div class='col-sm-12 col-md-6 col-lg-4 col-xl-4' >
    <div class='card rounded'>
    <div class='rounded d-flex justify-content-center align-items-center' style='height: 150px; overflow: hidden;'>
    <a href='.././post.php?id={$post_id}'><img class='card-img-top' src='../img/{$post_image}'></a>
    </div>
    <hr class='m-0'>
     <div class='card-body'>

    <div class='row'>
      <div class='col-10'><h5 class='card-title'>$post_title_truncated</h5></div>
      <div class='col-2 text-right'>{$post_status_ico}</div>
    </div>

    <div class='row'>
      <div class='col-7'>by: {$post_author}</div>
      <div class='col-5 text-right'>{$post_date}</div>
    </div>
       
    <div class='row'>
      <div class='col-7'>{$post_views_count} Views</div>
      <div class='col-5 text-right'>{$post_comment_count} Comments</div>
    </div>

     </div>
     <hr class='m-0'>
      <div class='card-footer justify-content-between'>
      <a class='text-info' href='.././post.php?id={$post_id}'><i class='text-info material-icons'>launch</i>  View</a>
      <a class='text-success' href='edit_post.php?id={$post_id}'><i class='text-success  material-icons'>edit</i>  Edit</a>
      <a class='text-danger' href='posts.php?delete={$post_id}'><i class='text-danger material-icons'>delete</i>  Delete</a>
     </div>
  </div>
  </div>
    ";
    }

}

function change_post_format(){

  if (isset($_GET['form'])) {
    $posts_format = $_GET['form'];
    if ($posts_format == 'table') {
      showPostsTable();  

    } else {
    echo  "<div class='row m-0'>";
      showPostsGrid();
    echo  "</div>";
    }
  
  }

}

function publish_draft_Post(){
  global $connection;
  if (isset($_GET['publish'])) {

    $post_id = $_GET['id'];
    $publish = $_GET['publish'];

    if ($publish == 0 ) {
      // makes post draft
      $query = "UPDATE posts SET `post_status` = 'draft' WHERE `post_id` = {$post_id}";
      $draft_post_query = mysqli_query($connection, $query);

      // creates notification
      if(isset($_SESSION['username'])) { $username = $_SESSION['username'];}
      $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} published post with ID: {$post_id}', now(), 'post', 'active', 'root')";
      $create_notification_query = mysqli_query($connection, $create_notification);


      header("location: posts.php?form=table");
      die;
    } else {
        // publishes post
        $query = "UPDATE posts SET `post_status` = 'published' WHERE `post_id` = {$post_id}";
        $draft_post_query = mysqli_query($connection, $query);

        // creates notification
        if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
        $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} drafted post with ID: {$post_id}', now(), 'post', 'active', 'root')";
        $create_notification_query = mysqli_query($connection, $create_notification);
        header("location: posts.php?form=table");
        die;
    }
    

  }
}

function addPost(){
    global $connection;
    global $cms_url;
    // check if Create Post is clicked 
    if(isset($_POST['create_post'])){
      // decalares cat_title variable to POST
      $post_title = $_POST['title'];
      $post_author = $_POST['post_author'];
      $post_category_id = $_POST['post_category_id'];
      $post_status = $_POST['post_status'];
      
      $post_image = $_FILES['image']['name'];
      $post_image_temp = $_FILES['image']['tmp_name'];

      $post_tags = $_POST['post_tags'];
      $post_content = $_POST['post_content'];
      $post_date = date('d-m-y');
      $post_comment_count = 0;

      move_uploaded_file($post_image_temp, "../img/$post_image");

      // checks if form is not completed or empty

      if ($post_title == "" || empty($post_title) ) {    
        echo "<div class='alert text-center alert-warning'>Post title cannot be empty!</div>";
      } else {
        if ($post_content == "" || empty($post_content) ) {
          echo "<div class='alert text-center alert-warning'>Post content cannot be empty!</div>";
      } else{
        // inserts in database the given category
        $query = "INSERT INTO `posts` (`post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_user`, `post_category_id`, `post_url`, `post_views_count`) VALUES ('{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}', '', '{$post_category_id}', '', '1')";
        $create_post_query = mysqli_query($connection, $query) or die('Query error');

        // creates notification
        if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
        $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} created post with title: {$post_title}', now(), 'post', 'active', 'root')";
        $create_notification_query = mysqli_query($connection, $create_notification);

        header("location: posts.php?form=grid");
      }}}
}

function editPost(){
    
  global $connection;

  if (isset($_GET['id'])) {
    $the_post_id = $_GET['id'];

    $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $select_posts_by_id = mysqli_query($connection, $query) or die(mysqli_error($select_posts_by_id));

    // Looping through posts and declaring variables
    while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
      global $post_id;
      $post_id = $row['post_id'];
      global $post_url ;
      $post_url = $row['post_url'];
      global $post_title;
      $post_title = $row['post_title'];
      global $post_author;
      $post_author = $row['post_author'];
      global $post_date;
      $post_date = $row['post_date'];
      global $post_image;
      $post_image = $row['post_image'];
      global $post_tags;
      $post_tags = $row['post_tags'];
      global $post_status;
      $post_status = $row['post_status'];
      global $post_content;
      $post_content = $row['post_content'];
      global $post_category_id;
      $post_category_id = $row['post_category_id']; 
    }

    if (isset($_POST['update_post'])) {    
      $post_title = $_POST['title'];
      $post_author = $_POST['post_author'];
      $post_category_id = $_POST['post_category'];
      $post_status = $_POST['post_status'];
      $post_image = $_FILES['image']['name'];
      $post_image_temp = $_FILES['image']['tmp_name'];
      $post_tags = $_POST['post_tags'];
      $post_content = $_POST['post_content'];

      move_uploaded_file($post_image_temp, "../img/{$post_image}");

      if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_image = mysqli_query($connection, $query);
      
        while($row = mysqli_fetch_array($select_image)) {
          $post_image = $row['post_image'];
        }
      }

      // checks if form is not completed or empty

      if ($post_title == "" || empty($post_title) ) {    
        echo "<div class='alert text-center alert-warning'>Post title cannot be empty!</div>";
      } else {
        if ($post_content == "" || empty($post_content) ) {    
          echo "<div class='alert text-center alert-warning'>Post content cannot be empty!</div>";
        } else{
            // inserts in database the given category
            $query = "UPDATE `posts` SET `post_title` = '{$post_title}', `post_author` = '{$post_author}', `post_date` = now(), `post_image` = '{$post_image}', `post_content` = '{$post_content}', `post_tags` = '{$post_tags}', `post_status` = '{$post_status}', `post_category_id` = '{$post_category_id}' WHERE `post_id` = {$the_post_id} ;";

            $create_post_query = mysqli_query($connection, $query) or die('Query error');
            echo "<div class='alert text-center alert-success'>Post was updated successfully!</div>";
                 
            // creates notification
            if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
            $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} edited post with title: {$post_title}', now(), 'post', 'active', 'root')";
            $create_notification_query = mysqli_query($connection, $create_notification);
            // header("location: posts.php#table");
          }
        }
    }
  }  
}

function deletePost(){
  global $connection;
  if (isset($_GET['delete'])) {   
    $post_id = $_GET['delete'];
    $query = "DELETE FROM `posts` WHERE post_id = {$post_id} ";
    $delete_post_query = mysqli_query($connection, $query) or die('QUERY FAILED' . mysqli_error($connection) );

    // creates notification
    if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
    $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} deleted post with ID: {$post_id}', now(), 'post', 'active', 'root')";
    $create_notification_query = mysqli_query($connection, $create_notification);
  
    header('Location: posts.php?form=grid');
    die;
  }
}
/* End Posts Functions   */


/* Comments Functions   */
function showCommentsTable(){
  global $connection;
  global $cms_url;
  // Loop through all categrories and show them in table data
  // Find all categories
  $query = "SELECT * FROM comments";
  $select_comments = mysqli_query($connection, $query);

  // Looping through posts and declaring variables
  while ($row = mysqli_fetch_assoc($select_comments)) {
    $comment_id = $row['comment_id'];
    $comment_author = $row['comment_author']; 
    $comment_date = $row['comment_date'];   
    $comment_post_id = $row['comment_post_id']; 
    $comment_email = $row['comment_email']; 
    $comment_content = $row['comment_content']; 
    $comment_status = $row['comment_status'];

    //fancy stuff - changes icon if comment is approved or unapproved
    if ($comment_status == 'approved') {
      $comment_status_ico = '<i class="text-success material-icons" data-toggle="tooltip" data-placement="top" title="Published">done</i>';
    } else {
      $comment_status_ico = "<i class='text-danger material-icons' data-toggle='tooltip' data-placement='top' title='Draft'>block</i>";
    }

    $comment_content_truncated = substr($comment_content, 0, 15); 

    // comments format
    echo '<tr>';
    echo "<td> {$comment_id} </td>";
    echo "<td> {$comment_author} </td>";
    echo "<td> {$comment_email} </td>";
    echo "<td> {$comment_content_truncated} </td>";
    echo "<td> {$comment_status_ico} </td>";
    // show the url of the post where the comment was made
    $select_comment_post = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
    $get_comment_post_query = mysqli_query($connection, $select_comment_post);

    while ($row = mysqli_fetch_assoc($get_comment_post_query)) {
      $post_id = $row['post_id'];
      $post_title = $row['post_title'];
      echo "<td> <a href='{$cms_url}/post.php?id={$post_id}'>{$post_title}</td>";
    }  
    echo "<td> {$comment_date} </td>";
    
    // if comment status is approved show unapprove and vice versa
    if ($comment_status == "approved") {
      echo "<td> <a class='text-warning' href='comments.php?unapprove={$comment_id}'><i class='text-warning  material-icons'>block</i> Unapprove</a> </td>";
    } else{
      echo "<td> <a class='text-success ' href='comments.php?approve={$comment_id}'><i class='text-success   material-icons'>done</i> Approve</a> </td>";
    }
    
    echo "<td class='text-center'> <a href='comments.php?delete={$comment_id}&post={$post_id}'><i class='text-danger  material-icons'>delete</i></a> </td>";
    echo '</tr>';
    }

}
function deleteComment(){

  global $connection;
  if (isset($_GET['delete'])) {
    $post_id = $_GET['post'];
    $comment_id = $_GET['delete'];
    // deletes comment from database query
    $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
    $delete_comment_query = mysqli_query($connection, $query);

    //decrease comment number
    $decrease_comments_number = "UPDATE posts SET post_comment_count = post_comment_count - 1 WHERE post_id = $post_id "; 
    $decrease_comment_number_query = mysqli_query($connection, $decrease_comments_number);

    // creates notification
    if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
    $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} deleted a comment in post with ID: {$post_id}', now(), 'comment', 'active', 'root')";
    $create_notification_query = mysqli_query($connection, $create_notification);

    header("location: comments.php");
    die;
  }
}

function approveComment(){
  global $connection;
  if (isset($_GET['approve'])) {
    $comment_id = $_GET['approve'];
    // deletes comment from database query
    $query = "UPDATE comments SET `comment_status` = 'approved' WHERE `comment_id` = {$comment_id}";
    $delete_comment_query = mysqli_query($connection, $query);

    // creates notification
    if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
    $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} approved comment with ID: {$comment_id}', now(), 'comment', 'active', 'root')";
    $create_notification_query = mysqli_query($connection, $create_notification);

    header("location: comments.php");
    die;
  }
}

function unapproveComment(){
  global $connection;
  if (isset($_GET['unapprove'])) {
    $comment_id = $_GET['unapprove'];
    // deletes comment from database query
    $query = "UPDATE comments SET `comment_status` = 'unapproved' WHERE `comment_id` = {$comment_id}";
    $delete_comment_query = mysqli_query($connection, $query);
    header("location: comments.php");
    die;
  }

}
/* End Comments Functions   */

/* Users Functions   */
function showUsersTable(){

  global $connection;
  global $cms_url;
  // Loop through all categrories and show them in table data
  // Find all categories
  $query = "SELECT * FROM users";
  $select_users = mysqli_query($connection, $query);

  // Looping through posts and declaring variables
  while ($row = mysqli_fetch_assoc($select_users)) {
    $user_id = $row['user_id'];
    $username = $row['username']; 
    $user_firstname = $row['user_firstname'];   
    $user_lastname = $row['user_lastname']; 
    $user_email = $row['user_email']; 
    $user_image = $row['user_image']; 
    $user_role = $row['user_role'];
    $user_description = $row['user_description'];
    $user_description_min = substr($user_description, 0, 15);

    //fancy stuff - changes icon if user is approved or unapproved
    if ($user_role == 'admin') {
      $user_role_ico = '<i class="text-warning material-icons" data-toggle="tooltip" data-placement="top" title="Administrator">star</i>';
    } else {
      $user_role_ico = "<i class='text-danger material-icons' data-toggle='tooltip' data-placement='top' title='Subscriber'>person</i>";
    }
    
    // users format
    echo '<tr>';
    echo "<td> {$user_id} </td>";
    echo "<td> {$username} </td>";
    echo "<td> {$user_email} </td>";
    echo "<td> <img style='max-width: 100px; height:auto;' src='../img/{$user_image}'></td>";
    echo "<td> {$user_firstname} {$user_lastname} </td>";
    echo "<td> {$user_description_min}</td>";
    echo "<td> {$user_role_ico} </td>";    
    echo "<td> <a href='user.php?edit={$user_id}'>Edit</a></td>";  
    echo "<td class='text-center'> <a href='users.php?delete={$user_id}'><i class='text-danger  material-icons'>delete</i></a> </td>";
    echo '</tr>';
    }
}

function addUser(){
  
  global $connection;
  global $cms_url;

  if (isset($_POST['add_user'])) {
    $username = $_POST['username']; 
    $user_firstname = $_POST['user_firstname'];   
    $user_lastname = $_POST['user_lastname']; 
    $user_email = $_POST['user_email']; 
    $user_role = $_POST['user_role'];
    $user_description = $_POST['user_description'];
    $user_password = $_POST['user_password'];

    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_temp, "../img/$user_image");

    // checks if form is not completed or empty
    if ($username == "" || empty($username) || $user_email == "" || empty($user_email) || $user_password == "" || empty($user_password)) {    
      echo "<div class='alert text-center alert-warning'>Username or Email cannot be empty!</div>";
    } else{
      // inserts in database the given category
      $query = "INSERT INTO `users` (`username`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_role`, `user_description`, `user_image`) VALUES ('{$username}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_password}', '{$user_role}', '{$user_description}', '{$user_image}' )";
      $add_user_query = mysqli_query($connection, $query);
      echo "<div class='alert text-center alert-success'>User was added successfully!</div>";

      // creates notification
      if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
      $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} added a new user with username: {$username}', now(), 'user', 'active', 'root')";
      $create_notification_query = mysqli_query($connection, $create_notification);

      // header("location: users.php");
    }

    }

}


function showeditUser(){
  
  global $connection;
  global $cms_url;

  if (isset($_GET['edit'])) {
    global $connection;
    $user_id = $_GET['edit'];

    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $get_user_data = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($get_user_data)) {
      $username = $row['username'];
      $user_firstname = $row['user_firstname'];
      $user_lastname = $row['user_lastname'];
      $user_email = $row['user_email'];
      $user_password = $row['user_password'];
      $user_image = $row['user_image'];
      $user_role = $row['user_role'];
      $user_description = $row['user_description'];
      $user_id = $row['user_id'];


      echo "
      
      <div class='col-md-4'>
      <div class='card card-profile'>
        <div class='card-avatar'>
            <img class='img' src='../img/{$user_image}' />
        </div>
        <div class='card-body'>
          <h6 class='card-category text-gray'>{$user_role}</h6>
          <h4 class='card-title'>{$user_firstname} {$user_lastname}</h4>
          <p class='card-description'>{$user_description}</p>
          <a href='#pablo' class='btn btn-primary btn-round'>View Posts</a>
        </div>
      </div>
    </div> 

      <div class='col-md-8'> <div class='card'>
        <div class='card-header card-header-primary'>
          <h4 class='card-title'>Edit User: {$username}</h4>
          <p class='card-category'>Edit user profile</p>
        </div>

        <div class='card-body'>
          <form method='post' action='user.php?edit_user={$user_id}' enctype='multipart/form-data'>
            <div class='row'>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label class='bmd-label-floating'>Username</label>
                  <input type='text' value='{$username}' name='username' class='form-control'>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label class='bmd-label-floating'>Email address</label>
                  <input type='email' value='{$user_email}' name='user_email' class='form-control'>
                </div>
              </div>
            </div>
            <div class='row'>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label class='bmd-label-floating'>First Name</label>
                  <input type='text' value='{$user_firstname}' name='user_firstname' class='form-control'>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-group'>
                  <label class='bmd-label-floating'>Last Name</label>
                  <input type='text' value='{$user_lastname}' name='user_lastname' class='form-control'>
                </div>
              </div>
            </div>
            <div class='row'>

             <div class='col-md-6 mt-3'>
                <div class='form-group'>
                  <label class='bmd-label-floating'>Password</label>
                  <input type='password' value='{$user_password}' name='user_password' class='form-control'>
                </div>
              </div>
              <div class='col-md-3 mt-3'>
                  <img style='max-width: 100px; height:auto;' src='../img/{$user_image}' />
                  <label for='user_image' class='bmd-label-floating'>Profile pic</label>
                  <input type='file' value='{$user_image}' class='form-control-file btn btn-primary' name='user_image'>

              </div>
              <div class='col-md-3 mt-3'>
                <div class='form-group'>
                  <label class='bmd-label-floating'>Role</label>
                  <select name='user_role' value='{$user_role}' class='custom-select'>
                    <option value='admin'>Admin</option>
                    <option value='subscriber'>Subscriber</option>
                  </select>
                </div>
              </div>
            </div>

            <div class='row'>
              <div class='col-md-12'>
                <div class='form-group'>
                  <label>About User</label>
                  <div class='form-group'>
                    <textarea class='form-control' id='post-body' value='{$user_description}' name='user_description' rows='3'>{$user_description}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <button type='submit' name='edit_user' class='btn btn-primary pull-right'>Update User</button>
            <div class='clearfix'></div>
          </form></div></div></div>";
    } }
  }

function editUser(){
    global $connection;
    if (isset($_GET['edit_user'])) {
      $user_id = $_GET['edit_user'];
      $username = $_POST['username']; 
      $user_firstname = $_POST['user_firstname'];   
      $user_lastname = $_POST['user_lastname']; 
      $user_email = $_POST['user_email']; 
      $user_role = $_POST['user_role'];
      $user_description = $_POST['user_description'];
      $user_password = $_POST['user_password'];
      $user_image = $_FILES['user_image']['name'];
      $user_image_temp = $_FILES['user_image']['tmp_name'];
      move_uploaded_file($user_image_temp, "../img/$user_image");

      if (empty($user_image)) {
        $query = "SELECT * FROM users WHERE user_id = $user_id ";
        $select_image = mysqli_query($connection, $query);
      
        while($row = mysqli_fetch_array($select_image)) {
          $user_image = $row['user_image'];
        }
      }
  
      // checks if form is not completed or empty
      if ($username == "" || empty($username) || $user_email == "" || empty($user_email) || $user_password == "" || empty($user_password)) {    
        echo "<div class='alert text-center alert-warning'>Username or Email cannot be empty!</div>";
      } else {
        // inserts in database the given category
      $query = "UPDATE `users` SET `username` = '{$username}', `user_firstname` = '{$user_firstname}', `user_lastname` = '{$user_lastname}', `user_email` = '{$user_email}', `user_password` = '{$user_password}', `user_role` = '{$user_role}', `user_description` = '{$user_description}', `user_image` = '{$user_image}' WHERE user_id = {$user_id}";
      $add_user_query = mysqli_query($connection, $query) or die('query error' . mysqli_error($connection) ); 

      // creates notification
      if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
      $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} edited user with username: {$username}', now(), 'user', 'active', 'root')";
      $create_notification_query = mysqli_query($connection, $create_notification);
        
      header("location: users.php");
      }
  
    }
  }



function deleteUser(){
  global $connection;
  if (isset($_GET['delete'])) {   
    $user_id = $_GET['delete'];
    $query = "DELETE FROM `users` WHERE user_id = {$user_id} ";
    $delete_post_query = mysqli_query($connection, $query);

    // creates notification
    if(isset($_SESSION['firstname'])) { $username = $_SESSION['firstname'];}
    $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$username }', '{$username} deleted user with username: {$username}', now(), 'user', 'active', 'root')";
    $create_notification_query = mysqli_query($connection, $create_notification);

    header('Location: users.php');
    die;
  }
}
/* End users Functions   */




/* Notifications */ 

function showNotificationComment() {

  global $connection;
  $query = "SELECT * FROM notifications WHERE notif_type = 'comment'";
  $select_notifications = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_notifications)) {
    
    //declares variables
    $notif_id = $row['notif_id'];
    $notif_author = $row['notif_author'];
    $notif_subject = $row['notif_subject'];
    $notif_time = $row['notif_time'];
    $notif_type = $row['notif_type'];
    $notif_status = $row['notif_status'];
    $notif_receiver = $row['notif_receiver'];

    // if ($notif_status == 'active') {
    //   $notif_status_ico = '<i class="text-success material-icons" data-toggle="tooltip" data-placement="top" title="Published">check_circle_outline</i>';
    // } else {
    //   $notif_status_ico = "<i class='text-danger material-icons' data-toggle='tooltip' data-placement='top' title='Draft'>check_circle_outline</i>";
    // }
    
    // notifs format
    echo "
    <tr>
      <td>{$notif_subject}</td>
      <td class='td-actions text-right'>
        <a href='?dn={$notif_id}' rel='tooltip' title='Remove' class='btn btn-danger'>
          <i class='material-icons'>close</i>
        </a>
      </td>
    </tr>
    ";
    }


}

function showNotificationPost() {

  global $connection;
  $query = "SELECT * FROM notifications WHERE notif_type = 'post'";
  $select_notifications = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_notifications)) {
    
    //declares variables
    $notif_id = $row['notif_id'];
    $notif_author = $row['notif_author'];
    $notif_subject = $row['notif_subject'];
    $notif_time = $row['notif_time'];
    $notif_type = $row['notif_type'];
    $notif_status = $row['notif_status'];
    $notif_receiver = $row['notif_receiver'];

    // if ($notif_status == 'active') {
    //   $notif_status_ico = '<i class="text-success material-icons" data-toggle="tooltip" data-placement="top" title="Published">check_circle_outline</i>';
    // } else {
    //   $notif_status_ico = "<i class='text-danger material-icons' data-toggle='tooltip' data-placement='top' title='Draft'>check_circle_outline</i>";
    // }
    
    // notifs format
    echo "
    <tr>
      <td>{$notif_subject}</td>
      <td class='td-actions text-right'>
        <a href='?dn={$notif_id}' rel='tooltip' title='Remove' class='btn btn-danger'>
          <i class='material-icons'>close</i>
        </a>
      </td>
    </tr>
    ";
    }


}

function showNotificationUser() {

  global $connection;
  $query = "SELECT * FROM notifications WHERE notif_type = 'user'";
  $select_notifications = mysqli_query($connection, $query);

  while ($row = mysqli_fetch_assoc($select_notifications)) {
    
    //declares variables
    $notif_id = $row['notif_id'];
    $notif_author = $row['notif_author'];
    $notif_subject = $row['notif_subject'];
    $notif_time = $row['notif_time'];
    $notif_type = $row['notif_type'];
    $notif_status = $row['notif_status'];
    $notif_receiver = $row['notif_receiver'];

    // if ($notif_status == 'active') {
    //   $notif_status_ico = '<i class="text-success material-icons" data-toggle="tooltip" data-placement="top" title="Published">check_circle_outline</i>';
    // } else {
    //   $notif_status_ico = "<i class='text-danger material-icons' data-toggle='tooltip' data-placement='top' title='Draft'>check_circle_outline</i>";
    // }
    
    // notifs format
    echo "
    <tr>
      <td>{$notif_subject}</td>
      <td class='td-actions text-right'>
        <a href='?dn={$notif_id}' rel='tooltip' title='Remove' class='btn btn-danger'>
          <i class='material-icons'>close</i>
        </a>
      </td>
    </tr>
    ";
    }


}

function deleteNotification() {
  global $connection;
  if (isset($_GET['dn'])) {   
    $notif_id = $_GET['dn'];
    $query = "DELETE FROM notifications WHERE notif_id = {$notif_id} ";
    $delete_notification_query = mysqli_query($connection, $query);
    header("location: index.php");
  }

}


/* Notifications */ 





/* CMS Settings */

$cms_main_color = "";
$sidebar_color = "white";


/* End CMS Settings */


?>


