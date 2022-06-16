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
                <p class="user_name">Hi Admin!</p>
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
                    <li><a href="students.php"><i class="fas fa-users"></i>Students</a></li>
                    <li class="active"><a href="instructors.php"><i class="fas fa-chalkboard-teacher"></i>Instructors</a></li>
                    <li><a href="catalog.php"><i class="fas fa-file-invoice-dollar"></i>Catalog</a></li>
                </ul>
            </nav>
        </aside>

        
    
        <div class="main-content">
            <div class="titlehead">
                <h3>INSTRUCTORS</h3>
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

        <?php
            $query = "SELECT * FROM instructor";
            $result = mysqli_query($db, $query);

            if(mysqli_num_rows($result)==0){ ?>
                <h2>-- No Records --</h2>
        <?php   }

            
            while($row = mysqli_fetch_assoc($result)){
            $id = $row['studentID'];
            $fname = $row['FName'];
            $lname = $row['LName'];
            $gender = $row['gender'];
            $email = $row['email'];
            $bdate = $row['birthDate'];
            $address = $row['address'];
            $phone = $row['phone'];
        ?>    
                    <div class="table-content">	
                        <div class="table-row">		
                            <div class="table-data"><?php echo $fname?>  <?php echo $lname?></div>
                            <div class="table-data"><?php echo $gender?></div>
                            <div class="table-data"><?php echo $bdate?></div>
                            <div class="table-data"><?php echo $email?></div>
                            <div class="table-data"><?php echo $phone?></div>
                            <div class="table-data"><?php echo $address?></div>
                            <div class="table-data">
                            
                            <button><a href="edit_instructor.php?id=<?php echo $id ?>">EDIT</a></button></form>
                            <button><a href="delete_instructor.php?id=<?php echo $id ?>">DELETE</a></button></form>
                            
                        </div>
                    </div>
            <?php
                }
            ?>    	
	            </div>
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div>
                        <h3 class="modal-header">EDIT INFORMATION</h3>
                    </div>
                    <div class="modal-body">
                        <form class="update-form" action="" method="post">
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
</body>
</html>
