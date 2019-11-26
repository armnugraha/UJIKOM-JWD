<!--*
    * @Author Arman Nugraha
    * JWD
    * Since 21 November 2019
    * Tugas Uji Kompetensi
    * 
    *-->

<!DOCTYPE html>
<html lang="en">

    <head>
        
        <!-- META SECTION -->
        <title>Karyawan</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <!-- END META SECTION -->

        <!-- main style -->
        <style type="text/css">
            #tb-karyawan {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #tb-karyawan td, #tb-karyawan th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #tb-karyawan tr:nth-child(even){background-color: #f2f2f2;}

            #tb-karyawan tr:hover {background-color: #ddd;}

            #tb-karyawan th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }

            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=number]{
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            div {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }

            .button {
                background-color: #4CAF50; /* Green */
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }

            .button:hover {
                background-color: #45a049;
            }

        </style>

    </head>

    <body>

        <p>
            <a href="index.php" class="button">Home</a>
            <a href="index.php?page=views/home/create" class="button">Tambah Data</a>
        </p>