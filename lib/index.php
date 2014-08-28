<?php


$cliente = new SoapClient("https://200.69.248.51:8443/services/t/decidir.net/Authorize.AuthorizeHttpsSoap12Endpoint?wsdl");


$cliente_funciones = $cliente->__getFunctions();
$cliente_tipo = $cliente->__getTypes();

echo "<sub>tipos</sub><br />";
foreach ( $cliente_tipo as $tipo ) {
	print_r( $tipo );
	echo "<br />";
}

echo "<br />";
echo "funciones <br />";

foreach ( $cliente_funciones as $funciones ) {
	echo ( $funciones );
	echo "<br />";
}

$ojeto = new stdClass();

$ojeto->nombre = 'gustavo ghioldi';
$ojeto->apellido = 'ghioldi';

print_r($ojeto);

echo "<br />";

$array = json_decode(json_encode($ojeto), true);



