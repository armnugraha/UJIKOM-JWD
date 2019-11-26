<?php
	
	/**
	  * Function For Listing Data
	  * params($koneksi,$get_value)
	  * return $data
	  */

	function index($koneksi,$get_value)
	{
        // query untuk menampilkan listing data
        $query =mysqli_query($koneksi,"SELECT * FROM karyawan WHERE nip LIKE '%".$get_value."%' OR nama LIKE '%".$get_value."%' ");

        return $query;
	}

	/**
	  * Function For Store Data
	  * params($koneksi,$nip,$nama,$alamat)
	  * return $input
	  */

	function store($koneksi,$nip,$nama,$alamat)
	{
		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$input = mysqli_query($koneksi, "INSERT INTO karyawan VALUES(NULL, '$nip', '$nama', '$alamat')");

		return $input;
	}

	/**
	  * Function For Show Data
	  * params($koneksi,$id)
	  * return $input
	  */

	function show($koneksi,$id)
	{
		//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
		$show = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id='$id'");

		return $show;
	}

	/**
	  * Function For Update Data
	  * params($koneksi,$id,$nip,$nama,$alamat)
	  * return $update
	  */

	function update($koneksi,$id,$nip,$nama,$alamat)
	{

		// query untuk mengubah data
		$update = mysqli_query($koneksi, "UPDATE karyawan SET nip='$nip', nama='$nama', alamat='$alamat' WHERE id='$id'");

		return $update;
	}

	/**
	  * Function For Delete Data
	  * params($koneksi,$id)
	  * return $delete
	  */

	function destroy($koneksi,$id)
	{
		// query untuk menghapus data
		$delete = mysqli_query($koneksi, "DELETE FROM karyawan WHERE id='$id'");

		return $delete;
	}

?>