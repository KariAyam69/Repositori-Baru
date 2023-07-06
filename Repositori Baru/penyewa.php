<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tabel Rental Mobil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
 <div class="row">
  <div class="col-sm-4">
   <h2>Form Tabel Rental Mobil</h2>
  </div>
  <div class="col-sm-8">
   <form method="post" class="input-group">
    <input type="text" name="kCari" placeholder="Ketik untuk cari" class="form-control">
	<input type="submit" name="bCari" value="Go" class="btn btn-success">
   </form>
  </div>
 </div>
 <div class="row">
  <form action="" method="post" class="col-sm-3">
    <div class="mb-3 mt-3">
      <label for="nik">NIK:</label>
      <input type="text" class="form-control" id="nik" placeholder="Enter nik" name="nik">
    </div>
    <div class="mb-3">
      <label for="namapenyewa">Nama Penyewa:</label>
      <input type="text" class="form-control" id="namapenyewa" placeholder="Enter nama penyewa" name="namapenyewa">
    </div>
    <div class="mb-3 mt-3">
      <label for="alamat">Alamat:</label>
      <input type="text" class="form-control" id="alamat" placeholder="Enter alamat" name="alamat">
    </div>
	<div class="mb-3 mt-3">
      <label for="nohp">No HP:</label>
      <input type="text" class="form-control" id="nohp" placeholder="Enter no hp" name="nohp">
    </div>
	<div class="mb-3 mt-3">
      <label for="noplat">No Plat:</label>
      <input type="text" class="form-control" id="noplat" placeholder="Enter no plat" name="noplat">
    </div>
	 
	<div class="mb-3 mt-3">
      <label for="tanggalmulairental">Tanggal Mulai Rental:</label>
      <input type="date" class="form-control" id="tanggalmulairental" placeholder="Enter Tanggal Mulai Rental" name="tanggalmulairental">
    </div>
	 
	<div class="mb-3 mt-3">
      <label for="nosim">No SIM:</label>
      <input type="text" class="form-control" id="nosim" placeholder="Enter no sim" name="nosim">
    </div>
	 
	<div class="mb-3 mt-3">
      <label for="tanggalkembali">Tanggal Kembali:</label>
      <input type="date" class="form-control" id="tanggalkembali" placeholder="Enter tanggal kembali" name="tanggalkembali">
    </div>
    <button type="submit" class="btn btn-primary" name="tombolSimpan">Simpan</button>
  </form>
  <div class="col-sm-9">
   <?php
   if (isset($_POST['bCari'])) {
	   $kCari = $_POST['kCari'];
	   $sqlcari = "SELECT * FROM penyewa WHERE nik LIKE '%" . $kCari . "%'";
	   $kon = mysqli_connect("localhost", "root", "", "utskelompok2");
	   $qcari = mysqli_query($kon, $sqlcari);
	   
	   if (mysqli_num_rows($qcari) > 0) {
   ?>
   <h2>Daftar barang yang ditemukan:</h2>
   <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>NIK</th>
        <th>Nama Penyewa</th>
        <th>Alamat</th>
		<th>No HP</th>
		<th>No Plat</th>
		<th>Tanggal Mulai Rental</th>
		<th>No SIM</th>
		<th>Tanggal Kembali</th>
		<th>Aksi</th>
      </tr>
    </thead>
    <tbody>
	  <?php while($r = mysqli_fetch_array($qcari)) { ?>
      <tr>
        <td><?php echo $r['nik']; ?></td>
        <td><?php echo $r['namapenyewa']; ?></td>
        <td><?php echo $r['alamat']; ?></td>
		<td><?php echo $r['nohp']; ?></td>
		<td><?php echo $r['noplat']; ?></td>
		<td><?php echo $r['tanggalmulairental']; ?></td>
		<td><?php echo $r['nosim']; ?></td>
		<td><?php echo $r['tanggalkembali']; ?></td>
		<td>
		    <a href="edit.php?barang=<?php echo $data['barang']; ?>" class="btn btn-sm btn-warning">Edit</a>
		    <a href="hapus.php?barang=<?php echo $data['barang']; ?>" class="btn btn-sm btn-danger">Hapus</a>
		</td>
      </tr>
	  <?php } ?>
    </tbody>
   </table>
   <?php
	   } else {
		   echo "<p>Tidak ada barang yang ditemukan.</p>";
	   }
   ?>
   <?php } //end if isset bCari ?>
  </div>
 </div>
  <?php
 if (isset($_POST['tombolSimpan'])) {
    $kon = mysqli_connect("localhost","root","","utskelompok2");
    $nik = 					$_POST['nik'];
    $namapenyewa = 			$_POST['namapenyewa'];
    $alamat = 				$_POST['alamat'];
    $nohp = 				$_POST['nohp'];
	$noplat = 				$_POST['noplat'];
	$tanggalmulairental = 	$_POST['tanggalmulairental'];
	$nosim = 				$_POST['nosim'];
	$tanggalkembali = 		$_POST['tanggalkembali'];
    $sql = "INSERT INTO penyewa (nik, namapenyewa, alamat, nohp, noplat, tanggalmulairental, nosim, tanggalkembali) VALUES ('$nik', '$namapenyewa', '$alamat', '$nohp', '$noplat', '$tanggalmulairental', '$nosim', '$tanggalkembali')";

    if (mysqli_query($kon, $sql)) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($kon);
    }
}

  ?>
</div>

</body>
</html>
