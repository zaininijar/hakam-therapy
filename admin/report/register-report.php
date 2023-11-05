<?php

use Dompdf\Dompdf;

session_start();

require_once '../../connection.php';

$html = '<table cellspacing="0" style="font-size: 10px; width: 100%;font-family: sans-serif" border="1">';
$html .= '<thead>';
$html .= '<tr style="background-color: rgba(52 211 153); color: rgba(6 78 59)">';
$html .= '<th>#</th>';
$html .= '<th>Nama</th>';
$html .= '<th>Alamat</th>';
$html .= '<th>Desa</th>';
$html .= '<th>Kecamatan</th>';
$html .= '<th>Kota</th>';
$html .= '<th>Whatsapp</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

$query = "SELECT * FROM therapy_register";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll();

foreach ($result as $key => $row) {
    $html .= '<tr>';
    $html .= '<td style="padding: 10px 5px; text-align: center;">' . $key + 1 . '</td>';
    $html .= '<td style="padding: 10px 5px;">' . $row['name'] . '</td>';
    $html .= '<td style="padding: 10px 5px;">' . $row['address'] . '</td>';
    $html .= '<td style="padding: 10px 5px;">' . $row['village'] . '</td>';
    $html .= '<td style="padding: 10px 5px;">' . $row['subdistrict'] . '</td>';
    $html .= '<td style="padding: 10px 5px;">' . $row['city'] . '</td>';
    $html .= '<td style="padding: 10px 5px;">' . $row['whatsapp'] . '</td>';
    $html .= '</tr>';
}

$html .= '</tbody>';
$html .= '</table>';

// include autoloader
require_once("../../dompdf/autoload.inc.php");

//Create instance
$dompdf = new DOMPDF();

// Upload your HTML code
$dompdf->load_html('
        <h3 style="text-align: center; font-family: sans-serif">Data Pendaftaran HakamTherapy</h3>
        ' . $html . '
      ');

//Render html
$dompdf->render();

//Create and output the pdf
$pdf = $dompdf->output();

//Visualize the page
$dompdf->stream(
    "form.pdf",
    array(
    "Attachment" => false //To download turn it to true, to preview pdf turn it to false
      )
);
