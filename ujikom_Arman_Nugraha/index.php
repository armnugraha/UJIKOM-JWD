<?php

	/**
	  * Panggil File header.php
	  * 
	  */
	include("header.php");

	// cek jika tersedia key page
	if(isset($_GET['page'])){

		// isi variable page dengan value dari key page dan tambahkan ekstensi .php
		$page=$_GET['page'].".php";
	}
	// jika key page tidak tersedia
	else {
		// isi variable page dengan value default
		$page='views/home/index.php';
	}

	/**
	  * Panggil File berdasarkan variable $page yang sudah di deklarasi
	  * 
	  */
	include($page);

	/**
	  * Panggil File footer.php
	  * 
	  */
	include ("footer.php");
?>