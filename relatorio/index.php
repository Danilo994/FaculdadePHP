<?php
require('./fpdf185/fpdf.php');
require_once("../class.notas.php");

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'NOTAS DOS ALUNOS',10,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require('../class.aluno.php');

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$registros = $prova->listarAvaliacoes();

foreach ($registros as $linhas)
{
        $pdf->Cell(0,17, ' O aluno '. $linhas['nmaluno'] .' tirou '. $linhas['nota'] .' na disciplina '. $linhas['dsdisciplina'],0,1);
}

// for($i=1;$i<=40;$i++)
//     $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>


