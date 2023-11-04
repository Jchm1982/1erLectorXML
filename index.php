<?php

//$myXMLData = 'ejemplo.xml';

//$xml = simplexml_load_file($myXMLData);

// Acceder a atributos en la raíz del XML
/*
$version = $xml['Version'];
$moneda = $xml['Moneda'];
$folio = $xml['Folio'];
$lugarExpedicion = $xml['LugarExpedicion'];
$exportacion = $xml['Exportacion'];
$metodoPago = $xml['MetodoPago'];
$formaPago = $xml['FormaPago'];
$subtotal = $xml['SubTotal'];
$descuento = $xml['Descuento'];
$total = $xml['Total'];
$tComprobante = $xml['TipoDeComprobante'];
$fecha = $xml['Fecha'];

echo "Version: $version<br>";
echo "Moneda: $moneda<br>";
echo "Folio: $folio<br>";
echo "Lugar de Expedición: $lugarExpedicion<br>";
echo "metodo de Pago: $metodoPago<br>";
echo "Forma Pago: $formaPago<br>";
echo "Subtotal: $subtotal<br>";
echo "Descuento: $descuento<br>";
echo "Tipo Comprobante: $tComprobante<br>";
echo "Fecha: $fecha<br><br>";
*/

/* Este es el que se debe descomentar 21-08-2023 (1)
echo "Namespaces Obtenidos de Comprobante: <br>";
$namespaces = $xml->getDocNamespaces(TRUE);
echo "NameSpace 1: ".$namespaces['cfdi']."<br>";
echo "NameSpace 2: ".$namespaces['xsi']."<br>";
echo "NameSpace 3: ".$namespaces['tfd']."<br><br><br>";


echo "<b>Datos del Emisor:</b> <br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$emisor = $xml->xpath('//x:Emisor');
*/


//echo "<pre>".print_r($resultado,1)."</pre>";
/*
for ($i = 0; $i <=0; $i++) {
    echo $resultado[$i]['Rfc'].'<br>';
    echo $resultado[$i]['Nombre'].'<br>';
    echo $resultado[$i]['RegimenFiscal'].'<br>';
}
*/

/* Este es el que se debe descomentar 21-08-2023 (2)
$rfcE = $emisor[0]['Rfc'];
$nombreE = $emisor[0]['Nombre'];
$rfiscalE = $emisor[0]['RegimenFiscal'];
echo "RFC: $rfcE <br>";
echo "Nombre Emisor: $nombreE <br>";
echo "R. Fiscal: $rfiscalE <br>";

echo  "<br><br>";
//var_dump($xml); 
//echo "<pre>".print_r($shopping_element,1)."</pre>";
echo "<b>Datos del Receptor:</b> <br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$receptor = $xml->xpath('//x:Receptor');
//echo "<pre>".print_r($receptor,1)."</pre>";
$rfcR = $receptor[0]['Rfc'];
$nombreR = $receptor[0]['Nombre'];
$usoCfdiR = $receptor[0]['UsoCFDI'];
$domicilioFiscal = $receptor[0]['DomicilioFiscalReceptor'];
$rfiscalR = $receptor[0]['RegimenFiscalReceptor'];
echo "RFC: $rfcR <br>";
echo "Nombre Emisor: $nombreR <br>";
echo "uso Cfdi: $usoCfdiR <br>";
echo "Domicilio Fiscal: $domicilioFiscal <br>";
echo "R. Fiscal: $rfiscalR <br>";
echo  "<br><br>";


echo "<b>Datos del Conceptos: </b><br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$conceptos = $xml->xpath('//x:Conceptos/x:Concepto');
//echo "<pre>".print_r($conceptos[1],1)."</pre>";

for ($i = 0; $i < count($conceptos); $i++) {
    $numero = $i+1;
    echo $numero.".- "."Clave Producto: ".$conceptos[$i]['ClaveProdServ']."-> No. Identificacion: ".$conceptos[$i]['NoIdentificacion']."-> Cantidad: ".$conceptos[$i]['Cantidad']."-> Clave Unidad: ".$conceptos[$i]['ClaveUnidad']."-> Unidad: ".$conceptos[$i]['Unidad']."-> Descripcion: ".$conceptos[$i]['Descripcion']."-> Valor Unitario: ".$conceptos[$i]['ValorUnitario']."-> Importe: ".$conceptos[$i]['Importe']."-> Objeto de Impuesto: ".$conceptos[$i]['ObjetoImp']."<br><br>";
    $numero++;
}

echo '<br><br>';

echo "<b>Datos Total de Impuestos Trasladados: </b><br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$impuestosTrasla = $xml->xpath('//x:Impuestos');


foreach ($impuestosTrasla as $value => $id) {
    //echo $value." -"."> ".$id['TotalImpuestosTrasladados']."<br>";
    if($id['TotalImpuestosTrasladados']!=''){
        echo "IVA -> ".$id['TotalImpuestosTrasladados'];
    }
}
echo  "<br><br>";
*/



/*
for($fila = 0; $fila < count($impuestosTrasla); $fila++) {
    echo $fila;
    echo $impuestosTrasla[$fila]."<br>";
    
    for ($columna = 0; $columna < count($impuestosTrasla[$fila]); $columna++) {
        echo  $columna['TotalImpuestosTrasladados'];
        echo "Valor -> ".$impuestosTrasla[$fila][$columna]."\n";
    }
    
}
*/


/* Este es el que se debe descomentar 21-08-2023 (3)
echo "<b>Impuestos traslados por partida: </b><br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$trasladosXpartida = $xml->xpath('//x:Impuestos/x:Traslados/x:Traslado');
echo "<pre>".print_r($trasladosXpartida,1)."</pre>";



echo "<b>Complemento: </b><br>";
$xml->registerXPathNamespace('y', $namespaces['tfd']);
$resultado = $xml->xpath('//y:TimbreFiscalDigital');
//echo "<pre>".print_r($resultado,1)."</pre>";
*/




?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Cargar un XML</h1>
    <div class="contenido"></div>
    <button type="button" id="botonX">Cargar API</button>
    <script src="index.js"></script>
    <div id="tabla">
        <table id="tablaLista" border="1">
            <thead>
                <tr>
                    <th>Emisor</th>
                    <th>Receptor</th>
                    <th>Productos</th>
                    <th>Impuestos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>
            </tbody>
            <a href="#" id="vaciar">Limpiar Ventana</a>
        </table>
    </div>
</body>
</html>