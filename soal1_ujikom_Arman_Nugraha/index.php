<!--*
    * @Author Arman Nugraha
    * JWD
    * Since 21 November 2019
    * Tugas Uji Kompetensi
    * 
    *-->

<!DOCTYPE html>
<html>
<head>
	<title>Count Same Number</title>
</head>
<body>

	<?php

		// deklarasi $value dengan string kosong
		$value = "";

		// cek jika key angka tersedia
		if (!empty($_GET["angka"])) {
			// deklarasi $value dengan value dari key angka
			$value = $_GET["angka"];
		}

	?>

	<form>
		<table border="0" width="200">
			<tr>
				<td width="80"><label>Jumlah:</label></td>
				<td width="120"><input type="number" name="angka" min="0" value="<?php echo $value; ?>"></td>
			</tr>
			<tr>
				<td colspan="2" align="right">
					<input type="submit" value="Value">
				</td>
			</tr>
		</table>
	</form>

	<?php


		// $array_value = [2,3,1,2];

		// echo json_encode($count_value_array);

		// die();

		/**
		  * Validasi / Cek jika key angka belum ada
		  *
		  */
		if (!empty($_GET["angka"]) ) {

			/**
			  * Validasi / Cek jika inputan bukan bernilai angka
			  *
			  */

			if (!preg_match("/^[0-9]*$/", $_GET["angka"])) {
				// tampilkan teks
				echo "Inputan Hanya dapat di isi dengan nomor";
				// return redirect to path url
				header("Refresh:1; url= index.php");
				// stop process
				die();
			}

			// Inisialisasi $get_angka dengan data yang di ambil dari form input
			$get_angka = $_GET["angka"];

			// ubah bentuk data $get_angka menjadi array
			$array_value  = array_map('intval', str_split($get_angka));

			// hitung jumlah angka yang sama yang berada di array $array_value
		    // $count_value_array = array_count_values($array_value);

		    $count_value_array = [];

			for ($i=0; $i < count($array_value); $i++) { 
				if (empty($count_value_array[$array_value[$i]])) {
					$count_value_array[$array_value[$i]] = 1;
				}else{
					$count_value_array[$array_value[$i]]++;
				}
			}
		    
		    // urutkan data key dari array secara ascending
		    ksort($count_value_array);

		    // Inisialisasi nama file yang akan di buat
			$myFile = "penjumlahan nilai yang sama.txt";

			// buka file berdasarkan nama yang ada di variable $myFile
			// gunakan format a agar dapat di tulis dan tidak di timpa
			$create = fopen($myFile, 'a');

			// isi data yang akan di masukan ke dalam file
			$stringData = "Angka yang diinputkan : " . $get_angka . "<br>";
			// masukan ke dalam file berdasarkan data yang sudah di buat
			fwrite($create, $stringData);

			// isi data yang akan di masukan ke dalam file
			$stringData = "Hasil : <br>";
			// masukan ke dalam file berdasarkan data yang sudah di buat
			fwrite($create, $stringData);

			// lakukan perulangan menggunakan foreach agar lebih mudah dalam mendapatkan key dan value
			foreach ($count_value_array as $key => $value) {
				// isi data yang akan di masukan ke dalam file
				$stringData = $key . ":" . $value . "<br>";
				// masukan ke dalam file berdasarkan data yang sudah di buat
				fwrite($create, $stringData);
		    }

		    // data akan di buka dari file yang sudah ada
			$read = fopen($myFile, "r");
			// tampilkan data yang sudah di buat pada file
			echo fread($read, filesize($myFile));

			// tutup baca file
			fclose($read);

			// tutup tulis file
			fclose($create);
		}
	?>

</body>
</html>