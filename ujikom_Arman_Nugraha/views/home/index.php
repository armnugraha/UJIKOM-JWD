<div>

    <!-- start title -->
    <h2>Data Karyawan</h2>
    <!-- end title -->

    <?php

        // deklarasi $get_value dengan string kosong
        $get_value = "";

        // cek jika key tersedia
        if (!empty($_GET["key"])) {
            // deklarasi $get_value dengan value dari key
            $get_value = $_GET["key"];
        }

    ?>

    <!-- start cari -->
    <form method="get">
        cari:<input type="text" 
            name="key" 
            placeholder="Nip atau Nama"
            value="<?php echo $get_value; ?>">
        <input type="submit" name="cari">
    </form>
    <!-- end cari -->
    
    <?php

        /**
          * Panggil File Connection.php, Controller.php
          * 
          */

        include('connection/connection.php');
        include 'controller/Controller.php';

        // Panggil fungsi index yang berasal dari file Controller.php
        $query = index($koneksi,$get_value);

        $cek=mysqli_num_rows($query);

        if ($cek == null) {
            echo "Data Tidak ditemukan";
        }else{
    ?>
    <table border="1" id="tb-karyawan">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
    <?php
        while($record =mysqli_fetch_assoc($query)){
    ?>
        <tr>
            <td><?php echo $record['id']; ?></td>
            <td><?php echo $record['nip']; ?></td>
            <td><?php echo $record['nama']; ?></td>
            <td><?php echo $record['alamat']; ?></td>
            <td>
                <a href="index.php?page=views/home/edit&get_id=<?php echo $record['id']; ?>">Edit</a>
                <span> | </span>
                <a href="controller/KaryawanController.php?get_id=<?php echo $record['id']; ?>" OnClick="return confirm('apakah anda ingin menghapusnya?');">Hapus</a>
            </td>
        </tr>
    <?php } } ?>
        </tbody>
    </table>

</div>