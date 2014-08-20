<?php
include_once '../lib/Decidir.php';

$array_parametros = array (
		'obligatorios' => array (
				'nro_comercio' => '',
				'nro_operacion' => '',
				'monto' => '',
				'cuotas' => '',
				'medio_de_pago' => '',
		),
		'opcionales'=> array(
				'email_cliente' => '',
				'param_sitio' => ''
		),
		'transacciones_distribuidas' => array (
				'nro_comercio' => '',
				'imp_dist' => '',
				'site_dist' => '',
				'id_modalidad' => '',
				'porcentaje' => ''  // pedir mas documentacion sobre este tema
				),
		'visa_adicional_opcional' => array (
				'tipo_doc' => '',
				'nro_doc' => '',
				'calle_entrega' => '',
				'nro_puerta' => '',
				'fecha_nacimiento' => '' 
		),
		'rapipago_pagofacil_adicionales' => array (
				'cod_p1' => '',
				'cod_p2' => '',
				'cod_p3' => '',
				'cod_p4' => '',
				'recargo' => '',
				'fecha_vto' => '',
				'cliente' => '',
				'titular' => '',
				'tipo_toc' => '',
				'nro_doc' => '' 
		),
		'pago_mis_cuentas' => array (
				'fecha_vto' => '' 
		),
		'nevada' => array (
				'id_plan' => '' 
		),
		'visa' => array (
				'vtex1x2x3x4' => '' 
		),
		'urls' => array (
				'url_ok' => '',
				'url_error' => '' 
		) 
);

$decidir = new Decidir($array_parametros);

print_r ($decidir->getPayload());

?>