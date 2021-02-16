 <?php 
include 'header.php' ;
if(isset($_POST['urun_ara'])){



$urunsor=$db->prepare("SELECT * FROM urunler WHERE urun_ad=:ad");
$urunsor->execute(array(
'ad'=>$_POST['aranan']));

$sonuc=$urunsor->rowcount();
if ($sonuc==0) {
	echo 'Aranan ürün bulunmamaktadır';
}
else{

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);


?> 

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary"><?php echo $uruncek['urun_ad'] ?></h5>
				</div>
				<div class="card-body">
					<form action="islemler/islem.php" method="POST">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Ürün Adı</label>
								<input disabled type="text" class="form-control" name="urun_ad" value="<?php echo $uruncek['urun_ad'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Ürün Türü</label>
								<input disabled type="text" class="form-control" name="urun_turu" value="<?php echo $uruncek['urun_turu']; ?>">
							</div>
						</div>

							<div class="form-row">
							<div class="form-group col-md-6">
								<label>Ürün Adeti/Miktarı</label>
								<input disabled type="text" class="form-control" name="urun_adet" value="<?php echo $uruncek['urun_adet'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Birim Fiyat</label>
								<input disabled type="text" class="form-control" name="urun_ucret" value="<?php echo $uruncek['urun_ucret'] ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Güncellenme Tarihi</label>
								<input disabled type="date" class="form-control" name="gun_tarihi" value="<?php echo $uruncek['gun_tarihi'] ?>">
							</div>
							<div class="form-group col-md-6">
								<label>Güncelleyen </label>
							<input disabled type="text" class="form-control" name="guncelleyen_kisi" value="<?php echo $uruncek['guncelleyen_kisi'] ?>">
							</div>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>



<?php




}



}
?>



<?php include 'footer.php' ?>


















 