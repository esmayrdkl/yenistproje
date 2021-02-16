<?php include 'header.php'; ?>

<?php


if(isset($_POST["action"]))
{
 $query ="SELECT * FROM urunler";

 if(isset($_POST["cesit"]))
 {
  $cesit_filter = implode("','", $_POST["cesit"]);
  $query .= "
   WHERE urun_turu IN('".$cesit_filter."')
  ";
 }
 if(isset($_POST["miktar"]))
 { 
  $answer_miktar=$_POST["miktar"];
  if($answer_miktar="artan"){
$query .= " urun_adet ASC ";
  }
  else if($answer_miktar="artan"){
$query .= " urun_adet DESC ";
  }

 }
 if(isset($_POST["fiyat"]))
 {


 $answer_fiyat=$_POST["fiyat"];

 if(isset($_POST["miktar"])){
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

?>
<div class="card">
		<div class="card-header">
<h5 class="card-title">Ürünler</h5>
		</div>
		

<div class="card-body">

<table class="table table-bordered">
	
	<thead>
		<tr>
			<th>Sıra No</th>
			<th>Adı</th>
			<th>Tür</th>
			<th>Adet/Miktar</th>
			<th>Birim fiyat</th>
			<th>Güncelleyen</th>
			<th>Güncellenme tarihi</th>
			<th>İşlem</th>

		</tr>
	</thead>
	<tbody>




<?php
$sayi=0;
 $urunsor = $db->prepare($query);
 $urunsor->execute();
 while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
$sayi++;  ?>


<tr>
			<td><?php echo $sayi;  ?></td>
			<td><?php echo $uruncek['urun_ad'] ?> </td>
<td><?php echo $uruncek['urun_turu'] ?> </td>
<td><?php echo $uruncek['urun_adet'] ?> </td>
<td><?php echo $uruncek['urun_ucret'] ?> </td>

<td><?php echo $uruncek['guncelleyen_kisi'] ?> </td>
<td><?php echo $uruncek['gun_tarihi'] ?> </td>
<td>
	<div class="d-flex justify-content-center">
<form action="urunduzenle.php" method="POST" accept-charset="utf-8">
	<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
	<button type="submit" name="duzenleme" class="btn btn-sm btn-success btn-icon-split">
		<span class="icon text-white-60">
			<i class="fas fa-edit"></i>
		</span></button>
</form>
<form  class="mx-2" action="islemler/islem.php" method="POST" accept-charset="utf-8">
	<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
	<button type="submit" name="urunsilme" class="btn btn-sm btn-danger btn-icon-split">
		<span class="icon text-white-60">
			<i class="fas fa-trash"></i>
		</span></button>
</form>

<form action="urun.php" method="POST" accept-charset="utf-8">
	<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
	<button type="submit" name="urun_bak" class="btn btn-sm btn-primary btn-icon-split">
		<span class="icon text-white-60">
			<i class="fas fa-eye"></i>
		</span></button>
</form>


	</div>



</td>

		</tr>

<?php } ?>
		
	</tbody>
</table>

</div>

	</div>







?>


<?php include 'footer.php'; ?>



