<?php 
	echo "estoy aqui";
    $fpdf->AddPage();
    $fpdf->SetFont('Arial','B',16);
    $fpdf->Cell(40,10,$data);
    $fpdf->Output('','I');
 ?>