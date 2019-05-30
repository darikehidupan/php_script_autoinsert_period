<?php
$conn = mysqli_connect("localhost","root","","test") or die ("could not connect database");

/* = = = = = = PERIODE AUTO INSERT DIMULAI DAN BERAKHIR = = = = = = */

$tanggalperiodemulai = 1;
$tanggalperiodeselesai = 17;

/* = = = = = = INTERVAL / JEDA PER BERAPA HARI INSERTNYA = = = = = = */

$interval = 1;

for ($i=$tanggalperiodemulai; $i <= $tanggalperiodeselesai; $i++) 
{

	if ($i % $interval == 0)
	{
		$datepost[] = $i;
	}

}

/* = = = = = = 
NAH DISINI AKTIVITAS INSERTNYA,
ALGONYA DIA NGAMBIL DARI TANGGAL SEKARANG HARI INI,
JIKA TANGGAL SEKARANG ADA YANG TERMASUK KE HITUNGAN DIATAS (ARRAY DATEPOST),
MAKA SCRIPTNYA KE EXECUTE,
= = = = = = = = */

date_default_timezone_set('Asia/Jakarta');
$date = date('m/d/Y h:i:s a', time());
$tanggalsekarang = date('d', time());

foreach ($datepost as $key => $value) 
{
	if ($value == $tanggalsekarang) 
	{
		$sql = "INSERT INTO post (id, tanggal, stempelwaktu, keterangan)
		VALUES ('', '$tanggalsekarang', '$date', 'POSTED')";

		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		$conn->close();
	}
}

?>