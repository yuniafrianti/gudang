<?php 

include("koneksi.php");

if(isset($_POST["simpan"])){
    $sql="insert into tbl_pegawai values('".$_POST['kd_pegawai']."','".$_POST['nip']."','".$_POST['nama_pegawai']."')";
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
              <form class="form-horizontal" method="POST" action="index.php?id=2.php">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">No IC</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nip" placeholder="No IC">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Nama Pekerja</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_pegawai" placeholder="Nama Pekerja">
                    </div>
                  </div>
                  
                </div>
                <!-- /.card-body -->
                 <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-info pull-right">Save</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                  <br>
                </div>
                <!-- /.card-footer -->


               <?php
                 $sqlSelect = "SELECT * FROM tbl_pegawai";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>
               <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <tr>
                  <th>No</th>
                  <th>No IC</th>
                  <th>Nama Pekerja</th>
                  <th>Action</th>
               
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    

                <tr>
                    <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['nip'];?></td>
                    <td><?php echo $row['nama_pegawai'];?></td>
                    <td><a href="index.php?id=8?&kd_pegawai=<?php echo $row['kd_pegawai']; ?>">Update</a> | <a href="delete_pegawai.php?kd_pegawai=<?php echo $row['kd_pegawai']; ?>">Delete</a>
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