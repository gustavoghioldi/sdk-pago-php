<?php
include_once '../lib/Decidir.php';

$decidir = new Decidir(array (
			'datos_obligatorios' => array (
					'nombre' => 'gustavo',
					'apellido' => 'ghioldi' 
			),
			'datos_opcionales' => array ('dni'=>25724484) 
	));


echo $decidir->getPayload ();


