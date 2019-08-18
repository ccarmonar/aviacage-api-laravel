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


Base de datos hosteada en https://console.clever-cloud.com



Para guardar en git:
1) primero actualizar
```bash
git pull
```
2) adding
```bash
git add .
```
3) commit
```bash
git commit -m "<info>"
```


4) push a git
```bash
git push --set-upstream origin master --force
```

5) push a heroku
```bash
git push heroku master
```