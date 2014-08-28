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

$decidir = new DecidirConnector ();

print_r ( $decidir->getPaymentValues ( $options ) );
echo "<br />";

print_r ($decidir->queryPayment('1111', '2222', '3333'));
?>