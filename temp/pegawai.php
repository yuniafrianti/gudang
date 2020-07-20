<?php 
include("koneksi.php");

if(isset($_POST["simpan"])){
    $sql="insert into tbl_pegawai values('".$_POST['kd_pegawai']."','".$_POST['nip']."','".$_POST['nama_pegawai']."')";
    $query=mysqli_connect($kon,$sql);
    if($query){
      echo "data berhasil disimpan";
    }else{
      echo "data gagal tersimpan";
    }
  }
?>

  <div class="box box-primary">
     <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="POST" action="index.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Kode Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nip" placeholder="Nip">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama Pegawai">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                    
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                 <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-info">Save</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
                <!-- /.card-footer -->


               <?php
                 $sqlSelect = "SELECT * FROM tbl_pegawai";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>
                <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Nip</th>
                  <th>Nama Pegawai</th>
               
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    

                <tr>
                    <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['kd_nip'];?></td>
                    <td><?php echo $row['nama_pegawai'];?></td>
                </tr>
                <?php
                  }
                } 
                  ?>
              
          
			   </table>
			    </div>


              </form>
            </div>
            </div>