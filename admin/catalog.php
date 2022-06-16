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
                    <li><a href="instructors.php"><i class="fas fa-chalkboard-teacher"></i>Instructors</a></li>
                    <li  class="active"><a href="catalog.php"><i class="fas fa-file-invoice-dollar"></i>Catalog</a></li>
                </ul>
            </nav>
        </aside>
    
        <div class="main-content">
            <div class="titlehead">
                <h3>LESSONS</h3>
            </div>
            <div class="list-container">
                <form class="addform" action="addLesson.php" method="post">
                    <div>
                        <label for="lessonName">Lesson Name: </label>
                        <input type="text" name="lessonName" id="lessonName" value="" required>
                        <label for="price">Price: </label>
                        <input type="number" name="price" id="price" value="" required>
                        <label for="hours">Hours: </label>
                        <input type="number" name="hour" id="hour" value="" required>
                        <label for="details">Details: </label>
                        <input type="text" name="details" id="details" value="" required>

                        <button class="addBtn" type="submit">ADD</button>

                    </div>
                </form>

                <div class="table">
                    <div class="table-header">
                        <div class="header__item">Name</div>
                        <div class="header__item">Price</div>
                        <div class="header__item">Hours</div>
                        <div class="header__item">Details</div>
                        <div class="header__item">Action</div>
                </div>

                <?php
                    $query = "SELECT * FROM lessons";
                    $result = mysqli_query($db, $query);

                    if(mysqli_num_rows($result)==0){ ?>
                        <h2>-- No Records --</h2>
                <?php   }

                while($row = mysqli_fetch_assoc($result)){
                $name = $row['lessonName'];
                $details = $row['lessonDetails'];
                $price = $row['price'];
                $hour = $row['hour'];
        ?>    
                    <div class="table-content">	
                        <div class="table-row">		
                            <div class="table-data"><?php echo $name?></div>
                            <div class="table-data"><?php echo $price?></div>
                            <div class="table-data"><?php echo $hour?></div>
                            <div class="table-data"><?php echo $details?></div>
                            <div class="table-data">
                                <button><a href="delete_lesson.php?name=<?php echo $name ?>">DELETE</a></button>
                            </div>
                        </div>
                    </div>
            <?php
                }
            ?>    	
            </div>
        </div>
    </div>
</body>
</html>
