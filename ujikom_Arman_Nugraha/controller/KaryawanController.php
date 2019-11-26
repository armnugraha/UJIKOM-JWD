<?php

	// error_reporting(0);
	
	/**
	  * Panggil File Connection.php, Controller.php
	  * 
	  */

	include('../connection/connection.php');
	include 'Controller.php';

	/**
	  * Validasi / Cek jika input dari nip, nama, alamat belum di isi
	  * Validasi jika tombol save belum di klik
	  */

	if(isset($_POST['save']) && !empty($_POST["nip"]) && !empty($_POST["nama"]) && !empty($_POST["alamat"]) ){

		// Inisialisasi variable dengan data yang di ambil dari form input
		// gunakan mysqli_real_escape_string agar menghindari data yang tidak diinginkan
		$nip = mysqli_real_escape_string($koneksi,$_POST['nip']);
		$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
		$alamat = mysqli_real_escape_string($koneksi,$_POST['alamat']);

		// lakukan validasi tambahan untuk menghandle input nip agar hanya bisa di inputkan nomor saja
		if (!preg_match("/^[0-9]*$/", $nip)) {
			// tampilkan teks
			echo "Inputan NIP Hanya dapat di isi dengan nomor";
			// return redirect to path url
			header("Refresh:1; url= ../index.php?page=views/home/create");
			// stop process
			die();
		}

		// lakukan validasi tambahan untuk menghandle input nama agar hanya bisa di inputkan huruf saja
		if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
			// tampilkan teks
			echo "Inputan Nama Hanya dapat di isi dengan huruf";
			// return redirect to path url
			header("Refresh:1; url= ../index.php?page=views/home/create");
			// stop process
			die();
		}

		// Panggil fungsi store yang berasal dari file Controller.php
		$input = store($koneksi,$nip,$nama,$alamat);
		
		// Cek jika hasil return dari $input bernilai true
		if($input){

			// tampilkan teks
	    	echo "Berhasil Disimpan";

	    	// return redirect to path url
		    header("Refresh:1; url= ../index.php");
	    
		}
		// Kondisi jika hasil return dari $input bernilai false
		else{

			// tampilkan teks
			echo 'Gagal menambahkan data! ';

			// return redirect to path url
			header("Refresh:1; url= ../index.php?page=views/home/create");

	  	}

	}

	/**
	  * Validasi / Cek jika input dari get_id, nip, nama, alamat belum di isi
	  * Validasi jika tombol edit-karyawan belum di klik
	  */

	if(isset($_POST['edit-karyawan']) && !empty($_POST['get_id']) && !empty($_POST["nip"]) && !empty($_POST["nama"]) && !empty($_POST["alamat"]) ){

		// Inisialisasi variable dengan data yang di ambil dari form input
		// gunakan mysqli_real_escape_string agar menghindari data yang tidak diinginkan
		$id = mysqli_real_escape_string($koneksi, $_POST['get_id']);
		$nip = mysqli_real_escape_string($koneksi,$_POST['nip']);
		$nama = mysqli_real_escape_string($koneksi,$_POST['nama']);
		$alamat = mysqli_real_escape_string($koneksi,$_POST['alamat']);

		// lakukan validasi tambahan untuk menghandle input nip agar hanya bisa di inputkan nomor saja
		if (!preg_match("/^[0-9]*$/", $nip)) {
			// tampilkan teks
			echo "Inputan NIP Hanya dapat di isi dengan nomor";
			// return redirect to path url
			header("Refresh:1; url= ../index.php?page=views/home/create");
			// stop process
			die();
		}

		// lakukan validasi tambahan untuk menghandle input nama agar hanya bisa di inputkan huruf saja
		if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
			// tampilkan teks
			echo "Inputan Nama Hanya dapat di isi dengan huruf";
			// return redirect to path url
			header("Refresh:1; url= ../index.php?page=views/home/create");
			// stop process
			die();
		}

		// Panggil fungsi update yang berasal dari file Controller.php
		$update = update($koneksi,$id,$nip,$nama,$alamat);

		// Cek jika hasil return dari $update bernilai true
		if($update){
			// tampilkan teks
	    	echo "Berhasil Diubah";

	    	// return redirect to path url
		    header("Refresh:1; url= ../index.php");
			
		}
		// Kondisi jika hasil return dari $update bernilai false
		else{
			// tampilkan teks
			echo 'Gagal menyimpan data!';

			// return redirect to path url
			header("Refresh:1; url= ../index.php?page=views/home/edit&get_id='.$id.'");
		}

	}

	/**
	  * Validasi / Cek jika input dari get_id
	  *
	  */

	if (isset($_GET['get_id'])){

		// Inisialisasi variable dengan data yang di ambil dari form input
		$id = $_GET['get_id'];

		// cek jika data yang akan di hapus tersebut tersedia
		$cek = mysqli_query($koneksi,"SELECT id FROM karyawan WHERE id='$id'");
		
		// jika hasil dari $cek bernilai 0 maka arahkan ke halaman sebelumnya
		if(mysqli_num_rows($cek) == 0){
			
			echo '<script>window.history.back()</script>';
		
		}
		// jika hasil dari $cek bernilai != 0 maka jalankan fungsi delete
		else{

			// Panggil fungsi destroy yang berasal dari file Controller.php
			$delete = destroy($koneksi,$id);

			// Cek jika hasil return dari $delete bernilai true
			if($delete){
				// tampilkan teks
		    	echo "Berhasil Dihapus";

		    	// return redirect to path url
			    header("Refresh:1; url= ../index.php");
				
			}
			// Kondisi jika hasil return dari $delete bernilai false
			else{
				// tampilkan teks
				echo 'Gagal menghapus data!';

				// return redirect to path url
				header("Refresh:1; url= ../index.php?page=views/home/edit&get_id='.$id.'");
			}
			
		}

	}


?>