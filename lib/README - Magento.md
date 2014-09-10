# Decidir - Magento
---
Este módulo agrega las funcionalidades de Decidir en Magento.

* [Instalación](#instalacion)
* [Como funciona](#uso)
* [Configuración](#config)

#### Este módulo incluye
* Checkout exprés
* Checkout estándar

<a name="uso"></a>
## Como funciona
Dentro del carrito existe un botón con la leyenda "comprar". Cuando esto sucede, se abre una ventana, en la cual el cliente puede ingresar su código postal, para que el módulo de shipping pueda calcular el costo del envío. Una vez que se elige una forma de envío, se genera una orden, para luego redirigir a la página de checkout, permitiendo al cliente hacer el pago. Una vez que el pago está hecho, se puede llenar la información correspondiente al domicilio de entrega del pedido. La tienda recibirá el nombre del cliente relacionado a la orden, mientras que el cliente recibe un mail notificándole del pago efectuado y asegurándose que la orden no se pierda.
 
##### Deshabilitación de checkout exprés
Se realiza desde el administrador de tiendas.

---

<a name="instalacion"></a>
## Instalación:

1. Copiar las carpetas **app**, **skin** y **js** en la carpeta raíz de Magento. La estructura de las carpetas debe quedar intacta.
2. En el panel de administración ir a **System > Cache Management** y limpiar todas las caches.
3. Ir a **System > Index Managment**, seleccionar todos los ítems, y seleccionar la opción **Reindex Data**.

---

<a name="config"></a>
## Configuración
N/A