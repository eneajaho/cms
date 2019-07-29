

      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">          
            <a class="navbar-brand" href="javascript:void(0)"> 
            <?php
            // changes navigation name based on url 
            $url = basename($_SERVER['SCRIPT_NAME']);
            switch ($url) {
                case "users.php":
                    echo "Users";
                    break;
                case "posts.php":
                    echo "Posts";
                    break;
                case "edit_post.php":
                    echo "Edit Post";
                    break;
                case "add_post.php":
                    echo "Add Post";
                    break;    
                case "categories.php":
                  echo "Categories";
                  break;
                case "comments.php":
                  echo "Comments";
                  break;
                default:
                    echo "Dashboard";
            }
            ?> 
            </a>
          </div>

          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end">

            <ul class="navbar-nav">

              <li class="nav-item dropdown">
                  <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuPerson" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">person</i>
                      <p class="d-lg-none d-md-block">
                    Welcome 
                    <?php if(isset($_SESSION["username"])) { echo $_SESSION["username"]; } ?>
                  </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuPerson">
                    
     <?php if(isset($_SESSION["user_id"])) { echo "<a class='dropdown-item' href='user.php?edit={$_SESSION["user_id"]}'> My Profile</a>" ; }
                    ?>
                     
                      <a class="dropdown-item" href='../includes/logout.php'>Logout</a>
                    </div>
              </li>
            </ul>

          </div>

        </div>
      </nav>
      <!-- End Navbar -->
