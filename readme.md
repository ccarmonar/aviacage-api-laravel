## Servidor de PHP para el proyecto AviaCage

Para ejecutar el server:

```bash
php artisan serve
```


Para realizar migraciones y seeder (reiniciar DB):

```bash
php artisan migrate:refresh --seed
```

Para crear controladores:
```bash
php artisan make:controller <Nombre>/<Nombre>Controller -r -m <Nombre>
```

Para crear modelos:
```bash
php artisan make:model Routine -m
```


Base de datos alojada en https://console.clever-cloud.com
