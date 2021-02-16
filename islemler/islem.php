<?php 

include 'baglan.php';



ob_start();
session_start();




if(isset($_POST['oturumac'])){

$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kul_mail=:mail AND kul_sifre=:sifre");
$kullanicisor->execute(array(
'mail'=>$_POST['kul_mail'],
'sifre'=>$_POST['kul_sifre']));

$sonuc=$kullanicisor->rowcount();
if ($sonuc==0) {
	echo 'mail ya da şifre yanlış';
}
else{
	header('location:../index.php');
$_SESSION['kul_mail']=$_POST['kul_mail'];
$sonuccek=$kullanicisor->fetch(PDO::FETCH_ASSOC);


$oturumdakisor=$db->prepare("INSERT INTO oturum SET kul_isim=:kul_isim");
$oturumdakisor->execute(array(
'kul_isim'=>$sonuccek['kul_isim']
));






}

}




if(isset($_POST['urunekle'])){


	$oturumdakisor=$db->prepare("SELECT * FROM oturum");
$oturumdakisor->execute();


$oturumdakicek=$oturumdakisor->fetch(PDO::FETCH_ASSOC);

$guncelleyen=$oturumdakicek['kul_isim'];


$tarih=date("Y.m.d"); 


$urunsor=$db->prepare("SELECT * FROM urunler WHERE urun_ad=:ad");
$urunsor->execute(array(
'ad'=>$_POST['urun_ad']));

$sonuc=$urunsor->rowcount();
if ($sonuc==0) {
$str="INSERT INTO urunler SET
urun_ad=:urun_ad,
urun_turu=:urun_turu,
urun_adet=:urun_adet,
urun_ucret=:urun_ucret,
guncelleyen_kisi=:guncelleyen_kisi,
gun_tarihi=:guncellenme_tarih";

$urunekle=$db->prepare($str);
$urunekle->execute(array(

'urun_ad'=>$_POST['urun_ad'],
'urun_turu'=>$_POST['urun_turu'],
'urun_adet'=>$_POST['urun_adet'],
'urun_ucret'=>$_POST['urun_ucret'],
'guncelleyen_kisi'=>$guncelleyen,
'guncellenme_tarih'=>$tarih
));

}
else{
	$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
$eklenen=$_POST['urun_adet'];
$onceki=$uruncek['urun_adet'];
$toplam=$eklenen+$onceki;
$str="UPDATE urunler SET
urun_ad=:urun_ad,
urun-turu=:urun_turu,
urun_adet=:urun_adet,
urun_ucret=:urun_ucret,
guncelleyen_kisi=:guncelleyenn_kisi,
gun_tarihi=:guncellenme_tarih
 WHERE urun_id=:urun_id ";

 $urunekle=$db->prepare($str);
$urunekle->execute(array(

'urun_ad'=>$_POST['urun_ad'],
'urun_turu'=>$_POST['urun_turu'],
'urun_adet'=>$toplam,
'urun_ucret'=>$_POST['urun_ucret'],
'guncelleyen_kisi'=>$guncelleyen,
'guncellenme_tarih'=>$tarih,
'urun_id'=>$uruncek['urun_id']
));
}




if($urunekle){
//header("location:../urunler.php");
echo "başarılı";


}
else{
	echo "başarısız";
	exit;
}

}


if(isset($_POST['urunduzenle'])){


	$oturumdakisor=$db->prepare("SELECT * FROM oturum");
$oturumdakisor->execute();


$oturumdakicek=$oturumdakisor->fetch(PDO::FETCH_ASSOC);

$guncelleyen=$oturumdakicek['kul_isim'];


	$tarih=date("Y.m.d");

$urunduzenle=$db->prepare("UPDATE urunler SET
urun_ad=:ad,
urun-turu=:turu,
urun_adet=:adet,
urun_ucret=:ucret,
guncelleyen_kisi=:guncelleyen_kisi,
gun_tarihi=:guncellenme_tarih
 WHERE urun_id=:urun_id ");
$urunduzenle->execute(array(

'ad'=>$_POST['urun_ad'],
'turu'=>$_POST['urun_turu'],
'adet'=>$_POST['urun_adet'],
'ucret'=>$_POST['urun_ucret'],
'guncelleyen_kisi'=>$guncelleyen,
'guncellenme_tarih'=>$tarih,
'urun_id'=>$_POST['urun_id']
));


if($urunduzenle){
header("location:../urunler.php");
}
else{
	echo "başarısız";
	exit;
}

}
if(isset($_POST['urunsilme'])){
$sil=$db->prepare("DELETE FROM urunler WHERE urun_id=:urun_id");
$kontrol=$sil->execute(array('urun_id'=>$_POST['urun_id']));


if($kontrol){
header("location:../urunler.php");



}
else{
	echo "başarısız";
	exit;
}


}




?>