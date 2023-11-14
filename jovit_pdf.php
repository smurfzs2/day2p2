<?php
session_start();

require('fpdf/fpdf.php');

$servername = "localhost";
$username = "root";
$password = "arktechdb";
$dbname = "ojtDatabase";

$con = new mysqli($servername, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_error($con));
}

// Ensure that the id column is auto-incremented
$query = "ALTER TABLE tbl_jovit MODIFY id INT AUTO_INCREMENT";
$result = $con->query($query);

if ($result === false) {
    die("Query execution failed: " . $con->error);
}

$query = "SELECT * FROM tbl_jovit";
$result = $con->query($query);

if ($result === false) {
    die("Query execution failed: " . $con->error);
}

class PDF extends Fpdf
{

}

$pdf = new PDF('L', 'mm', 'A4');
$pdf->AliasNbPages(); // 
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 11);

// Table Headers
$pdf->SetTextColor(255);
$pdf->Cell(10, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'First Name', 1, 0, 'C', true);
$pdf->Cell(30, 10, 'Last Name', 1, 0, 'C', true);
$pdf->Cell(35, 10, 'Gender', 1, 0, 'C', true);
$pdf->Cell(105, 10, 'Address', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Birthday', 1, 0, 'C', true);
$pdf->Ln(); 

while ($row = $result->fetch_object()) {
    $id = $row->id;
    $firstName = $row->firstName;
    $lastName = $row->lastName;
    $gender = $row->gender;
    $address = $row->address;
    $birthday = $row->birthday;

    if ($id % 2 == 0) {
        $pdf->SetFillColor(116, 113, 109);  
    } else {
        $pdf->SetFillColor(0, 88, 143); 
    }
    
    $pdf->Cell(10, 10, $id, 1, 0, 'C', true);
    $pdf->Cell(30, 10, $firstName, 1, 0, 'C', true);
    $pdf->Cell(30, 10, $lastName, 1, 0, 'C', true);
    $pdf->Cell(35, 10, ($gender == 0) ? "Male" : "Female", 1, 0, 'C', true);
    $pdf->Cell(105, 10, $address, 1, 0, 'C', true);
    $pdf->Cell(40, 10, date("Y-m-d", strtotime($birthday)), 1, 0, 'C', true);
    $pdf->Ln();
}

$pdf->Output();
?>
