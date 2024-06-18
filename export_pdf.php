<?php
require('fpdf/fpdf.php');
include("Connection/KoneksiAkun.php");

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Data Akun', 0, 1, 'C');
        $this->Ln(5);
    }

    // Page footer
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Table with data
    function LoadData($koneksiAkun)
    {
        $query = "SELECT * FROM akun ORDER BY id DESC";
        $result = mysqli_query($koneksiAkun, $query);
        $data = [];
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function FancyTable($header, $data)
    {
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(200, 200, 200);
        foreach ($header as $col) {
            $this->Cell(40, 7, $col, 1, 0, 'C', true);
        }
        $this->Ln();
        $this->SetFont('Arial', '', 12);
        foreach ($data as $row) {
            $this->Cell(40, 6, $row['username'], 1);
            $this->Cell(40, 6, $row['email'], 1);
            $this->Cell(40, 6, $row['password'], 1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$header = ['Username', 'Email', 'Password'];
$data = $pdf->LoadData($koneksiAkun);
$pdf->AddPage();
$pdf->FancyTable($header, $data);
$pdf->Output();
?>
