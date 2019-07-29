

<div class="sidebar" data-color="green" data-background-color="<?php echo $sidebar_color; ?>" data-image="http://localhost/cms/admin/assets/img/sidebar-2.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="." class="simple-text logo-normal">
          CMS Dashboard
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'index.php'){echo 'nav-item active'; }else { echo ''; } ?>">
            <a class="nav-link" href="./index.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../index.php">
              <i class="material-icons">home</i>
              <p>Homepage</p>
            </a>
          </li>
 
          <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'posts.php' || basename($_SERVER['SCRIPT_NAME']) == 'add_post.php' || basename($_SERVER['SCRIPT_NAME']) == 'edit_post.php'){echo 'nav-item active'; }else { echo ''; } ?>">
            <a class="nav-link" href="./posts.php?form=grid">
              <i class="material-icons">content_paste</i>
              <p>Posts</p>
            </a>
          </li>
          <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'comments.php'){echo 'nav-item active'; }else { echo ''; } ?>">
            <a class="nav-link" href="./comments.php">
              <i class="material-icons">bubble_chart</i>
              <p>Comments</p>
            </a>
          </li>
          <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'categories.php'){echo 'nav-item active'; }else { echo ''; } ?>">
            <a class="nav-link" href="./categories.php">
              <i class="material-icons">style</i>
              <p>Categories</p>
            </a>
          </li>
          <hr>
          <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'users.php'){echo 'nav-item active'; }else { echo ''; } ?>">
            <a class="nav-link" href="./users.php">
              <i class="material-icons">group</i>
              <p>Users</p>
            </a>
          </li>
          <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'user.php'){echo 'nav-item active'; }else { echo ''; } ?>">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>Add/Edit User</p>
            </a>
          </li>
          <li class="<?php if(basename($_SERVER['SCRIPT_NAME']) == 'settings.php'){echo 'nav-item active'; }else { echo 'nav-item active-pro '; } ?>">
           <!-- <li class="nav-item active-pro "> -->
                <a class="nav-link" href="./settings.php">
                    <i class="material-icons">settings</i>
                    <p>Settings</p>
                </a>
            </li>  
        </ul>
      </div>
    </div>
