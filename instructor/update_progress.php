<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="../img/VROOM!.png">
    <title>VROOM! | Profile </title>
</head>
<body>
    <?php include('get_profile.php')?>
    <div class="main-container">
        <div class="head">
            <header class="user">
                <img class="profile" src="../img/profile.jpg" alt="">
                <p class="user_name">Hi <?php echo $fname;?>!</p>
                <div class="subnav-content">
                    <form action="" method="post">
                        <button type="submit" class="logout_btn" name="logout" id="logout">Logout</button>
                    </form>
                </div>
            </header>
        </div>
    
        <aside class="navigation">
            <nav>
                <div class="logo-head">
                    <a href="profile.php"><img class="logo" src="/img/VROOM!_heading2.png" alt="LOGO"></a>
                </div>
                <ul>
                    <li><a href="profile.php"><i class="fas fa-user-alt"></i>Profile</a></li>
                    <li class="active"><a href="progress.php"><i class="fas fa-certificate"></i>Progress</a></li>
                    <li><a href="report.php"><i class="fas fa-qrcode"></i>Report</a></li>
                </ul>
            </nav>
        </aside>

        
    
        <div class="main-content">
            <div class="titlehead">
                <h3>PROGRESS</h3>
            </div>
            <div class="list-container">
                <div class="table">
                    <div class="table-header">
                        <div class="header__item">Name</div>
                        <div class="header__item">Gender</div>
                        <div class="header__item">Birthdate</div>
                        <div class="header__item">Email</div>
                        <div class="header__item">Phone</div>
                        <div class="header__item">Address</div>
                        <div class="header__item">Actions</div>
                    </div>
	            </div>
            </div>
            <?php include("get_student.php");?>
            <!-- The Modal -->
            <div id="editModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div>
                        <h3 class="modal-header">EDIT PROGRESS</h3>
                    </div>
                    <div class="modal-body">
                        <form class="update-form" action="" method="POST">
                            <div class="assign">
                                STUDENT NAME: <?php echo $fname, " ",$lname?><br>
                                <label for="progress">Hours Completed: </label>
                                <input type="number" name="progress" id="progress" value="<?php echo $progress?>" max="<?php echo $hour?>">
                            </div>
                            <div>
                                <button class="form-btn update" type="submit" name="update_progress">UPDATE</button>
                                <button class="form-btn cancel" onclick="location.href='progress.php'; return false;">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var modals = document.getElementById("editModal");
        modals.style.display = "block";
    </script>
</body>
</html>
