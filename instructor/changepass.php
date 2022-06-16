<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../instructor/home.css">
    <link rel="icon" href="../img/VROOM!.png">
    <title>VROOM! | Profile </title>
</head>
<body>
    <?php 
        $id = $_GET['id'];
    ?>
    <div id="passModal" class="passmodal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div>
                        <h3 class="modal-header">CHANGE PASSWORD</h3>
                    </div><?php include('change.php');?>
                    
                    <div class="modal-body">
                        <form class="update-form" action="" method="post" enctype="multipart/form-data">
                        
                        
                            <div class="flexd">
                                <label for="fname">Enter Present Password: </label>
                                <input type="text" name="ppass" id="ppass" required>
                            </div>
                            <div class="flexd">
                                <label for="lname">Enter New Password: </label>
                                <input type="text" name="npass" id="npass" required>
                            </div>
                            <div class="flexd">
                                <label for="lname">Retype New Password: </label>
                                <input type="text" name="rnpass" id="rnpass" required>
                            </div>
                            <h4 style="text-align: center;margin-top:10px"><?php include('../includes/errors.php');?></h4>
                            <div>
                                <button class="form-btn update" type="submit" name="change">UPDATE</button>
                                <button class="form-btn cancel" type="button" onclick="location.href='profile.php'">CANCEL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>