<?php 
$kon=mysqli_connect("localhost","root","","utskelompok2");
?>
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
  <form action="" method="post" class="col-sm-5">
    <div class="mb-3 mt-3">
	  <label for="noplat">No Plat:</label>
       <input type="text" class="form-control" id="noplat" placeholder="Enter no plat" name="noplat" 
	   </div>
    <div class="mb-3">
      <label for="nomesin">No Mesin:</label>
      <input type="text" class="form-control" id="nomesin" placeholder="Enter no mesin" name="nomesin">
    </div>
    <div class="mb-3 mt-3">
      <label for="hargasewa">Harga Sewa:</label>
      <input type="text" class="form-control" id="hargasewa" placeholder="Enter harga sewa" name="hargasewa">
    </div>
	<div class="mb-3 mt-3">
      <label for="statussewa">Status Sewa:</label>
      <input type="text" class="form-control" id="statussewa" placeholder="Enter status sewa" name="statussewa">
    </div>
    <button type="submit" class="btn btn-primary" name="tombolSimpan">Simpan</button>
  </form>
  <div class="col-sm-7">
   <?php
   if (isset($_POST['bCari'])) {
	   $kCari = $_POST['kCari'];
	   $sqlcari = "SELECT * FROM barang WHERE noplat LIKE '%" . $kCari . "%'";
	   $kon = mysqli_connect("localhost", "root", "", "utskelompok2");
	   $qcari = mysqli_query($kon, $sqlcari);
	   
	   if (mysqli_num_rows($qcari) > 0) {
   ?>
   <h2>Daftar barang yang ditemukan:</h2>
   <table class="table table-bordered table-hover table-striped">
    <thead>
      <tr>
        <th>No Plat</th>
        <th>No Mesin</th>
        <th>Harga Sewa</th>
		<th>Status Sewa</th>
		<th>Aksi</th>
      </tr>
    </thead>
    <tbody>
	  <?php while($r = mysqli_fetch_array($qcari)) { ?>
      <tr>
        <td><?php echo $r['noplat']; ?></td>
        <td><?php echo $r['nomesin']; ?></td>
        <td><?php echo $r['hargasewa']; ?></td>
		<td><?php echo $r['statussewa']; ?></td>
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
    $noplat = 		$_POST['noplat'];
    $nomesin = 		$_POST['nomesin'];
    $hargasewa = 	$_POST['hargasewa'];
    $statussewa = 	$_POST['statussewa'];
    $sql = "INSERT INTO barang (noplat, nomesin, hargasewa, statussewa) VALUES ('$noplat', '$nomesin', '$hargasewa', '$statussewa')";

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
