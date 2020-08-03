<?php 
      include 'koneksi.php';
      $kd_brgkeluar=$_POST['kd_brgkeluar'];
      $issued=$_POST['issued'];
      $received=$_POST['received'];
      $kd_masuk=$_POST['kd_masuk'];
      $stok=$_POST['stok'];
      $tgl=$_POST['tgl'];

      if(isset($_POST["simpan"])){
      $a="update tbl_barangkeluar set  issued='$issued', received='$received', kd_masuk='$kd_masuk', stok='$stok', tgl='$tgl' where kd_brgkeluar='$kd_brgkeluar'";
      var_dump($a);
      $query=mysqli_query($kon,$a);
        if($query) {
          echo ("<script LANGUAGE='JavaScript'>
           window.alert('Succesfully Updated');
            window.location.href='index.php?id=4.php';
            </script>");
        }else{
          echo "data gagal tersimpan";

        }
        }
 ?>



<?php 
include("koneksi.php");

  $id = $_GET['kd_brgkeluar'];
  // var_dump($id);
  $data = mysqli_query($kon,"select * from tbl_barangkeluar where kd_brgkeluar='$id'");
  while($d = mysqli_fetch_array($data)){  

?>

  <div class="box box-primary">
     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form class="form-horizontal" method="POST" action="index.php?id=5.php">
                <div class="card-body"> 


                  <div class="form-group row">
                   <!--  <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Pegawai</label> -->
                    <div class="col-sm-10">
                      <input type="hidden" class="form-control" name="kd_brgkeluar" value="<?php echo $d['kd_brgkeluar']; ?>">
                    </div>
                  </div>
                  
                   
                     <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Isuued By</label>
                    <div class="col-sm-10">
                   <select class="form-control" name="issued"> 
                    <option value='<?php echo $d['issued']; ?>'><?php echo $d['issued']; ?></option>
                   <?php include('koneksi.php'); 
                   $a="select * from tbl_pegawai";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->nama_pegawai;?>"> <?php echo $data->nama_pegawai; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Received By</label>
                    <div class="col-sm-10">
                   <select class="form-control" name="received"> 
                    <option value='<?php echo $d['received']; ?>'><?php echo $d['received']; ?></option>
                    <?php include('koneksi.php'); 
                   $a="select * from tbl_pegawai";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->nama_pegawai;?>"> <?php echo $data->nama_pegawai; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>


                     <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Nama Barang </label>
                    <div class="col-sm-10">
                   <select class="form-control" name="kd_masuk"> 
                     <option value='<?php echo $d['kd_masuk']; ?>'> </option>
                    <?php include('koneksi.php'); 
                   $a="select tbl_barangmasuk.kd_barang, tbl_barangmasuk.kd_masuk , tbl_barang.nama_barang, tbl_barangmasuk.stok as stokk from tbl_barangmasuk inner join tbl_barang on tbl_barang.kd_barang = tbl_barangmasuk.kd_barang group by kd_barang";
                   $b=mysqli_query($kon,$a);
                   while ($data=mysqli_fetch_object($b)) {
                    ?>

                      <option value="<?php echo $data->kd_masuk;?>"> <?php echo $data->nama_barang; ?> </option>
                   <?php
                   }
                  ?>
                     
                   </select>
                    </div>
                  </div>
                  
                   <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Qty</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" value="<?php echo $d['stok']; ?>">
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

              