<?php
    // error_reporting(0);
    include('connection/connection.php');
?>

<div>
    <h2>Tambah Karyawan</h2>
</div>

<form action="controller/KaryawanController.php" method="post">

    <div>
        <label>NIP</label>
        <input type="number" name="nip" min="0" placeholder="NIP" required />
    </div>

    <div>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Nama" required />
    </div>

    <div>
        <label>Alamat</label>
        <input type="text" name="alamat" placeholder="Alamat" required />
    </div>

    <div>
    	<button class="button" name="save">Simpan</button>
    </div>

</form>