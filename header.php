
<?php  include 'islemler/baglan.php';

ob_start();
session_start();


if(empty($_SESSION['kul_mail'])){
header('location:giris.php');
exit;
}
else{


$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kul_mail=:mail");
$kullanicisor->execute(array(
'mail'=>$_SESSION['kul_mail']));

$sonuc=$kullanicisor->rowcount();
if ($sonuc==0) {
 header('location:giris.php');

}




}
 ?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head> 

<nav class="navbar navbar-expand-lg navbar-light  bg-gradient-primary ">
  <div class="container-fluid">
    <a class="navbar-brand dropdown" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >Navbar</a>
  <div class="dropdown-menu text-lg-center" aria-labelledby="navbarDropdownMenuLink">
       <a href="islemler/logout.php">Çıkış</a>
        </div>
    
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="urunler.php">Ürünler</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="#" >Hakkımızda</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#" >İletişim</a>
        </li>
      </ul>
    <form  action="urunara.php" method="POST" class="d-flex">
      <input class="form-control me-2" name="aranan"  type="search" placeholder="Ürün Ara" aria-label="Search">
      <button class="btn btn-outline-dark ml-1" name="urun_ara" type="submit">Ara</button>
    </form>
   
  </div>
</nav>
<body>