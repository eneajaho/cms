<?php include './includes/admin_header.php'; ?>

<?php include './includes/admin_sidebar.php'; ?>

<div class="main-panel">

<?php include './includes/admin_navigation.php'; ?>

<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-md-12">
<a class="btn btn-success pull-right" href="user.php?add=user">Add User</a>
</div>
</div>

  <div class="row">
  

  <div class="col-md-12">
      <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Users</h4>
                <p class="card-category"> Here you'll find all users</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead class=" text-primary">
                      <th> 
                      ID
                      </th>
                      <th>
                      Username
                      </th>
                      <th>
                      Email
                      </th>
                      <th>
                      Image  
                      </th>
                      <th>
                      Name
                      </th>
                      <th>
                      Description
                      </th>
                      <th> 
                      Role
                      </th>
                      <th>
                      Edit
                      </th>
                      <th>
                      Delete
                      </th>
                    </thead>

        <tbody>
        <!-- Shows Comments in Table data through looping  -->
          <?php showUsersTable();  ?>
        <!-- Comment Actions  -->
          <?php 
           deleteUser(); 
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