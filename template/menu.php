
<?php include_once($_SERVER['DOCUMENT_ROOT'] .$pathAPP."/includes/authorization.php");?>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><?php echo $applicationName; ?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $pathAPP;  ?>index.php">Home</a></li>
                <li><a href="<?php echo $pathAPP;  ?>public/about.php">About</a></li>
                <li><a href="<?php echo $pathAPP;  ?>public/contact.php">Contact</a></li>
                <li><a href="<?php echo $pathAPP;  ?>videostore.php">Videostore</a></li>
                <li><a href="<?php echo $pathAPP;  ?>ERA.php">ERA</a></li>

                <?php if(isset($role) && $role==1){ ?> 
                    <li class="dropdown">
                        <a class="dropdown-toggle" style="color:green;" data-toggle="dropdown" href="#">Admin Tools
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a style="color:green;" href="insert_into_videostore.php">Insert a New Video</a></li>
                            <li><a style="color:green;" href="manage_videostore.php">Manage Videostore</a></li>
                            <li><a style="color:green;" href="manage_users.php">Manage Users</a></li>
                        </ul>
                    </li>
                <?php } ?>



                <!--<li><a style="color:green;" href='.$pathAPP.'insert_into_videostore.php>Videostore Management</a></li>-->
            </ul>


            <ul class="nav navbar-nav" style="float: right">
                <?php if(isset($user_id)){ ?>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Profile
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.php">My Profile</a></li>
                        <li><a href="logout.php">Log Out</a></li>
                    </ul>
                </li>


                <?php 
                }else{

                ?>
                <li><a href="<?php echo $pathAPP;  ?>public/login.php">Login</a></li>
                <li><a href="<?php echo $pathAPP;  ?>public/register.php">Register</a></li>
                
                <?php } ?>
            </ul>

            <ul id="userInfo" class="nav navbar-nav" style="float: right"> </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>