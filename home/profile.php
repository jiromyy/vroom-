<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
                    <li class="active"><a href="profile.php"><i class="fas fa-user-alt"></i>Profile</a></li>
                    <li><a href="transactions.php"><i class="fas fa-qrcode"></i>Transactions</a></li>
                    <li><a href="certificates.php"><i class="fas fa-certificate"></i>Progress</a></li>
                </ul>
            </nav>
        </aside>
    
        <div class="main-content">
            <div class="pic_container">
                <form action="upload_photo.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
                    <?php if($pic == NULL){?>
                        <img class="pic" src="../uploads/default_pic.png" alt="">
                    <?php } 
                        else?>
                        <img class="pic" src="../uploads/<?php echo $pic?>" alt="">
                    <input type="file" name="dp" id="dp" required>
                    <button class="up_pic" type="submit">UPDATE PHOTO</button>
                </form>
            </div>
            <div class="info">
                
            </div>

            <div class="info_container">
                <div class="txttitle" id="fname">PERSONAL INFORMATION</div>
                    <div class="err" id = "err"> 
                        <?php include_once("../includes/errors.php");?>
                    </div>
                    
                    <div class="info-block">
                        First Name: <span class="txt" name="fname"><?php echo $fname;?></span>
                    </div>
                    <div class="info-block">
                        Last Name: <span class="txt" name="lname"><?php echo $lname;?></span>
                    </div>
                    <div class="info-block">
                        Gender: <span class="txt" name="gender"><?php echo $gender;?></span>
                    </div>
                    <div class="info-block">
                        Birthday: <span class="txt" name="bday"><?php echo $bdate;?></span>
                    </div>
                    <div class="info-block">
                        Email: <span class="txt" name="email"><?php echo $email;?></span>
                    </div>
                    <div class="info-block">
                        Number: <span class="txt" name="number"><?php echo $phone;?></span>
                    </div>
                    <div class="info-block">
                        Address: <span class="txt" name="address"><?php echo $address;?></span>
                    </div>
                    <div class="info-block">
                        Valid ID: <span class="txt" name="validID"><?php 
                                                                       if($validID!=NULL){
                                                                        echo "<i style='color:green' class='fas fa-check-square'></i>";
                                                                        }    
                                                                        else{
                                                                            echo "<i style='color:red' class='fas fa-times-circle'></i>";
                                                                        }?></span>
                        <button id="viewID">VIEW</button>
                    </div>
                    <div class="info-block">
                        Birth Record: <span class="txt" name="PSA"><?php 
                                                                        if($PSA!=NULL){
                                                                            echo "<i style='color:green' class='fas fa-check-square'></i>";
                                                                        }    
                                                                        else{
                                                                            echo "<i style='color:red' class='fas fa-times-circle'></i>";
                                                                        }?></span></span>
                        <button id="viewPSA">VIEW</button>
                   </div>
                    <button class="edit_btn" id="myBtn">EDIT</button>
            </div>
            
            <div class="progress_container">
                <div class="txttitle" id="fname">LESSON PROGRESS</div>
                <?php
                    $query = "SELECT * from lessons";
                    $result = mysqli_query($db, $query);

                    while($row = mysqli_fetch_assoc($result)){
                        $name = $row['lessonName'];
                        $duration = $row['hour'];
                        echo '<div class="txttitles" id="fname">'.$name.'</div>';
                        
                        $query = "SELECT * from student_lesson WHERE studentID = '$id' and lesson = '$name' and approve = 1";
                        $res = mysqli_query($db, $query);

                        while($r = mysqli_fetch_assoc($res)){
                            $sched = $r['date'];
                            $progress = $r['progress'];
                            echo $sched;
                            
                            echo '<progress style="margin-left:40px"id="file" value='. $progress/$duration*100 .' max="100"></progress>';
                            echo $progress/$duration*100 . "%<br>";
                        }

                        if(mysqli_num_rows($res)==0){ ?>
                            <h3>-- No Records --</h3>
                    <?php   }
                    }
                ?>
            </div>

            <div id="idmodal" class="idmodal">
                <img src="../uploads/<?php echo $validID?>" alt="">
            </div>

            <div id="PSAmodal" class="idmodal">
                <img src="../uploads/<?php echo $PSA?>" alt="">
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div>
                        <h3 class="modal-header">EDIT INFORMATION</h3>
                    </div>
                    <div class="modal-body">
                        <form class="update-form" action="" method="post" enctype="multipart/form-data">
                            <div class="flex">
                                <label for="fname">First Name: </label>
                                <input type="text" name="fname" id="fname" value="<?php echo $fname;?>" required>
                                <label for="lname">Last Name: </label>
                                <input type="text" name="lname" id="lname" value="<?php echo $lname;?>" required>
                            </div>
                            <div class="flexradio">
                                <label for="gender">Gender: </label>
                                <input type="radio" name="gender" id="male" value="Male" required>
                                <label for="male">Male</label>
                                <input type="radio" name="gender" id="female" value="Female" required>
                                <label for="female">Female</label>
                                <label for="bday">Birthday: </label>
                                <input type="date" name="bday" id="bday" value="<?php echo $bdate;?>" required>
                            </div>
                            <div class="flex">
                                <label for="email">Email: </label>
                                <input type="email" name="email" id="email" value="<?php echo $email;?>" required> 
                                <label for="fname">Phone: </label>
                                <input type="tel" name="phone" id="phone" value="<?php echo $phone;?>" required>
                            </div>
                            <div class="flexadd">
                                <label for="address">Address: </label>
                                <input type="text" name="address" id="address" value="<?php echo $address;?>" required>
                            </div>
                            <div class="flex">
                                <label for="validID">Valid ID: </label>
                                <input type="file" name="validID" id="validID"> 
                                <label for="PSA">NSO/PSA: </label>
                                <input type="file" name="PSA" id="PSA"> 
                            </div>
                            <div>
                                <button class="form-btn update" type="submit" name="update">UPDATE</button>
                                <button class="form-btn cancel" type="submit" id="cancelBtn">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="home.js"></script>
    <script>
        if ('<?php echo $fname ?>' ==""){
            modal.style.display = "block";
            cbtn.style.display = "none";
        }else{
            modal.style.display = "none";
            cbtn.style.display = "block";
        }
    </script>
</body>
</html>
