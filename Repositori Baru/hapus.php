<?php
	include "barang.php";
	$id = $_GET['noplat'];
	$ambilData = mysqli_query($barang, "SELECT * FROM barang WHERE noplat='$id'");
	$data-mysqli_fetch_array($ambilData);
	?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SIM Inventaris Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">SIM Invent. V.2023</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="mobil.php" target="frmutama">Mobil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="penyewa.php" target="frmutama">Penyewa</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Aktifitas</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="penempatan.php" target="frmutama">Penempatan</a></li>
            <li><a class="dropdown-item" href="barangperlokasi.php" target="frmutama">Barang Per Lokasi</a></li>
            <li><a class="dropdown-item" href="labelbarang.php" target="frmutama">Label Barang</a></li>
          </ul>
        </li>
      </ul>
    </div>
	
  </div>
</nav>

<div class="container-fluid mt-3">
  <iframe name="frmutama" width="100%" height="1500px"></iframe>
</div>

</body>
</html>
