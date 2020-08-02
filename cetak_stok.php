<?php 
include('koneksi.php'); 
?>
               <!-- /.card-header -->
              <!-- form start -->
               
           
               <?php
                 $sqlSelect = "select kd_barang, sum(tbl_barangmasuk.stok) as stok
                  from tbl_barangmasuk group by kd_barang;";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>
            <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap" border="1px" style="width:100%">
                <tr>
                  <th width="1%">No</th>
                  <th>Nama Barang</th>
                  <th width="5%">Stock</th>
              

               
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <td><?php  echo $no++; ?></td>

                    
                    <td>
                        <?php 
                      include('koneksi.php');
                      $a="select * from tbl_barang where kd_barang='".$row['kd_barang']."'";
                      $query=mysqli_query($kon,$a);
                      $data=mysqli_fetch_object($query);
                      echo $data->nama_barang;

                     ?>

                    </td>
                    <td><?php echo $row['stok'];?></td>
                    
    
                </tr>
                <?php
                  }
                } 
                  ?>
            
            <script>
                window.print();
              </script>
 
                
         </table>
       </div>
     </div>
      </form>

     
  
