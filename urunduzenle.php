
<?php include 'header.php' ; 
if(isset($_POST['urun_id'])){

$urunsor=$db->prepare("SELECT * FROM urunler WHERE urun_id=:id");
$urunsor->execute(array(
'id'=>$_POST['urun_id']
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

}


?>


<div class="container">
  <div class="card">
    <div class="card-header">
      <h3 class="display-4" style="font-size: 2rem">Ürün Ekle</h3>
    </div>
    <div class="card-body">
      <form action="islemler/islem.php" method="POST" >
        <div class="form-row">
          <div class="col-md-6">
            <label>Ürünün Adı</label>
              <input type="text" class="form-control" name="urun_ad" value="<?php echo $uruncek['urun_ad'] ?>">
          </div></div>
        <div class="form-row mt-2">
          <div class="form-group col-md-6">
            <label>Ürün Türü</label>
            <select name="urun_turu" class="form-control">
              <option <?php if($uruncek['urun_turu']=='Et&Et Ürünleri'){echo "selected";}  ?> value="Et&Et Ürünleri">Et&Et Ürünleri</option>
              <option <?php if($uruncek['urun_turu']=='Araç&Gereçler'){echo "selected";}  ?> value="Araç&Gereçler">Araç&Gereçler</option>
              <option <?php if($uruncek['urun_turu']=='İçecekler'){echo "selected";}  ?> value="İçecekler">İçecekler</option>
            </select>
          </div>
        </div>

 <div class="form-row mt-2">
          <div class="col-md-6">
            <label>Adedi</label>
            <input type="text" class="form-control" name="urun_adet" value="<?php echo $uruncek['urun_adet'] ?>"  >
          </div></div>


 <div class="form-row mt-2">
          <div class="col-md-6">
            <label>Ücret (birim fiyat)</label>
            <input type="text" class="form-control" name="urun_ucret" value="<?php echo $uruncek['urun_ucret'] ?>">
          </div></div>

        
          <button type="submit" name="urunduzenle" class="btn btn-primary mt-2">Kaydet</button>
           </form>
  </div>
</div>
</div>
 <?php include 'footer.php' ;    ?>