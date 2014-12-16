<?php

include('scripts/conexion.php');
date_default_timezone_set('UTC');
session_start();

$query = "select dc.cod_compra, dc.cod_pasaje, dc.cod_pasajero, (pa.nombre_pasajero+ ' '+ pa.apellido_paterno) as pasajero, p.nro_asiento, p.precio_pasaje, p.nro_vuelo from detalle_compra dc inner join pasaje p 
on dc.cod_pasaje = p.cod_pasaje inner join pasajero pa on pa.cod_pasajero = dc.cod_pasajero where dc.cod_compra='{$_SESSION['cod_compra']}'";
$resultado = sqlsrv_query($conexion,$query);
$resultado1 = sqlsrv_query($conexion,$query);
$linea=sqlsrv_fetch_array($resultado,SQLSRV_FETCH_NUMERIC);

 
//Recibir detalles de factura
$id_factura =  $linea[0];
$fecha_factura = date('d/m/Y');

//Recibir los datos de la empresa
$nombre_tienda =  "Agencia de viajes";
$direccion_tienda =  "Av. siempre viva 123";
$poblacion_tienda =  "Tacna";
$provincia_tienda =  "Tacna";
$codigo_postal_tienda =  "052";
$telefono_tienda =  "051928192";
$fax_tienda =  "2910";
$identificacion_fiscal_tienda = "18190";

//Recibir los datos del cliente
$nombre_cliente =  $_SESSION['nombres'];
$apellidos_cliente = $_SESSION['app']." ".$_SESSION['apm'];
$direccion_cliente = " ";
$poblacion_cliente =  " ";
$provincia_cliente =  " ";
$codigo_postal_cliente = " ";
$identificacion_fiscal_cliente =  " ";

//Recibir los datos de los productos
$iva =  " ";
$gastos_de_envio =  " ";


$pasajeros = "";
$apellidos = "";
$nros_asiento = "";
$precio = "";
$nros_vuelo = "";

$unidades =  "2313,213123,123213 ";

$productos =  "asdsdaddd,sadasdada,wadassds ";
$precio_unidad =  "12,1131,23 ";

//variable que guarda el nombre del archivo PDF
$archivo="factura-".$id_factura.".pdf";

//Llamada al script fpdf
require('scripts/fpdf.php');


$archivo_de_salida=$archivo;

$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.


//logo de la tienda
$pdf->Image('img/logo.png' , 20,8,45);

// Encabezado de la factura
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190, 10, "FACTURA", 0, 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(190,5, "Número de factura: ".$id_factura."\n"."Fecha: ".$fecha_factura, 0, "C", false);
$pdf->Ln(2);

// Datos de la tienda
$pdf->SetFont('Arial','B',12);
$top_datos=45;
$pdf->SetXY(40, $top_datos);
$pdf->Cell(190, 10, "Datos de la tienda:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(190, //posición X
5, //posición Y
"Nombre: $nombre_tienda.\n".
"Dirección:  Av. Siempre Viva 123\n".
"Población:  Tacna\n".
"Provincia:  Tacna\n".
"Código Postal:  051\n".
"Teléfono: 4151021\n".
"Fax:  13232 \n".
"Indentificación Fiscal: 23122",
 0, // bordes 0 = no | 1 = si
 "J", // texto justificado 
 false);


// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(125, $top_datos);
$pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(
190, //posición X
5, //posicion Y
"Nombre: ".$nombre_cliente."\n".
"Apellidos: ".$apellidos_cliente."\n".
"Dirección: Algun lugar\n".
"Población:  Peru\n".
"Provincia:  Tacna\n".
"Código Postal:  01\n".
"Identificación Fiscal: 2912020", 
0, // bordes 0 = no | 1 = si
"J", // texto justificado
false);

//Salto de línea
$pdf->Ln(2);



// extracción de los datos de los productos a través de la función explode
$e_productos = explode(",", $productos);
$e_unidades = explode(",", $unidades);
$e_precio_unidad = explode(",", $precio_unidad);

//Creación de la tabla de los detalles de los productos productos
$top_productos = 110;
    $pdf->SetXY(10, $top_productos);
    $pdf->Cell(40, 5, 'PASAJE', 0, 1, 'C');
    $pdf->SetXY(40, $top_productos);
    $pdf->Cell(40, 5, 'PASAJERO', 0, 1, 'C');
    $pdf->SetXY(67, $top_productos);
    $pdf->Cell(40, 5, 'NOMBRE Y APELLIDO', 0, 1, 'C'); 
    $pdf->SetXY(100, $top_productos);
    $pdf->Cell(40, 5, 'NRO. DE ASIENTO', 0, 1, 'C');    
    $pdf->SetXY(130, $top_productos);
    $pdf->Cell(40, 5, 'PRECIO', 0, 1, 'C');  
    $pdf->SetXY(160, $top_productos);
    $pdf->Cell(40, 5, 'NRO DE VUELO', 0, 1, 'C');      
 
$precio_subtotal = 0; // variable para almacenar el subtotal
$y = 115; // variable para la posición top desde la cual se empezarán a agregar los datos
$x=0;
while($linea1=sqlsrv_fetch_array($resultado1,SQLSRV_FETCH_ASSOC))
{
$pdf->SetFont('Arial','',8);
       
   $pdf->SetXY(10, $y);
    $pdf->Cell(40, 5, $linea1['cod_pasaje'], 0, 1, 'C');
    $pdf->SetXY(40, $y);
    $pdf->Cell(40, 5,$linea1['cod_pasajero'], 0, 1, 'C');
    $pdf->SetXY(67, $y);
    $pdf->Cell(40, 5, $linea1['pasajero'], 0, 1, 'C');
    $pdf->SetXY(100, $y);
    $pdf->Cell(40, 5,$linea1['nro_asiento'], 0, 1, 'C');
    $pdf->SetXY(130, $y);
    $pdf->Cell(40, 5, "S/. ".$linea1['precio_pasaje'], 0, 1, 'C');
    $pdf->SetXY(160, $y);
    $pdf->Cell(40, 5, $linea1['nro_vuelo']." €", 0, 1, 'C');

//Cálculo del subtotal 	
$precio_subtotal += $linea1['precio_pasaje'];
 
// aumento del top 5 cm
$y = $y + 5;
}

//Cálculo del Impuesto
$add_iva = $precio_subtotal * $iva / 100;

//Cálculo del precio total
//$total_mas_iva = round($precio_subtotal + $add_iva + $gastos_de_envio, 2);
$total_mas_iva = $precio_subtotal + 0.0018*$precio_subtotal + 5;
$pdf->Ln(2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 5, "Gastos de envío: S/. 5.00 ", 0, 1, "C");
$pdf->Cell(190, 5, "I.G.V: 0.18 %", 0, 1, "C");
$pdf->Cell(190, 5, "Subtotal: S/. $precio_subtotal ", 0, 1, "C");
$pdf->Cell(190, 5, "TOTAL: S/. ".$total_mas_iva, 0, 1, "C");


$pdf->Output($archivo_de_salida);//cierra el objeto pdf

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
$fp = fopen($archivo, "r");
fpassthru($fp);
fclose($fp);

//Eliminación del archivo en el servidor
unlink($archivo);
