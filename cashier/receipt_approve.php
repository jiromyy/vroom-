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

    <?php
    $id = $_GET['id'];
    include('../includes/connection.php');
    include('run.php');

    
    $query = "SELECT payment FROM student_lesson WHERE bookID = '$id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $payment = $row['payment'];

    echo "<img style='max-width: 100%; max-height: 100vh; height: auto;' src='../payments/$payment' alt='img'>";

    ?>

    <button id="approve">APPROVE</button>
    <button><a href="reject.php?id=<?php echo $id?>">REJECT</a></button>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <form action="" method="post">  
                <div class="modal-header">ASSIGN INSTRUCTOR</div>
                <div class="assign">
                    <label for="instructor">Select Instructor:</label>
                    <select name="instructor" id="">
                    <?php 
                        $query = "SELECT * FROM instructor";
                        $result = mysqli_query($db, $query);
                        
                        
                        while($row = mysqli_fetch_assoc($result)){  
                            $name =  $row['FName']. ' ' .$row['LName'];?>
                            
                            <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                            </select>
                    <?php     }
                    ?>
                </div>
                <div>
                     <button class="form-btn update" type="submit" name="approve">APPROVE</button>
                </div>
            </form>
        </div>
    </div>
    <script src="home.js"></script>
</body>

</html>