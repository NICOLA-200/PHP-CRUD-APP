<?php 

require_once "connection.php";
require_once "Afpdf/fpdf.php";

$result = "SELECT * FROM students ORDER BY id";
$sql =$conn->query($result);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

while ($row = $sql->fetch_object()) {

     $id = $row->id;
     $name = $row->name;
     $email = $row->email;
     $phone = $row->phone;
     $course = $row->course;

     $pdf->Cell(20,10,$id,1);
     $pdf->Cell(40,10,$name,1);
     $pdf->Cell(80,10,$email,1);
     $pdf->Cell(40,10,$phone,1);
     $pdf->Cell(40,10,$course,1);
     $pdf-> Ln();
}

$pdf-> Output();
?>