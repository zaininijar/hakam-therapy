<?php

use Dompdf\Dompdf;

session_start();

require_once '../../connection.php';

$html = '
<style>
  ul {
    padding: 0
  }
  li {
    list-style: none
  }
  td{
      padding: 0px 10px;
      white-space: nowrap;    
    }
</style>
<table cellspacing="0" style="font-size: 10px; width: 100%;font-family: sans-serif" border="1">';
$html .= '<thead>';
$html .= '<tr style="background-color: rgba(52 211 153); color: rgba(6 78 59)">';
$html .= '
<th style="">
    #
</th>
<th style="">
    Nama
</th>
<th style="">
    Alamat
</th>
<th style="">
    Therapy & Therapis
</th>
<th style="">
    Hari/Tgl
</th>
<th style="">
    Pembayaran
</th>
';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

$query = "SELECT * FROM after_therapy";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll();

foreach ($result as $key => $row) {
    $html .= '<tr>';
    $html .= '
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-emerald-900">
        ' . $key + 1 . '
    </td>
    <td >
        <ul>
            <li>' . $row['name'] . '</li>
            <li>WA : ' . $row['whatsapp'] . '</li>
        </ul>
    </td>
    <td >
        <ul>
            <li><strong>Desa</strong> : ' . $row['village'] . '</li>
            <li><strong>Kec.</strong> : ' . $row['subdistrict'] . '</li>
            <li><strong>Kota</strong> : ' . $row['city'] . '</li>
            <li class="whitespace-pre-line"> <strong>Alamat lengkap</strong> :
                ' . $row['address'] . '</li>
        </ul>
    </td>
    <td >
        ' . strtoupper($row['type_therapy']) . ' / ' . $row['therapyst'] . '
    </td>
    <td >
        ' . $row['day'] . ' / ' . date("Y-m-d", strtotime($row['date'])) . '
    </td>
    <td >
        ' . 'Rp' . $row['price'] . ' / ' . $row['type_payment'] . '
    </td>
    ';
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
        <h3 style="text-align: center; font-family: sans-serif">Data Sesudah Therapy di HakamTherapy</h3>
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
