<?php include 'header.php' ; ?>
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
            <input type="text" class="form-control" name="urun_ad" placeholder="Ürün adı">
          </div></div>
        <div class="form-row mt-2">
          <div class="form-group col-md-6">
            <label>Ürün Türü</label>
            <select name="urun_turu" class="form-control">
              <option>Et&Et Ürünleri</option>
              <option>Araç&Gereçler</option>
              <option>İçecekler</option>
            </select>
          </div>
        </div>

 <div class="form-row mt-2">
          <div class="col-md-6">
            <label>Adedi</label>
            <input type="text" class="form-control" name="urun_adet" placeholder="Ürünün miktarı">
          </div></div>


 <div class="form-row mt-2">
          <div class="col-md-6">
            <label>Ücret (birim fiyat)</label>
            <input type="text" class="form-control" name="urun_ucret" placeholder="Birim fiyatı">
          </div></div>

        
          <button type="submit" name="urunekle" class="btn btn-primary mt-2">Kaydet</button>
           </form>
  </div>
</div>
</div>

 <?php include 'footer.php' ;    ?>