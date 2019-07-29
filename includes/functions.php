<?php ob_start(); ?>
<?php session_start(); ?>
<?php  

function showPosts(){
    global $connection;
    global $cms_url;
    // Select all posts that have status: 'published'
    $query = "SELECT * FROM posts WHERE post_status = 'published'";
    $select_all_posts_query = mysqli_query($connection, $query);

    // checks if are published any posts, if not show warning
    $count = mysqli_num_rows($select_all_posts_query);
    if($count == 0){
      echo "<div class='alert alert-warning p-5 text-center' role='alert'><h3>No posts are published in blog!</h3></div>";
    }

    // Looping through posts and declaring variables
    while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
      $post_id = $row['post_id'];
      $post_url = $row['post_url'];
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_user = $row['post_user'];
      $post_date = $row['post_date'];
      $post_image = $row['post_image'];
      $post_content = $row['post_content'];
      $post_tags = $row['post_tags'];
      $post_comment_count = $row['post_comment_count'];
      $post_views_count = $row['post_views_count'];

      // Splits post tags 
      $posttags = explode(', ', $post_tags); //split string into array seperated by ', '
      
      // post format
      echo "
      <div class='card mb-4 shadow-lg bg-white rounded border-0'>
      <a href='{$cms_url}/post.php?id={$post_id}'>
      <img class='card-img-top' src='{$cms_url}/img/{$post_image}' alt='Card image cap'>
      </a>     

        <div class='card-body'>
          <h3 class='card-title'>{$post_title}</h3>
          <p class='card-text text-truncate'>{$post_content}</p>
          <a href='{$cms_url}/post.php?id={$post_id}' class='btn btn-primary text-right'>Read More      <i class='fas fa-angle-right'></i> </a>
        </div>  
        <div class='card-footer text-muted'>
          <i class='far fa-clock'></i>  {$post_date}  |  <i class='far fa-user'></i>  by: <a href='author.php?id={$post_author}'>{$post_author}</a>  | <a href='{$cms_url}/post.php?id={$post_id}#comment-section'>{$post_comment_count}  <i class='far fa-comments'></i> </a>  |     <i class='fas fa-tags'></i>  "; 
    
        // Looping foreach tags
          foreach($posttags as $tag) {
              // if tag is empty than skip
              if(empty($tag)){
                break;
              } else {
                echo "  <a href='{$cms_url}/includes/search.php?search={$tag}'><i class='fas fa-hashtag'></i>{$tag}</a>  "; 
              }
          }
            
              
        echo "</div></div>";


      }
}


function _post(){   
  if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    global $connection;
    global $cms_url;

    // Add post views
    $add_post_views = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = $post_id ";
    $select_post_query = mysqli_query($connection, $add_post_views);

    // Select all posts
    $select_post = "SELECT * FROM posts WHERE post_id = $post_id ";
    $select_post_query = mysqli_query($connection, $select_post);

    // Looping through posts and declaring variables
    while ($row = mysqli_fetch_assoc($select_post_query)) {
      $post_id = $row['post_id'];
      $post_url = $row['post_url'];
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      $post_image = $row['post_image'];
      $post_content = $row['post_content'];
      $post_tags = $row['post_tags'];
      $post_comment_count = $row['post_comment_count'];
      $post_views_count = $row['post_views_count'];
      $post_category_id = $row['post_category_id'];

      // Splits post tags 
      $posttags = explode(', ', $post_tags); //split string into array seperated by ', '
    

    // Get Category name from post id
    $select_category = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
    $select_category_query = mysqli_query($connection, $select_category);       
    while ($row = mysqli_fetch_assoc($select_category_query)) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
    }
    // Posts format
    echo "<div class='card shadow-lg bg-white rounded border-0'>
    <div class='card-body'>
    <h1><a href='post.php?id={$post_id}'>{$post_title}</a></h1>
    <p><i class='far fa-clock'></i>Posted on  {$post_date},  by  <i class='far fa-user'></i>  <a href='author.php?id={$post_author}'>{$post_author}</a>  in:  <a href='{$cms_url}/category.php?id={$cat_id}'>{$cat_title}</a>, <a href='#comment-section'> {$post_comment_count}  <i class='far fa-comments'></i></a>,  {$post_views_count} Views ";
    
 
      if (isset($_SESSION['role']) == 'admin') {
        echo "  <a href='{$cms_url}/admin/edit_post.php?id={$post_id}'><i class='far fa-edit'></i>   Edit Post</a>";
      } else { break; }
    
 
    echo "</p>
    <hr><img class='img-fluid rounded' src='{$cms_url}/img/{$post_image}' alt=''><hr>
    <p class='lead'>{$post_content}</p>
    <br><hr>
    <div id='comment-section' class='alert alert-primary text-center' role='alert'> Comments</div>
    ";

    // gets all comments from database and shows them based in post id
    $select_comment = "SELECT * FROM comments WHERE comment_post_id = {$post_id} AND comment_status = 'approved' ORDER BY comment_id DESC";
    $select_comment_query = mysqli_query($connection, $select_comment);

    while ($row = mysqli_fetch_array($select_comment_query)) {
      $comment_date = $row['comment_date']; 
      $comment_content = $row['comment_content'];
      $comment_author = $row['comment_author'];
      $comment_email = $row['comment_email'];
            
      // Comments 
      echo "
      <div class='card mt-3 mb-3'>
        <div class='card-body'>
        <div class='row'>  
          <div class='col-md-2'>  
            <img class='img-fluid' src='https://gravatar.com/avatar/aaca0f5eb4d2d98a6ce6dffa99f8254b?s=200&d=mp&r=pg'>
          </div>  
          <div class='col-md-10'>  
            <h5 class='card-title '><a href='mailto:{$comment_email}'>{$comment_author}</a>  <small>on {$comment_date}</small></h5>   
            <p class='card-text'>{$comment_content}</p>
            <a href='#' class='card-link'></a>
            <a href='#' class='card-link'></a>
          </div>  
        </div>
        </div>
      </div>";
    }
    
    echo "<div class='card mb-4'><h5 class='card-header'>Leave a Comment:</h5><div class='card-body'>
      <form method='post' action=''>
      <div class='form-group'>
        <label>Author</label>
        <input type='text' class='form-control' name='comment_author' placeholder='Your name'>
      </div>
      <div class='form-group'>
        <label>Email address</label>
        <input type='email' class='form-control' name='comment_email' placeholder='Enter email'>
      </div>
        <div class='form-group'>
          <label>Your comment</label>
          <textarea class='form-control' name='comment_content' rows='3'></textarea>
        </div>
        <button type='submit' name='add_comment' class='btn btn-primary'>Comment</button>
      </form>
    </div>
    </div>
    </div>
    </div>";}
  } else{
    header("location: index.php");
  }
} 

function _category(){
   
  if (isset($_GET['id'])) {
    $cat_id = $_GET['id'];

    global $connection;
    global $cms_url;

    // Get Category name from post id
    $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
    $select_category = mysqli_query($connection, $query);       
    while ($row = mysqli_fetch_assoc($select_category)) {
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
    }

    // Select all posts with the defined category id
    $query = "SELECT * FROM posts WHERE post_category_id = $cat_id AND post_status = 'published'";
    $select_posts_category = mysqli_query($connection, $query);

    $count = mysqli_num_rows($select_posts_category);
    if($count == 0) {
      echo "<div class='alert alert-warning p-5 text-center' role='alert'><h3>Nothing found in this category!</h3></div>
      <div class='alert alert-primary text-center'>You can watch other categories or <a href='{$cms_url}'><i class='fas fa-home'></i> Go To Homepage</a></div>";
    } else {
      echo "<div class='alert alert-success p-4 text-center' role='alert'><h3>Posts in category: {$cat_title}</h3></div>";

    // Looping through posts and declaring variables
    while ($row = mysqli_fetch_assoc($select_posts_category)) {
      $post_id = $row['post_id'];
      $post_url = $row['post_url'];
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      $post_image = $row['post_image'];
      $post_content = $row['post_content'];
      $post_tags = $row['post_tags'];
      $post_comment_count = $row['post_comment_count'];
      $post_views_count = $row['post_views_count'];
      $post_category_id = $row['post_category_id'];

      // Splits post tags 
      $posttags = explode(', ', $post_tags); //split string into array seperated by ', '
    
      // post format
      echo "
      <div class='card mb-4 shadow-lg bg-white rounded border-0'>
      <a href='{$cms_url}/post.php?id={$post_id}'>
      <img class='card-img-top' src='{$cms_url}/img/{$post_image}' alt='Card image cap'>
      </a>     
        <div class='card-body'>
          <h3 class='card-title'>{$post_title}</h3>
          <p class='card-text text-truncate'>{$post_content}</p>
          <a href='{$cms_url}/post.php?id={$post_id}' class='btn btn-primary text-right'>Read More      <i class='fas fa-angle-right'></i> </a>
        </div>  
        <div class='card-footer text-muted'>
          <i class='far fa-clock'></i>  {$post_date}  |  <i class='far fa-user'></i>  by: <a href='author.php?id={$post_author}'>{$post_author}</a>  | <a href='{$cms_url}/post.php?id={$post_id}#comment-section'>{$post_comment_count}  <i class='far fa-comments'></i> </a>  |     <i class='fas fa-tags'></i>  "; 
    
        // Looping foreach tags
          foreach($posttags as $tag) {
              // if tag is empty than skip
              if(empty($tag)){
                break;
              } else {
                echo "  <a href='{$cms_url}/includes/search.php?search={$tag}'><i class='fas fa-hashtag'></i>{$tag}</a>  "; 
              }
          }
            
              
        echo "</div></div>";

  }}}else{
    header("location: index.php");
  }


}
        

function _author(){
   
  if (isset($_GET['id'])) {
    $post_author = $_GET['id'];

    global $connection;
    global $cms_url;

    // Get Category name from post id
    $query = "SELECT * FROM posts WHERE post_author = '{$post_author}' AND post_status = 'published'";
    $select_posts_author = mysqli_query($connection, $query);    

    while ($row = mysqli_fetch_assoc($select_posts_author)) {
      $post_id = $row['post_id'];
      $post_url = $row['post_url'];
      $post_title = $row['post_title'];
      $post_author = $row['post_author'];
      $post_date = $row['post_date'];
      $post_image = $row['post_image'];
      $post_content = $row['post_content'];
      $post_tags = $row['post_tags'];
      $post_comment_count = $row['post_comment_count'];
      $post_views_count = $row['post_views_count'];
      $post_category_id = $row['post_category_id'];
      
      // Splits post tags 
      $posttags = explode(', ', $post_tags); //split string into array seperated by ', '
        
    }

    $count = mysqli_num_rows($select_posts_author);
    if($count == 0) {
      echo "<div class='alert alert-warning p-5 text-center' role='alert'><h3>This author has not made any posts!</h3></div>
      <div class='alert alert-primary text-center'>You can watch other authors or <a href='{$cms_url}'><i class='fas fa-home'></i> Go To Homepage</a></div>";
    } else {
      echo "<div class='alert alert-success p-4 text-center' role='alert'><h3>Posts made by: {$post_author}</h3></div>";

      // post format
      echo "<div class='card mb-4 shadow-lg bg-white rounded border-0'>
      <a href='{$cms_url}/post.php?id={$post_id}'>
      <img class='card-img-top' src='{$cms_url}/img/{$post_image}' alt='Card image cap'>
      </a><div class='card-body'>
      <h3 class='card-title'>{$post_title}</h3>
      <p class='card-text text-truncate'>{$post_content}</p>
      <a href='{$cms_url}/post.php?id={$post_id}' class='btn btn-primary text-right'>Read More      <i class='fas fa-angle-right'></i> </a> </div>  
      <div class='card-footer text-muted'>
      <i class='far fa-clock'></i>  {$post_date}  |  <i class='far fa-user'></i>  by: {$post_author}  | <a href='{$cms_url}/post.php?id={$post_id}#comment-section'>{$post_comment_count}  <i class='far fa-comments'></i> </a>  |     <i class='fas fa-tags'></i>  "; 
    
        // Looping foreach tags
          foreach($posttags as $tag) {
              // if tag is empty than skip
              if(empty($tag)){
                break;
              } else {
                echo "  <a href='{$cms_url}/includes/search.php?search={$tag}'><i class='fas fa-hashtag'></i>{$tag}</a>  "; 
              }
          }
            
              
        echo "</div></div>";

  }
    }else{
    header("location: index.php");
  }


}


function _search(){

  global $connection;
  global $cms_url;

  // Declares variable search
  $search = $_GET['search'];
  // Checks if search box is completed
  if (isset($search)) {
    // if search box is empty - show warning alert
    if (empty($search)) {
      echo "<div class='alert alert-warning p-5 text-center' role='alert'><h3>Please enter a keyword to search for...!</h3></div>
      <div class='alert alert-primary text-center'>Search Again or <a href='{$cms_url}'>Go to homepage</a></div>";
    } else {
      // queries posts from database
      $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' AND post_status = 'published' ";
      $search_query = mysqli_query($connection, $query);
    
      $count = mysqli_num_rows($search_query);
      if($count == 0) {
        echo "<div class='alert alert-warning p-5 text-center' role='alert'><h3>Nothing Found!</h3></div>
        <div class='alert alert-primary text-center'>You can search again or <a href='{$cms_url}'><i class='fas fa-home'></i> Go To Homepage</a></div>";
      } else {
        echo "<div class='alert alert-success p-4 text-center' role='alert'><h3>Results found for: {$search}</h3></div>";
        while ($row = mysqli_fetch_assoc($search_query)) {
          $post_id = $row['post_id'];
          $post_url = $row['post_url'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_user = $row['post_user'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];
          $post_tags = $row['post_tags'];
          $post_comment_count = $row['post_comment_count'];
          $post_views_count = $row['post_views_count'];
          // Splits post tags 
          $posttags = explode(', ', $post_tags); //split string into array seperated by ', '
            
      // post format
      echo "
      <div class='card mb-4 shadow-lg bg-white rounded border-0'>
      <a href='{$cms_url}/post.php?id={$post_id}'>
      <img class='card-img-top' src='{$cms_url}/img/{$post_image}' alt='Card image cap'>
      </a>     
        <div class='card-body'>
          <h3 class='card-title'>{$post_title}</h3>
          <p class='card-text text-truncate'>{$post_content}</p>
          <a href='{$cms_url}/post.php?id={$post_id}' class='btn btn-primary text-right'>Read More      <i class='fas fa-angle-right'></i> </a>
        </div>  
        <div class='card-footer text-muted'>
          <i class='far fa-clock'></i>  {$post_date}  |  <i class='far fa-user'></i>  by: <a href='author.php?id={$post_author}'>{$post_author}</a>  | <a href='{$cms_url}/post.php?id={$post_id}#comment-section'>{$post_comment_count}  <i class='far fa-comments'></i> </a>  |     <i class='fas fa-tags'></i>  "; 
    
        // Looping foreach tags
          foreach($posttags as $tag) {
              // if tag is empty than skip
              if(empty($tag)){
                break;
              } else {
                echo "  <a href='{$cms_url}/includes/search.php?search={$tag}'><i class='fas fa-hashtag'></i>{$tag}</a>  "; 
              }
          }
            
              
        echo "</div></div>";

    }}}}else{
      header("location: {$cms_url}/index.php");
    }
}

function addComment(){

  if (isset($_POST['add_comment'])) {
    global $post_id;
    global $connection;
    // declaring variables
    $comment_author = $_POST['comment_author'];
    $comment_email = $_POST['comment_email'];
    $comment_content = $_POST['comment_content'];
    $comment_post_id = $_GET['id'];

    // insert comment in database
    $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($comment_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'unapproved', now() ) ";
    $add_comment_query = mysqli_query($connection, $query);

    //increase comment number
    $comments_number = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $comment_post_id "; 
    $increase_comment_number_query = mysqli_query($connection, $comments_number);
  
    // creates notification
    $create_notification = "INSERT INTO `notifications` (`notif_author`, `notif_subject`, `notif_time`, `notif_type`, `notif_status`, `notif_receiver`) VALUES ('{$comment_author}', '{$comment_author} added a comment in post with ID: {$comment_post_id}', now(), 'comment', 'active', 'root')";
    $create_notification_query = mysqli_query($connection, $create_notification) or die('QUERY FAILED' . mysqli_error($connection) );

    echo "<div class='alert alert-warning alert-dismissible fade show mt-3 text-center' role='alert'>
    Your comment was submited and is waiting for approval!
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
    </button>
  </div>";

  header('Location:'.$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']);
  die;

  }






}

function _login(){
	
  if (isset($_POST['login'])) {
    global $connection;
    global $cms_url;
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $username = mysqli_real_escape_string($connection, $username);
    // $password = mysqli_real_escape_string($connection, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $login_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($login_query)) {

        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

        if ($username == $db_username && $password == $db_user_password) {

          $_SESSION['username'] = $db_username;
          $_SESSION['user_id'] = $db_user_id;
          $_SESSION['password'] = $db_user_password;
          $_SESSION['firstname'] = $db_user_firstname;
          $_SESSION['role'] = $db_user_role;

          header("location: {$cms_url}/admin");

        } else {
          echo "<br><div class='alert text-center alert-warning'>Wrong username or password!</div><br>";
        }

      }
    }
  }

?>

