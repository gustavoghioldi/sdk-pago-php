# Decidir: SDK php
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
		'NROCOMERCIO' => '12345678', //Nro de comercio provisto por SPS-DECIDIR
		'NROOPERACION' => '00000012', //String mediante el cual el comercio identifica univocamente la transacción
		'MONTO' => '10998.00', //Importe en pesos de la transacción
		'CUOTAS' => '09', //Cantidad de coutas
		'MEDIODEPAGO' => '1', 
		'EMAILCLIENTE' => 'cliente@cliente.com', //opcional (#emailcliente)
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
