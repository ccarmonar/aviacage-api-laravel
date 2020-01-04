## Servidor de PHP para el proyecto AviaCage
#### Laravel
Para ejecutar el server:

```bash
php artisan serve
```

Lista de rutas utiles:

| Method    |          URI           |        Name         | Action                                                  | Middleware |
|-----------|------------------------|---------------------|---------------------------------------------------------|------------|
| <sub>GET_HEAD</sub>  | food                   | food.index          | App\Http\Controllers\Food\FoodController@index          | api        |
| POST      | food                   | food.store          | App\Http\Controllers\Food\FoodController@store          | api        |
| PUT_PATCH | food/{food}            | food.update         | App\Http\Controllers\Food\FoodController@update         | api        |
| DELETE    | food/{food}            | food.destroy        | App\Http\Controllers\Food\FoodController@destroy        | api        |
| GET_HEAD  | food/{food}            | food.show           | App\Http\Controllers\Food\FoodController@show           | api        |
| GET_HEAD  | food7                  | food.indexfood7     | App\Http\Controllers\Food\FoodController@indexfood7     | api        |
| GET_HEAD  | foodCantA              | food.indexcantidadA | App\Http\Controllers\Food\FoodController@indexcantidadA | api        |
| GET_HEAD  | foodCantD              | food.indexcantidadD | App\Http\Controllers\Food\FoodController@indexcantidadD | api        |
| GET_HEAD  | foodFechaA             | food.indexfechaA    | App\Http\Controllers\Food\FoodController@indexfechaA    | api        |
| GET_HEAD  | foodFechaD             | food.indexfechaD    | App\Http\Controllers\Food\FoodController@indexfechaD    | api        |
| GET_HEAD  | water                   | water.index          | App\Http\Controllers\Water\WaterController@index          | api        |
| POST      | water                   | water.store          | App\Http\Controllers\Water\WaterController@store          | api        |
| PUT_PATCH | water/{water}            | water.update         | App\Http\Controllers\Water\WaterController@update         | api        |
| DELETE    | water/{water}            | water.destroy        | App\Http\Controllers\Water\WaterController@destroy        | api        |
| GET_HEAD  | water/{water}            | water.show           | App\Http\Controllers\Water\WaterController@show           | api        |
| GET_HEAD  | water7                  | water.indexfood7     | App\Http\Controllers\Water\WaterController@indexfood7     | api        |
| GET_HEAD  | waterCantA              | water.indexcantidadA | App\Http\Controllers\Water\WaterController@indexcantidadA | api        |
| GET_HEAD  | waterCantD              | water.indexcantidadD | App\Http\Controllers\Water\WaterController@indexcantidadD | api        |
| GET_HEAD  | waterFechaA             | water.indexfechaA    | App\Http\Controllers\Water\WaterController@indexfechaA    | api        |
| GET_HEAD  | waterFechaD             | water.indexfechaD    | App\Http\Controllers\Water\WaterController@indexfechaD    | api        |
| GET_HEAD  | routine                | routine.index       | App\Http\Controllers\Routine\RoutineController@index    | api        |
| POST      | routine                | routine.store       | App\Http\Controllers\Routine\RoutineController@store    | api        |
| GET_HEAD  | routine/{routine}      | routine.show        | App\Http\Controllers\Routine\RoutineController@show     | api        |
| DELETE    | routine/{routine}      | routine.destroy     | App\Http\Controllers\Routine\RoutineController@destroy  | api        |
| GET_HEAD  | waterRoutine           | waterRoutine.index       | App\Http\Controllers\WaterRoutine\WaterRoutineController@index    | api        |
| POST      | waterRoutine           | waterRoutine.store       | App\Http\Controllers\WaterRoutine\WaterRoutineController@store    | api        |
| GET_HEAD  | waterRoutine/{waterRoutine}      | waterRoutine.show        | App\Http\Controllers\WaterRoutine\WaterRoutineController@show     | api        |
| DELETE    | waterRoutine/{waterRoutine}      | waterRoutine.destroy     | App\Http\Controllers\WaterRoutine\WaterRoutineController@destroy  | api        |
| GET_HEAD  | audio                  | audio.index         | App\Http\Controllers\Audio\AudioController@index        | api        |
| POST      | audio                  | audio.store         | App\Http\Controllers\Audio\AudioController@store        | api        |
| PUT_PATCH | audio/{audio}          | audio.update        | App\Http\Controllers\Audio\AudioController@update       | api        |
| GET_HEAD  | audio/{audio}          | audio.show          | App\Http\Controllers\Audio\AudioController@show         | api        |
| DELETE    | audio/{audio}          | audio.destroy       | App\Http\Controllers\Audio\AudioController@destroy      | api        |


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

#### Task
Para ejecutar las tareas de forma automatica es necesario crear un cronjob. Esto es en Linux. En windows puede usarse Task Manager pero al menos a mi no me funciono xd.

Para crear cronjob
```bash
crontab -e
```
Elegir el editor que se prefiera. Gracias a Laravel Scheduler, un solo cronjob puede ejecutar varias Tasks. Basta con agregar:
```
* * * * * cd <ubicacion del proyecto> && php artisan schedule:run 1>> /dev/null 2>&1
```

Para ver cronjobs activos:
```bash
crontab -l
```

Para deshabilitar el cronjob basta con comentarlo al comienzo con un #.

Si desea probar tareas de forma unitaria, en la carpeta del proyecto utilizar:
```bash
php artisan schedule:run
```





#### Git

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

#### Ejemplos de JSON's para testear:

Ejemplo POST para ruta /food o ruta /water:
```
{
	"cantidad" : 111,
	"fechaFormato": "2019-09-24",
	"hora": "22:25:00"
}
```

Ejemplo POST para ruta /routine o ruta /waterRoutine:
```
{
	"cantidad" : 100,
	"hora" : "22:21:00",
	"dias" : ["lunes","martes","miercoles","jueves"]
}
```

