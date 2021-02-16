<?php
include 'islemler/baglan.php'; 
$query ="SELECT * FROM urunler";

 if(isset($_POST["cesitler"]))
 {
  $cesitler_filter = implode("','", $_POST["cesitler"]);
  $query .= "
   WHERE urun_turu IN('".$cesitler_filter."')
  ";
 }
 if(isset($_POST["miktara_gore"]))
 { 
  $answer_miktar=$_POST["miktara_gore"];
  if($answer_miktar="artan"){
$query .= " ORDER BY urun_adet ASC ";
  }
  else if($answer_miktar="artan"){
$query .= " ORDER BY urun_adet DESC ";
  }

 }
 if(isset($_POST["fiyata_gore"]))
 {


 $answer_fiyat=$_POST["fiyata_gore"];

 if(isset($_POST["miktara_gore"])){
  if($answer_fiyat="artan"){
$query .= ",urun_ucret ASC ";
  }
  else if($answer_miktar="artan"){
$query .= ", urun_ucret DESC ";
  }
  
  }
else{
	 if($answer_fiyat="artan"){
$query .= "ORDER BY urun_ucret ASC ";
  }
  else if($answer_miktar="artan"){
$query .= " ORDER BY urun_ucret DESC ";
  }
}
}
$urunsor=$db->prepare($query);
$urunsor->execute();
$sayi=0;
while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
$sayi++; 

echo $uruncek["urun_ad"];
}

?>