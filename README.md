## Database

Criar database "prova_prog";

## Comandos

```php
composer install;
composer update;
--modificar nome do env
php artisan key:generate;
php artisan migrate;
php artisan storage:link; ->links simbólicos
```

## Arquivos modificados

```php

app\Http\Controllers\ProductsController.php -> em inglês, pois já existia a controller Produtos

app\Models\Product.php -> também já existia a model Produto

routes\web.php

resources\views\galeria -> views criadas

database\migrations\2022_01_13_074916_create_products_table.php

config\filesystems.php -> criação de novo disco para imagens da galeria
```
