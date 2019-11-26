<?php
    /**
      * Panggil File Connection.php, Controller.php
      * 
      */

    include('connection/connection.php');
    include 'controller/Controller.php';

    $id = $_GET['get_id'];

    // Panggil fungsi show yang berasal dari file Controller.php
    $show = show($koneksi,$id);

    if(mysqli_num_rows($show) == 0){
        //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
        echo '<script>window.history.back()</script>';
        
    }else{
        $data = mysqli_fetch_assoc($show);
    }
?>

<div>

    <form action="controller/KaryawanController.php" method="post">
            
        <input type="hidden" name="get_id" value="<?php echo $data['id']; ?>">

        <h3>Karyawan</h3>

        <div>
            <label>NIP</label>
            <input type="number" name="nip" placeholder="NIP" min="0" required value="<?php echo $data['nip']; ?>"  />
        </div>

        <div>
            <label>Nama</label>
            <input type="text" name="nama" placeholder="Nama" required value="<?php echo $data['nama']; ?>"  />
        </div>

        <div>
            <label>Alamat</label>
            <input type="text" name="alamat" placeholder="Alamat" required value="<?php echo $data['alamat']; ?>"  />
        </div>

        <div>
            <button class="button" name="edit-karyawan">Ubah</button>
        </div>

    </form>

</div>