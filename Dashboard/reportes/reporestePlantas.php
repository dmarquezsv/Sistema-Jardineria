<?php
	
     require_once('../LibreriasPDF/fpdf.php');
      
     include_once '../../main/mainModel.php'; 
     $obj = new mainModel();

      $sql2 = "SELECT `IDProducto` ,C.IDcategoria, C.`IDcategoria` ,C.Nombre AS 'categoria', Titulo , img , P.FechaInicial , P.FechaFinal , P.comentario , cantidad , `costo`,PR.`descripcion` FROM producto PR INNER JOIN publicaciones P ON P.IDTiempo = PR.IDTiempo LEFT JOIN categoria C on PR.IDcategoria = C.IDcategoria";

      $stmt2 = $obj->ejecutar_consulta_simple($sql2);

     $pdf = new FPDF("P" , 'mm' , 'A3');
     $pdf->AddPage();

	     //Insertar Imagenes
	$pdf->Image('Recursos/logo.png',20, 14, 25, 30, 'png');
	$pdf->Image('Recursos/logo.png',250, 14, 25, 30, 'png');
 
 $pdf->Ln(15);           
 $pdf->SetFont('Arial','B',17);
 $pdf->Cell(108);
 $pdf->Cell(170,8,utf8_decode('Reporteria de plantas'), 0, 1);
 $pdf->Cell(109);
 $pdf->Cell(172,8,utf8_decode('Programa Jardineria'), 0, 1);
 $pdf->Ln(10);
 $pdf->Cell(10);

 $pdf->Cell(25);
 $pdf->SetFillColor(255,255,255);
 $pdf->SetFont('Arial','B',12);
 $pdf->Ln(2);


 $pdf->Ln(15);
 $pdf->SetFont('Arial','',10);
 $pdf->SetFont('Arial','B',17);
 $pdf->Cell(112);
 $pdf->Cell(172,8,utf8_decode('Lista de producto'), 0, 1);
 $pdf->Ln(10);
 $pdf->SetFillColor(232,232,232);
 $pdf->SetFont('Arial','B',12);
 $pdf->Cell(60,6,'Img',1,0,'C',1);
 $pdf->Cell(60,6,'Producto',1,0,'C',1);
 $pdf->Cell(60,6,'Categoria',1,0,'C',1);
 $pdf->Cell(20,6,'Precio',1,0,'C',1);
 $pdf->Cell(20,6,'stock',1,0,'C',1);
 $pdf->Cell(25,6,'Registrado',1,0,'C',1);
 $pdf->Cell(25,6,'Entrega',1,1,'C',1);
 $pdf->SetFont('Arial','',10);


  while ($fila2=$stmt2->fetch())
    {
        $pdf->Cell(60,6,utf8_decode($fila2['img']),1,0,'C');
        $pdf->Cell(60,6,utf8_decode($fila2['Titulo']),1,0,'L');
        $pdf->Cell(60,6,utf8_decode($fila2['categoria']),1,0,'C');
        $pdf->Cell(20,6,utf8_decode($fila2['costo']),1,0,'C');
 	    $pdf->Cell(20,6,utf8_decode($fila2['cantidad']),1,0,'C');
 	    $pdf->Cell(25,6,utf8_decode($fila2['FechaInicial']),1,0,'L');
 	    $pdf->Cell(25,6,utf8_decode($fila2['FechaFinal']),1,1,'L');
        
    }



  $pdf->Output("ReporteriaPlantas.pdf","I");


 ?>