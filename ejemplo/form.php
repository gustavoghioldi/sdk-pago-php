<?php
include_once '../lib/Decidir.php';

$options = array (
'nrocomercio' => 'NRO_COMERCIO',
'nrooperacion' => 'NRO_OPERACION',
'monto' => 'MONTO',
'cuotas' => 'CUOTAS',
'mediodepago' => 'MEDIO_DE_PAGO',
'emailcliente' => 'EM@AIL.COM',
'paramsitio' => 'PARAM_SITIO',
'impdist' => '',
'sitedist' => '',
'idmodalidad' => '',
'porcentaje' => '',
'nrodoc' => '',
'calleentrega' => '',
'nropuerta' => '',
'fechanacimiento' => '',
'codp1' => '',
'codp2' => '',
'codp3' => '',
'codp4' => '',
'recargo' => '',
'fechavto' => '',
'cliente' => '',
'titular' => '',
'tipotoc' => '',
'nrodoc' => '',
'fechavto' => '',
'idplan' => '',
'vtex1x2x3x4' => '',
'url_ok' => '',
'url_error' => '',
'encodingmethod' => 'AHHHH'
);
// ini_set ( 'default_socket_timeout', 1200 );
// ini_set ( 'max_execution_time', 1000 ); // just put a lot of time
// ini_set ( 'default_socket_timeout', 1000 ); // same
// ini_set ( 'soap.wsdl_cache_enabled', 0 );

// $localCert = ("http://127.0.0.1/sdk-pago-php/ejemplo/certificado.pem");
// $wsdl = 'Authorize.wsdl';
// $client = new SoapClient ( $wsdl, array (
// 		"connection_timeout" => 1000,
// 		'local_cert' => $localCert,
// 		'style' => SOAP_DOCUMENT,
// 		'use' => SOAP_LITERAL,
// 		'location' => 'https://200.69.248.51:8443/services/t/decidir.net/Authorize',
// 		'encoding' => 'UTF-8', 
// 		'proxy_host' => '192.168.0.17',
// 		'proxy_port' => 8080
// // 'proxy_login' => 'gghioldi',
// // 'proxy_password' => '1270pesecin'
// ) );

// var_dump ( $client->AuthorizeRequest ( array (
// 		'SessionID' => '025',
// 		'EncodingMethod' => 'UTF-8',
// 		'URL_ERROR' => 'http://www.google.com',
// 		'URL_OK' => 'http://www.yahoo.com.ar',
// 		'Payload' => '<cosas>lala</cosas>' 
// )
//  ) );

$client = new DecidirConnector();
$values = $client->getPaymentValues($options);
header("Location:".$values['URL_Request']);
?>