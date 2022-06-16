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
                    <form action="changepass.php?id=<?php echo $id;?>" method="post">
                        <button type="submit" class="logout_btn" name="changepass" id="changepass">Change Password</button>
                    </form>
                    <form action="" method="POST">
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
                        <div class="header__item">Student</div>
                        <div class="header__item">Course</div>
                        <div class="header__item">Book Date</div>
                        <div class="header__item">Schedule date</div>
                        <div class="header__item">Progress</div>
                        <div class="header__item">Actions</div>
                    </div>



        <?php
            $name = $fname .' '.$lname;
            $query = "SELECT * FROM student_lesson WHERE instructor = '$name'";
            $result = mysqli_query($db, $query);

            if(mysqli_num_rows($result)==0){ ?>
                <h2>-- No Records --</h2>
        <?php   }

            
            while($row = mysqli_fetch_assoc($result)){
                $bookid = $row['bookID'];
                $id = $row['studentID'];
                $lesson = $row['lesson'];
                $date = $row['date'];
                $regdate = $row['regDate'];
                $progress = $row['progress'];
                
                $query = "SELECT * FROM student WHERE studentID ='$id'";
                $rslt = mysqli_query($db, $query);
                $rows = mysqli_fetch_assoc($rslt);
                $fname = $rows['FName'];
                $lname = $rows['LName'];

                $query = "SELECT * FROM lessons WHERE lessonName = '$lesson'";
                $res = mysqli_query($db, $query);
                $r = mysqli_fetch_assoc($res);
                $duration = $r['hour'];
        ?>    
                    <div class="table-content">	
                        <div class="table-row">		
                            <div class="table-data"><?php echo $fname?>  <?php echo $lname?></div>
                            <div class="table-data"><?php echo $lesson?></div>
                            <div class="table-data"><?php echo $regdate?></div>
                            <div class="table-data"><?php echo $date?></div>
                            <div class="table-data"><?php echo ($progress/$duration)*100?>%</div>
                            <div class="table-data">
                                
                            <?php 
                                if (($progress/$duration)*100 == 100){
                                    echo '<form action="generate_cert.php?name='.$fname.' ' .$lname.'&lesson=' .$lesson.'&id='.$bookid.'" method="POST">
                                        <button type="submit">GENERATE CERTIFICATE</button>
                                    </form>';
                                    ;
                                }
                            ?>
                            
                            <button><a href="update_progress.php?id=<?php echo $bookid ?>">UPDATE PROGRESS</a></button></form>
                        </div>
                    </div>
            <?php
                }
            ?>    	
	            </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
