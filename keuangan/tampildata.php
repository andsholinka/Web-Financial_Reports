<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th width="6%">No</th>
      <th>Bendahara</th>
      <th>Tanggal Masuk</th>
      <th>Jumlah Masuk</th>
      <th>Keterangan</th>
      <th><center>Aksi</th></center>
    </tr>
  </thead>

  <?php
  session_start();
  include 'koneksi.php';
  $result = mysqli_query($koneksi, "SELECT * from tb_pemasukan order by tgl_aktivitas desc");
  $no = 1;
  while ($row = mysqli_fetch_array($result))
    { ?>
     <tr>
      <td> <?php echo $no++; ?></td>
      <td><?= $row["id_user"]?></td>
      <td><?php $tt = $row['tgl_masuk']; echo date("d F Y", strtotime($tt))?></td>                     
      <td><?= $row['jml_masuk']?></td>
      <td><?= $row['keterangan']?></td>
      <td><center>

        <button type="button" class="btn btn-primary btn-xs" id="btnedit" data_id=<?php echo $row['id_pemasukan']?>> <i class="fa fa-edit" title="Edit Data"></i></button>



                <a href="simpan_arsip_pemasukan.php?id=<?php echo $row["id_pemasukan"] ?>" onclick=" return confirm('Apakah anda yakin ingin menghapus data ini?');" class="btn btn-danger"><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="Hapus Data"></i></a>   
        
      </td></center>
    </tr> 

    <?php  } ?>

</table>

<script src="js/demo/datatables-demo.js"></script>