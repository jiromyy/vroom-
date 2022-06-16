<?php 
header('Content-type: image/jpeg');
$font=realpath('Montserrat-SemiBold.ttf');
$image=imagecreatefromjpeg("format.jpg");
$color=imagecolorallocate($image, 51, 51, 102);
$date=date('d F, Y');
imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
$name=$_GET['name'];
$id = $_GET['id'];
imagettftext($image, 48, 0, 120, 520, $color,$font, $name);
$lesson=$_GET['lesson'];
imagettftext($image, 48, 0, 120, 650, $color,$font, $lesson);
$lesson="DRIVING COURSE";
imagettftext($image, 48, 0, 120, 725, $color,$font, $lesson);
imagejpeg($image,"../certificates/$id.jpg");
//imagejpeg($image);
imagedestroy($image);
header('location: progress.php');
?>
