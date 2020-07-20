<?php 
include("koneksi.php");

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
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kd_barang" placeholder="Kode Barang">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label"> Jumlah Barang Masuk</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="stok" placeholder="Jumlah Barang Masuk">
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
                 $sqlSelect = "SELECT * FROM tbl_barangmasuk";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>
                <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang Masuk</th>
                  <th>Action</th>
               
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    

                <tr>
                    <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['kd_barang'];?></td>
                    <td><?php echo $row['stok'];?></td>
                    <td></td>
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