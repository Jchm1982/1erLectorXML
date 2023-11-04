<?php 
/*
error_reporting(E_ALL);
ini_set('display_errors', '1');
$archivo = "ejemplo.xml";
*/



/*
//Validar si existe el archivo
if (!file_exists($archivo)) {
	exit("El archivo NO Existe");
}
 

 $xml = XMLReader::open($archivo);

 //echo "<html><body><table border=1>".
 //"<tr><th>titulo</th>";




 while ($xml->read()) {
     if ($xml->nodeType==XMLReader::ELEMENT && $xml->name ==="cfdi:Comprobante") {


     	echo "<pre>".print_r($xml,1)."</pre>";
     	

     	//$emisor = $xml->getAttribute("cfdi:Comprobante");

     	//echo "<tr><td>".$emisor."</td></tr>";
     	
     }
 }

 $xml->close();
 */

 /*
//Si funciono pero solo entrando a la primera seccion del XML
$file = 'ejemplo.xml';
//$code = 'archivo';
$xml = new DOMDocument;
$xml->load($file);
echo "<pre>".print_r($xml,1)."</pre>";
echo "<pre>".print_r($xml->xmlEncoding,1)."</pre>";
$xmlVersion = $xml->xmlVersion;
//echo $xmlVersion;
*/

/*
$myXMLData = 'ejemplo.xml';

$xml = simplexml_load_file($myXMLData);
$firstAttribute = $xml->attributes();
echo "<pre>".print_r($firstAttribute,1)."</pre><br>";


$secondAttribute = $xml->children();
echo "<pre>".print_r($secondAttribute,1)."</pre>";
*/


$myXMLData = 'ejemplo.xml';

$xml = simplexml_load_file($myXMLData);

// Acceder a atributos en la raíz del XML
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

echo "Namespaces Obtenidos: <br>";
$namespaces = $xml->getDocNamespaces(TRUE);
echo "NameSpace 1: ".$namespaces['cfdi']."<br>";
echo "NameSpace 2: ".$namespaces['xsi']."<br>";
echo "NameSpace 3: ".$namespaces['tfd']."<br><br><br>";


echo "Datos del Emisor: <br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$resultado = $xml->xpath('//x:Emisor');
//echo "<pre>".print_r($resultado,1)."</pre>";
/*
for ($i = 0; $i <=0; $i++) {
    echo $resultado[$i]['Rfc'].'<br>';
    echo $resultado[$i]['Nombre'].'<br>';
    echo $resultado[$i]['RegimenFiscal'].'<br>';
}
*/
$rfc = $resultado[0]['Rfc'];
$nombre = $resultado[0]['Nombre'];
$rfiscal = $resultado[0]['RegimenFiscal'];
echo "RFC: $rfc <br>";
echo "Nombre Emisor: $nombre <br>";
echo "R. Fiscal: $rfiscal <br>";

echo  "<br><br>";
//var_dump($xml); 
//echo "<pre>".print_r($shopping_element,1)."</pre>";
echo "Datos del Receptor: <br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$resultado = $xml->xpath('//x:Receptor');
$rfc = $resultado[0]['Rfc'];
$nombre = $resultado[0]['Nombre'];
$rfiscal = $resultado[0]['RegimenFiscal'];
echo "RFC: $rfc <br>";
echo "Nombre Emisor: $nombre <br>";
echo "R. Fiscal: $rfiscal <br>";

echo "Datos del Conceptos: <br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$resultado = $xml->xpath('//x:Conceptos/x:Concepto');
//echo "<pre>".print_r($resultado,1)."</pre>";

echo "Datos TotalImpuestosTrasladados: <br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$resultado = $xml->xpath('//x:Impuestos');
//echo "<pre>".print_r($resultado,1)."</pre>";


echo "Impuestos traslado: <br>";
$xml->registerXPathNamespace('x', 'http://www.sat.gob.mx/cfd/4');
$resultado = $xml->xpath('//x:Impuestos/x:Traslados/x:Traslado');
//echo "<pre>".print_r($resultado,1)."</pre>";

echo "Complemento: <br>";
$xml->registerXPathNamespace('y', $namespaces['tfd']);
$resultado = $xml->xpath('//y:TimbreFiscalDigital');
echo "<pre>".print_r($resultado,1)."</pre>";

/*
// Acceder a los nodos hijos con namespace

$emisor = $xml->children('cfdi', true)->Emisor;
$receptor = $xml->children('cfdi', true)->Receptor;

// Acceder a los atributos de los nodos hijos
$rfcEmisor = $emisor['Rfc'];
$nombreEmisor = $emisor['Nombre'];

$rfcReceptor = $receptor['Rfc'];
$nombreReceptor = $receptor['Nombre'];

echo "RFC Emisor: $rfcEmisor<br>";
echo "Nombre Emisor: $nombreEmisor<br>";

echo "RFC Receptor: $rfcReceptor<br>";
echo "Nombre Receptor: $nombreReceptor<br>";
*/
?> 
