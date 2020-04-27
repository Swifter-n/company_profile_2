<?php
function text($str)
{
    $str = substr($str, 0, 1000);
    return $str . '........';
}
function slide($str)
{
    $str = substr($str, 0, 150);
    return $str . '........';
}
function news($str)
{
    $str = substr($str, 0, 150);
    return $str . '........';
}
function tgl_indo($date){
	$Hari = array("Sunday", "Saturday", "Friday", "Thurday", "Webdesday", "Thueday", "Monday");

	$Bulan = array("January", "Febuary", "March", "April", "Mey", "June", "July", "Agusth", "September", "October", "November", "December");

	$tahun = substr($date, 0, 4);
	$bulan = substr($date, 5, 2);
	$tgl = substr($date, 8, 2);
	$hari = date("w", strtotime($date));

	$result = $Hari[$hari] . ", ". " " .$tgl . " " . $Bulan[(int)$bulan - 1] . " " . $tahun;
	return $result;
}
