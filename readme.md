## Servidor de PHP para el proyecto AviaCage

Para ejecutar el server:

```bash
php artisan serve
```

Lista de rutas utiles:

| Method    |          URI           |        Name         | Action                                                  | Middleware |
|-----------|------------------------|---------------------|---------------------------------------------------------|------------|
| GET_HEAD  | food                   | food.index          | App\Http\Controllers\Food\FoodController@index          | api        |
| POST      | food                   | food.store          | App\Http\Controllers\Food\FoodController@store          | api        |
| PUT_PATCH | food/{food}            | food.update         | App\Http\Controllers\Food\FoodController@update         | api        |
| DELETE    | food/{food}            | food.destroy        | App\Http\Controllers\Food\FoodController@destroy        | api        |
| GET_HEAD  | food/{food}            | food.show           | App\Http\Controllers\Food\FoodController@show           | api        |
| GET_HEAD  | food7                  | food.indexfood7     | App\Http\Controllers\Food\FoodController@indexfood7     | api        |
| GET_HEAD  | foodCantA              | food.indexcantidadA | App\Http\Controllers\Food\FoodController@indexcantidadA | api        |
| GET_HEAD  | foodCantD              | food.indexcantidadD | App\Http\Controllers\Food\FoodController@indexcantidadD | api        |
| GET_HEAD  | foodFechaA             | food.indexfechaA    | App\Http\Controllers\Food\FoodController@indexfechaA    | api        |
| GET_HEAD  | foodFechaD             | food.indexfechaD    | App\Http\Controllers\Food\FoodController@indexfechaD    | api        |
| GET_HEAD  | routine                | routine.index       | App\Http\Controllers\Routine\RoutineController@index    | api        |
| POST      | routine                | routine.store       | App\Http\Controllers\Routine\RoutineController@store    | api        |
| GET_HEAD  | routine/{routine}      | routine.show        | App\Http\Controllers\Routine\RoutineController@show     | api        |
| DELETE    | routine/{routine}      | routine.destroy     | App\Http\Controllers\Routine\RoutineController@destroy  | api        |



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