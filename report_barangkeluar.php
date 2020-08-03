    <?php 
    include('koneksi.php');
    ?>
        <html>
        <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
        <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }

        td, th {
              border: 1px solid #dddddd;
              text-align: left;
              padding: 8px;
            }

            tr:nth-child(even) {
              background-color: #FFFFFF;
            }
        </style>
        </head>
        <body>

        <h2></h2>
        <a href="cetak_barangkeluar.php"  target="_blank" class="btn btn-default pull-right">Print Pdf</a>
        <input id="myInput" type="text" placeholder="Search..">
        <br><br>

           <?php
              $sqlSelect = "select tbl_barangkeluar.kd_brgkeluar, tbl_barangmasuk.kd_masuk, tbl_barang.nama_barang, issued, received, tbl_barangkeluar.stok, tbl_barangkeluar.tgl from tbl_barangkeluar inner join tbl_barangmasuk on tbl_barangmasuk.kd_masuk = tbl_barangkeluar.kd_masuk inner join tbl_barang on tbl_barang.kd_barang = tbl_barangmasuk.kd_barang";
                  $result = mysqli_query($kon, $sqlSelect);
            
                if (mysqli_num_rows($result) > 0) {
             ?>
        <table>
          <thead>
          <tr>
                  <th>No</th>
                  <th>Issued By</th>
                  <th>Received By</th>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                  <th>Tanggal</th>
          </tr>
          </thead>
          <tbody id="myTable">

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
          </tbody>
        </table>
          
     

        </body>
        </html>
