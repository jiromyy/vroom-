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
                    <li class="active"><a href="transactions.php"><i class="fas fa-qrcode"></i>Transactions</a></li>
                    <li><a href="certificates.php"><i class="fas fa-certificate"></i>Certificates</a></li>
                </ul>
            </nav>
        </aside>
    
        <div class="main-content">
            <div class="book_container">
                <div class="txttitle" id="fname">BOOK A LESSON</div>
                <form method="post">
                    <div class="flexyz">
                        <label for="lesson">Select Lesson:</label>
                        <select id="sel" class="sel" name="lesson" id="sellesson" value="<?php echo $dname; ?>"> 
                            <?php
                                $query = "SELECT * FROM lessons";
                                $result = mysqli_query($db, $query);                    
                                while($row = mysqli_fetch_assoc($result)){
                                    $name = $row['lessonName'];
                                    $details = $row['lessonDetails'];
                                    $price = $row['price'];
                                    $hour = $row['hour']; ?>
                                    <option value="<?php echo $name?>"> <?php echo $name?></option>
                                <?php } ?>
                        </select>
                        <button type="" name="getDetail">NEXT</button>
                </form>
                
                <form style="margin-top:50px" action="book.php?id=<?php echo $id; ?>&lesson=<?php echo $dname; ?>" method="post" enctype="multipart/form-data">                
                    </div>
                    <div class="flexy">
                        <label for="lesson">Select Date:</label>
                        <input class="sel" type="date" name="date" id="date" required>
                    </div>
                    <div class="flexy">
                        <label for="lesson">Upload Payment:</label>
                        <input type="file" name="payment" id="payment" required>
                    </div>
                    <button class="edit_btn" type="submit">BOOK!</button>
                </form>

                <div style="text-align:center; color:blue"><?php include("../includes/errors.php");?></div>
                
                
                <div class="Ldetails" id="fname">LESSON AND PAYMENT DETAILS</div>
                <div class="detail-container">
                    <div>
                        <div class="flexy">
                            <h4>Name:</h4>
                            <h4 id="names"><?php echo $dname?></h4>
                        </div>
                        <div class="flexy">
                            <h4>Price:</h4>
                            <h4 id="prices"><?php echo $dprice?></h4>
                        </div>
                        <div class="flexy">
                            <h4>Duration:</h4>
                            <h4 id="hours"><?php echo $dhour?></h4>
                        </div>
                            <div class="flexy">
                            <h4>Description:</h4>
                            <h4 id="dess"><?php echo $ddetail?></h4>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="booked_container">
                <div class="txttitle" id="fname">BOOKED LIST</div>
                
                <div class="flexa">
                    <h4>DATE</h4>
                    <h4>NAME</h4>
                    <h4>SCHEDULE</h4>
                    <h4>APPROVED</h4>
                </div>
                <?php
                $query = "SELECT * FROM student_lesson where studentID = '$id'";
                                $result = mysqli_query($db, $query);
                    
                                while($row = mysqli_fetch_assoc($result)){
                                    $name = $row['lesson'];
                                    $reg = $row['regDate'];
                                    $app = $row['approve'];
                                    $dates = $row['date']; ?>

                                    <div class="booked">
                                        <div class="flexa">
                                            <h4><?php echo $reg?></h4>
                                            <h4><?php echo $name?></h4>
                                            <h4><?php echo $dates?></h4>
                                            <h4><?php if($app==1){
                                                            echo "<i style='color:green' class='fas fa-check'></i>";
                                                        }
                                                        else if($app==3){
                                                            echo "waiting";
                                                        }
                                                        else{
                                                            echo "<i style='color:red' class='fas fa-times-circle'></i>";
                                                         }?>
                                            </h4>
                                        </div>
                                    </div>
                <?php } ?>

                 
                    
                </div>
            </div>
        </div>    
    </div> 
    <script src="home.js">
    </script>  
    </body>
</html>
}