<?php
require("../../php/db.php");
require("o_balance.php");
require("../../../fpdf/fpdf.php");

$fi = $_POST['fecha_inicio'];
$ff = $_POST['fecha_fin'];
$motivo = $_POST['motivo'];

$resultado = $balance->movimientos($conn, $fi, $ff, $motivo);

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../../../img/bg.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte Movimientos',1,0,'C');
    // Salto de línea
    $this->Ln(40);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $text = "Página ";
    $this->Cell(0,10, iconv("utf-8", 'ISO-8859-1', $text).$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);

$pdf->Cell(10);
$pdf->Cell(30,10,"Registros filtrados: ",0,1,'C',0);
$pdf->Cell(15);
$pdf->Cell(30,10,"Fecha Inicio: " . $fi,0,0,'C',0);
$pdf->Cell(20);
$pdf->Cell(30,10,"Fecha Final: " . $ff,0,1,'C',0);
$pdf->Ln(5);




$pdf->Cell(5);

$pdf->Cell(30,10,"N Factura",1,0,'C',0);
$pdf->Cell(40,10,"Fecha Factura",1,0,'C',0);
$pdf->Cell(30,10,"Cantidad",1,0,'C',0);
$pdf->Cell(40,10,"Valor Kg",1,0,'C',0);
$pdf->Cell(40,10,"Valor Total",1,1,'C',0);

$pdf->SetFont('Times','',12);

while($fila = $resultado->fetch_assoc()){
    $pdf->Cell(5);
    $pdf->Cell(30,10,$fila['n_factura'],1,0,'C',0);
    $pdf->Cell(40,10,$fila['fecha_factura'],1,0,'C',0);
    $pdf->Cell(30,10, number_format( $fila['cantidad'], 0, '.'),1,0,'C',0);
    $pdf->Cell(40,10, number_format($fila['valor_kg'], 0, '.') . " $",1,0,'C',0);
    $pdf->Cell(40,10,number_format($fila['valor_total'], 0, '.') . " $",1,1,'C',0);
}

$pdf->Output();