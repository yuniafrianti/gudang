<?php 
include("koneksi.php");

if(isset($_POST["simpan"])){
    $sql="insert into tbl_barang values('".$_POST['kd_barang']."','".$_POST['nama_barang']."')";
    $query=mysqli_query($kon,$sql);
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
              <form class="form-horizontal" method="POST" action="index.php?id=1.php">
                <div class="card-body">
             
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
                    </div>
                  </div>
                
                 
                </div>

                <!-- /.card-body -->
                 <div class="box-footer" align="float-right">
                  <button type="submit" name="simpan" class="btn btn-info pull-right" onclick="alert('Data Berhasil Disimpan')">Save</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
           
                <!-- /.card-footer -->

        

               <?php
                 $sqlSelect = "SELECT * FROM tbl_barang";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>

             <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
          
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Action</th>
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
             
                <tr>
                    <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['nama_barang'];?></td>
                    <td><a href="index.php?id=7?&kd_barang=<?php echo $row['kd_barang']; ?>">Update</a> | <a href="delete_barang.php?kd_barang=<?php echo $row['kd_barang']; ?>">Delete</a>
                </tr>
                </tr>
                <?php
                  }
                } 
                  ?>
            </td>
          </tr>
  
              </table>
              </form>
            </div>
            </div>