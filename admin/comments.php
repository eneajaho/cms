<?php include './includes/admin_header.php'; ?>

<?php include './includes/admin_sidebar.php'; ?>

<div class="main-panel">

<?php include './includes/admin_navigation.php'; ?>

<div class="content">
  <div class="container-fluid">
  <div class="row">

  <div class="col-md-12">
      <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Comments</h4>
                <p class="card-category"> Here you'll find all comments</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class=" text-primary">
                      <th> 
                      ID
                      </th>
                      <th>
                      Author
                      </th>
                      <th>
                      Email
                      </th>
                      <th>
                      Content
                      </th>
                      <th>
                      Status  
                      </th>
                      <th> 
                      Post
                      </th>
                      <th>
                      Date
                      </th>
                      <th>
                      Un/Approve
                      </th>
                      <th>
                      Delete
                      </th>
                    </thead>

        <tbody>
        <!-- Shows Comments in Table data through looping  -->
          <?php showCommentsTable();  ?>
        <!-- Comment Actions  -->
          <?php 
           deleteComment(); 
           approveComment();
           unapproveComment();
          ?>
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