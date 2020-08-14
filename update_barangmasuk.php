<?php 
      include 'koneksi.php';
      $kd_masuk=$_POST['kd_masuk'];
      $kd_barang=$_POST['kd_barang'];
      $brand=$_POST['brand'];
      $spesifikasi=$_POST['spesifikasi'];
      $kd_supplier=$_POST['kd_supplier'];
      $kd_kategori=$_POST['kd_kategori'];
      $stok=$_POST['stok'];
      $harga=$_POST['harga'];
      $tgl=$_POST['tgl'];

      if(isset($_POST["simpan"])){
      $a="update tbl_barangmasuk set  kd_barang='$kd_barang', brand='$brand', spesifikasi='$spesifikasi', kd_supplier='$kd_supplier', kd_kategori='$kd_kategori', stok='$stok', harga='$harga' , tgl='$tgl' where kd_masuk='$kd_masuk'";
      var_dump($a);
      $query=mysqli_query($kon,$a);
        if($query) {
          echo ("<script LANGUAGE='JavaScript'>
           window.alert('Succesfully Updated');
            window.location.href='index.php?id=3.php';
            </script>");
        }else{
          echo "data gagal tersimpan";

        }
        }
      
 ?>



<?php 
include("koneksi.php");

     $id = $_GET['kd_masuk'];
  // var_dump($id);
  $data = mysqli_query($kon,"select * from tbl_barangmasuk where kd_masuk='$id'");
  while($d = mysqli_fetch_array($data)){

?>

  <div class="box box-primary">
     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="index.php?id=14.php">
              



                  <div class="card-body">
                  <div class="form-group row">
                   <!--  <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Pegawai</label> -->
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="kd_masuk" value="<?php echo $d['kd_masuk']; ?>">
                    </div>
                  </div>
                  
                     <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Nama Barang </label>
                    <div class="col-sm-10">
                   <select class="form-control" name="kd_barang"> 
                    <option value='<?php echo $d['kd_barang']; ?>'></option>
                    <?php include('koneksi.php'); 
                   $a="select * from tbl_barang";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->kd_barang;?>"> <?php echo $data->nama_barang; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Brand</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="brand" value="<?php echo $d['brand']; ?>">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Spesifikasi</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="spesifikasi" value="<?php echo $d['spesifikasi']; ?>">
                    </div>
                  </div>
                  
                     <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Supplier </label>
                    <div class="col-sm-10">
                   <select class="form-control" name="kd_supplier">
                    <option value='<?php echo $d['kd_supplier']; ?>'></option>
                    <?php include('koneksi.php'); 
                   $a="select * from tbl_supplier";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->kd_supplier;?>"> <?php echo $data->nama_supplier; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Category </label>
                    <div class="col-sm-10">
                   <select class="form-control" name="kd_kategori">
                    <option value='<?php echo $d['kd_kategori']; ?>'></option>
                  <?php include('koneksi.php'); 
                   $a="select * from tbl_kategori";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->kd_kategori;?>"> <?php echo $data->nama_kategori; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Qty</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" value="<?php echo $d['stok']; ?>">
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="harga" value="<?php echo $d['harga']; ?>">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Date</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tgl" value="<?php echo $d['tgl']; ?>">
                    </div>
                  </div>

                
                </div>
                <!-- /.card-body -->
                 <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-info pull-right">Update</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
                <!-- /.card-footer -->

                <?php

              }
                ?>
            

              </form>
            </div>
            </div>