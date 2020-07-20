<form method="POST" action=index.php?id=15.php>
                <div class="box-header">
              <h3 class="box-title"></h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>

               <?php
                 $sqlSelect ="select  tbl_barangmasuk.kd_masuk, tbl_barangmasuk.kd_barang, tbl_barang.nama_barang, tbl_barangmasuk.brand, spesifikasi, tbl_supplier.nama_supplier, tbl_kategori.nama_kategori,  stok, harga, tgl
                    from tbl_barangmasuk inner join tbl_kategori on tbl_kategori.kd_kategori = tbl_barangmasuk.kd_kategori
                    inner join tbl_supplier on tbl_supplier.kd_supplier = tbl_barangmasuk.kd_supplier
                    inner join tbl_barang on tbl_barang.kd_barang = tbl_barangmasuk.kd_barang";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                      
              ?>
            <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap">
                <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Brand</th>
                  <th>Spesifikasi</th>
                  <th>Supplier</th>
                  <th>Category</th>
                  <th>Qty</th>
                  <th>Harga</th>
                  <th>Total Harga</th>
                  <th>Date</th>
                  <th>Action</th>   

                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                <tr>
                    <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['nama_barang'];?></td>
                    <td><?php echo $row['brand'];?></td>
                    <td><?php echo $row['spesifikasi'];?></td>
                    <td><?php echo $row['nama_supplier'];?></td>
                    <td><?php echo $row['nama_kategori'];?></td>
                    <td><?php echo $row['stok'];?></td>
                    <td><?php echo "Rp. ".number_format($row['harga'])."";?></td>
               <!--      var_dump($total); -->
                   

                    <td> <?php 
                    $a=$row['stok'];
                    $b=$row['harga'];
                    $c=$a*$b;
                    echo "Rp. ".number_format($c)."";

                    ?> </td>
                    <td><?php echo $row['tgl'];?></td>
                    <td><a href="index.php?id=14?&kd_masuk=<?php echo $row['kd_masuk']; ?>">Update</a> | <a href="delete_barangmasuk.php?kd_masuk=<?php echo $row['kd_masuk']; ?>">Delete</a></td>
                </tr>
                <?php 
                  }
                } 
                  ?>          
         </table>
          </div>
        </div>
     

</form>