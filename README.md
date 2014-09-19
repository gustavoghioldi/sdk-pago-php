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
$options = array (
		'NROCOMERCIO' => '12345678',
		'NROOPERACION' => '00000012',
		'MONTO' => '10998.00',
		'CUOTAS' => '09',
		'MEDIODEPAGO' => '1',
		'EMAILCLIENTE' => 'cliente@cliente.com', //opcional
		'PARAMSITIO' => 'PARAM_SITIO', //opcional
		..............................
		);

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
