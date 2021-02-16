<?php include 'header.php'; ?>


<div class="container-fluid">

<div class="row">

 <div class="col-md-3">   <!--------Filtreleme Alanı Başlangıç---->
 	<form action="filtrelenmis.php" method="POST">
<div class="list-group mt-4 list-group-item">
     <h5>Miktara göre</h5>
<br><input type="radio" class="miktar" name="miktara_gore" value="artan">Artan
<input type="radio" class="miktar" name="miktara_gore" value="azalan">Azalan
 </div>

<div class="list-group mt-4 list-group-item">
     <h5>Fiyata göre</h5>
    
<br><input type="radio"  name="fiyata_gore" value="artan">Artan
<input type="radio" name="fiyata_gore" value="azalan">Azalan

 </div>


 <div class="list-group mt-4 ">
     <h5>Çesidine göre</h5>
 <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
     <?php

                    $query = "SELECT DISTINCT(urun_turu) FROM urunler ORDER BY urun_id DESC";
                    $statement = $db->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox"  name="cesitler[]" value="<?php echo $row['urun_turu']; ?>"  > <?php echo $row['urun_turu']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
 </div>



<div class="list-group mt-4 list-group-item">
    
<button class="btn btn-outline-success" name="filtrele" type="submit">Filtrele</button>

 </div>
</form>
 </div> <!--------Filtreleme Alanı Son---->


<div class="col-md-9"> <!--------Tablo Alanı Başlangıç---->
 <br />
            <div class="card">
		<div class="card-header">
<h5 class="card-title">Ürünler</h5>
		</div>
		

<div class="card-body">

<table  id="urunler_tablosu" class="table table-bordered">
	
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
$urunsor=$db->prepare("SELECT * FROM urunler");
$urunsor->execute();
$sayi=0;


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

 </div>  <!--------Tablo Alanı Son---->




</div>


</div>


<?php include 'footer.php'; ?>


<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>


<script>
	

	$(document).ready(function() {
    $('#urunler_tablosu').DataTable();
} );
</script>