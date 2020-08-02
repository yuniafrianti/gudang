 <?php 
 include('koneksi.php');
 ?>   
              <h3 align="center">Report Barang Keluar</h3>
              <?php
                 $sqlSelect = "select tbl_barangkeluar.kd_brgkeluar, tbl_barangmasuk.kd_masuk, tbl_barang.nama_barang, issued, received, tbl_barangkeluar.stok, tbl_barangkeluar.tgl from tbl_barangkeluar inner join tbl_barangmasuk on tbl_barangmasuk.kd_masuk = tbl_barangkeluar.kd_masuk inner join tbl_barang on tbl_barang.kd_barang = tbl_barangmasuk.kd_barang";
                  $result = mysqli_query($kon, $sqlSelect);
            
                    if (mysqli_num_rows($result) > 0) {
                   ?>
       
          <div class="box-footer">
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table table-head-fixed text-nowrap" border="1px" style:"widht:100%">
                <tr>
                  <th width="1%">No</th>
                  <th>Issued By</th>
                  <th>Received By</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                  <th width="15%">Tanggal</th>
             
               
                </tr>
  
                  <?php
                    $no=1;
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                    

                <tr>
                    <td><?php  echo $no++; ?></td>
                    <td><?php echo $row['issued'];?></td>
                    <td><?php echo $row['received'];?></td>
                    <td><?php echo $row['nama_barang'];?></td>
                    <td><?php echo $row['stok'];?></td>
                    <td><?php echo $row['tgl'];?></td>
          
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
