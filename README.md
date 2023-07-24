# WP-Order-Shop-By-Terms
Ordenamos los productos de la tienda de woocommerce por un valor de term asignado.

Todo lo que hay que hacer es añadir el siguiente codigo al functions.php de nuestro tema.

Si queremos que este código se ejecute en en otras partes de la web que no sean la tienda, podemos añadir distintos condicionales en cada uno de los if que contiene las funciones.

```php

if (is_search() && is_shop() && !is_admin()){

    //Aqui el resto de código

}

```

