<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homecss.css">
    <title>MMSU DMS | Home</title>
</head>
<body>
    <div class="sidebar">
        <header><i class="icon"></i> MMSU Driving School</header>
        <ul class="target"> 
            <li><a href="index.html" target="board" onfocus="foc()" id="a1"><i class="fas fa-user-alt"></i>Profile</a></li>
            <li><a href="index.html" target="board"><i class="fas fa-qrcode"></i>Transactions</a></li>
            <li><a href="index.html" target="board"><i class="fas fa-certificate"></i>Certificates</a></li>
            <li><a href="index.html" target="board"><i class="fas fa-users"></i>Students</a></li>
            <li><a href="index.html" target="board"><i class="fas fa-chalkboard-teacher"></i>Instructors</a></li>
            <li><a href="index.html" target="board"><i class="fas fa-file-invoice-dollar"></i>Payment</a></li>
        </ul>
        <form action="index.php">
            <input type="submit" value="Logout" class="out">
        </form>
    </div>
<section>   
    <iframe src="index.php" frameborder="0" name="board"></iframe>
</section>

</body>
</html>
