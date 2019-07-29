<?php include './includes/admin_header.php'; ?>

<?php include './includes/admin_sidebar.php'; ?>

<div class="main-panel">

<?php include './includes/admin_navigation.php'; ?>

<div class="content">
  <div class="container-fluid">
  
  <div class="row">

  <div class="col-md-12">
        <!-- Nav tabs -->
   <div class="text-right">
   <a class="btn btn-success" href="add_post.php" ><i class="material-icons">add_circle_outline</i>  New Post</a>
    <a class="btn btn-success " href="posts.php?form=grid"><i class="material-icons">apps</i></a>
    <a class="btn btn-success" href="posts.php?form=table"><i class="material-icons">menu</i></a>
  
   </div>


  </div>    

<?php 
change_post_format(); 
publish_draft_Post(); 
deletePost(); 
?>

</div>          
</div>
</div>

<?php include './includes/admin_footer.php'; ?>