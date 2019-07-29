<?php include './includes/admin_header.php'; ?>

<?php include './includes/admin_sidebar.php'; ?>

<div class="main-panel">

<?php include './includes/admin_navigation.php'; ?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">

      <?php 

      if (isset($_GET['edit'])) {
        showeditUser();
      } elseif (isset($_POST['edit_user'])) {
        editUser();
      } else {
        
       echo "
        <div class='col-md-8'>
          <div class='card'>
            <div class='card-header card-header-primary'>
              <h4 class='card-title'>Add User</h4>
              <p class='card-category'>Add new user profile</p>
            </div>
   
            <div class='card-body'>";
         addUser(); 
            echo "
              <form method='post' action='' enctype='multipart/form-data'>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                      <label class='bmd-label-floating'>Username</label>
                      <input type='text' name='username' class='form-control'>
                    </div>
                  </div>
                  <div class='col-md-6'>
                    <div class='form-group'>
                      <label class='bmd-label-floating'>Email address</label>
                      <input type='email' name='user_email' class='form-control'>
                    </div>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-md-6'>
                    <div class='form-group'>
                      <label class='bmd-label-floating'>First Name</label>
                      <input type='text' name='user_firstname' class='form-control'>
                    </div>
                  </div>
                  <div class='col-md-6'>
                    <div class='form-group'>
                      <label class='bmd-label-floating'>Last Name</label>
                      <input type='text' name='user_lastname' class='form-control'>
                    </div>
                  </div>
                </div>
                <div class='row'>

                 <div class='col-md-6 mt-3'>
                    <div class='form-group'>
                      <label class='bmd-label-floating'>Password</label>
                      <input type='password' name='user_password' class='form-control'>
                    </div>
                  </div>
                  <div class='col-md-3 mt-3'>
                    
                      <label for='user_image' class='bmd-label-floating'>Profile pic</label>
                      <input type='file' class='form-control-file btn btn-primary' name='user_image'>

                  </div>
                  <div class='col-md-3 mt-3'>
                    <div class='form-group'>
                      <label class='bmd-label-floating'>Role</label>
                      <select name='user_role' class='custom-select'>
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
                        <textarea class='form-control' id='post-body' name='user_description' rows='3'></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                <button type='submit' name='add_user' class='btn btn-primary pull-right'>Add User</button>
                <div class='clearfix'></div>
              </form>
            </div>
          </div>
        </div>
        ";
      }
 
      ?>

      </div>
    </div>
  </div>
  
    </div>
</div>

<?php include './includes/admin_footer.php'; ?>