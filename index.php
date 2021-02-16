<?php include 'header.php'; ?>

<div class="container-fluid">

<div class="row mt-3">

<div class="col"> <!-----son eklenenler ----->


            <div class="card">
		<div class="card-header">
<h5 class="card-title">Son Eklenen Ürünler</h5>
		</div>
		

<div class="card-body">

<table class="table table-bordered">
	
	<thead>
		<tr>
			
			<th>Adı</th>
			<th>Tür</th>
			<th>Adet/Miktar</th>
			<th>Birim fiyat</th>
			<th>Güncelleyen</th>
			<th>Güncellenme tarihi</th>
		

		</tr>
	</thead>
	<tbody>


<?php
$urunsor=$db->prepare("SELECT * FROM urunler ORDER BY urun_id DESC LIMIT 0,3");
$urunsor->execute();



while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
 ?>


<tr>
			
			<td><?php echo $uruncek['urun_ad'] ?> </td>
<td><?php echo $uruncek['urun_turu'] ?> </td>
<td><?php echo $uruncek['urun_adet'] ?> </td>
<td><?php echo $uruncek['urun_ucret'] ?> </td>

<td><?php echo $uruncek['guncelleyen_kisi'] ?> </td>
<td><?php echo $uruncek['gun_tarihi'] ?> </td>


		</tr>

<?php } ?>
		
	</tbody>
</table>



</div>

	</div>


</div>
<div class="col">
 
<div class="card">
    <div class="card-header">
      <h3 class="display-4" style="font-size: 2rem">Ürün Ekle</h3>
    </div>
    <div class="card-body">
      <form action="islemler/islem.php" method="POST" >
        <div class="form-row">
         
            <label>Ürünün Adı</label>
            <input type="text" class="form-control" name="urun_ad" placeholder="Ürün adı">
          </div>
        <div class="form-row mt-2">
          <div class="form-group ">
            <label>Ürün Türü</label>
            <select name="urun_turu" class="form-control">
              <option>Et&Et Ürünleri</option>
              <option>Araç&Gereçler</option>
              <option>İçecekler</option>
            </select>
          </div>
        </div>

 <div class="form-row mt-2">
         
            <label>Adedi</label>
            <input type="text" class="form-control" name="urun_adet" placeholder="Ürünün miktarı">
         </div>


 <div class="form-row mt-2">
         
            <label>Ücret (birim fiyat)</label>
            <input type="text" class="form-control" name="urun_ucret" placeholder="Birim fiyatı">
          </div>

        
          <button type="submit" name="urunekle" class="btn btn-primary mt-2">Kaydet</button>
           </form>
  </div>
</div>
	
</div>
  


</div>

<div class="row">

<div class="col-md-6"> <!-----az kalanlar ----->

 <div class="card">
		<div class="card-header">
<h5 class="card-title">Tükenmekte Olan Ürünler</h5>
		</div>
		

<div class="card-body">

<table class="table table-bordered">
	
	<thead>
		<tr>
			
			<th>Adı</th>
			<th>Tür</th>
			<th>Adet/Miktar</th>
			<th>Birim fiyat</th>
		<th>İşlem</th>

		

		</tr>
	</thead>
	<tbody>


<?php
$urunsor=$db->prepare("SELECT * FROM urunler WHERE urun_adet<=10 ORDER BY urun_adet ASC LIMIT 0,3");
$urunsor->execute();



while ($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) {
 ?>


<tr>
			
			<td><?php echo $uruncek['urun_ad'] ?> </td>
<td><?php echo $uruncek['urun_turu'] ?> </td>
<td><?php echo $uruncek['urun_adet'] ?> </td>
<td><?php echo $uruncek['urun_ucret'] ?> </td>
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




</div>


</div>
</div>


<?php include 'footer.php'; ?>



