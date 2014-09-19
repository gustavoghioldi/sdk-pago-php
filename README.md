# Decidir: SDK php
***
Conector en php con el SPS Decidir.

 * [Instalación](#instalacion)
 * [Uso](#uso)
 * [Ejemplo](#ejemplo)
 * [Modo test](#test)
 
<a name="instalacion"></a>
## Instalación
N/A

<a name="uso"></a>
## Uso
1.Inicializar la clase correspondiente al conector (DecidirConnector).
```php
$client = new DecidirConnector();
```

2.Solicitud de autorización
En este caso hay que llamar a getPaymentValues. 
```php
$values = $client->getPaymentValues($options);
```
$options debe ser un array con la siguiente estuctura:

```php
$options = array (
		'Merchant'=>'',
		'Session'=>'',
		'Security'=>'',
		'URL_OK'=>'http://susitio.com/paydecidir/ok', //url a la que desae sea devuleto el comprador cuando realize una transaccion exitosa
		'URL_ERROR'=>'http://susitio.com/paydecidir/error', //url a la que desae sea devuelto el comprador cuando no realice una transacción exitosa
		'EncodingMethod'=>'',
		'NROCOMERCIO' => '12345678', //Nro de comercio provisto por SPS-DECIDIR
		'NROOPERACION' => '00000012', //String mediante el cual el comercio identifica univocamente la transacción
		'MONTO' => '10998.00', //Importe en pesos de la transacción
		'CUOTAS' => '09', //Cantidad de coutas
		'MEDIODEPAGO' => '1', //la tabla de medios de pagos se encuentra al final de la documentación
		'EMAILCLIENTE' => 'cliente@cliente.com', //opcional
		'PARAMSITIO' => 'PARAM_SITIO', //opcional
		..............................
		);
```

El m&eacute;todo getPaymentValues devolvera un arreglo con los siguiente valores:
- StatusCode
- StatusMessage
- URL_Request
- RequestKey
- EncodingMethod
- Payload

3.Confirmación de transacción.
En este caso hay que llamar a queryPayment, enviando SessionID, RequestKey y AnswerKey. Este método devuelve el resumen de los datos de la transacción, para que puedan ser mostrados al cliente.

<a name="ejemplo"></a>
## Ejemplo
Existe un ejercicio de ejemplo en la carpeta del mismo nombre.

<a name="test"></a>
## Modo Test
Para utlilizar el modo test se debe pasar el valor FALSE en el constructor.

```php
$client = new DecidirConnector(FALSE);
```
