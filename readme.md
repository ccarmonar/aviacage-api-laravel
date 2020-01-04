## Servidor de PHP para el proyecto AviaCage
#### Laravel
Para ejecutar el server:

```bash
php artisan serve
```

Lista de rutas utiles:

| Metodo    |          URI           |        Nombre         | Controlador                                                  | 
|-----------|------------------------|---------------------|---------------------------------------------------------|
| GET_HEAD  | food                   | food.index          | App\Http\Controllers\Food\FoodController@index          | 
| POST      | food                   | food.store          | App\Http\Controllers\Food\FoodController@store          | 
| PUT_PATCH | food/{food}            | food.update         | App\Http\Controllers\Food\FoodController@update         | 
| DELETE    | food/{food}            | food.destroy        | App\Http\Controllers\Food\FoodController@destroy        | 
| GET_HEAD  | food/{food}            | food.show           | App\Http\Controllers\Food\FoodController@show           | 
| GET_HEAD  | food7                  | food.indexfood7     | App\Http\Controllers\Food\FoodController@indexfood7     | 
| GET_HEAD  | foodCantA              | food.indexcantidadA | App\Http\Controllers\Food\FoodController@indexcantidadA | 
| GET_HEAD  | foodCantD              | food.indexcantidadD | App\Http\Controllers\Food\FoodController@indexcantidadD | 
| GET_HEAD  | foodFechaA             | food.indexfechaA    | App\Http\Controllers\Food\FoodController@indexfechaA    | 
| GET_HEAD  | foodFechaD             | food.indexfechaD    | App\Http\Controllers\Food\FoodController@indexfechaD    | 
| GET_HEAD  | water                   | water.index          | App\Http\Controllers\Water\WaterController@index          | 
| POST      | water                   | water.store          | App\Http\Controllers\Water\WaterController@store          | 
| PUT_PATCH | water/{water}            | water.update         | App\Http\Controllers\Water\WaterController@update         | 
| DELETE    | water/{water}            | water.destroy        | App\Http\Controllers\Water\WaterController@destroy        | 
| GET_HEAD  | water/{water}            | water.show           | App\Http\Controllers\Water\WaterController@show           | 
| GET_HEAD  | water7                  | water.indexfood7     | App\Http\Controllers\Water\WaterController@indexfood7     | 
| GET_HEAD  | waterCantA              | water.indexcantidadA | App\Http\Controllers\Water\WaterController@indexcantidadA | 
| GET_HEAD  | waterCantD              | water.indexcantidadD | App\Http\Controllers\Water\WaterController@indexcantidadD | 
| GET_HEAD  | waterFechaA             | water.indexfechaA    | App\Http\Controllers\Water\WaterController@indexfechaA    | 
| GET_HEAD  | waterFechaD             | water.indexfechaD    | App\Http\Controllers\Water\WaterController@indexfechaD    | 
| GET_HEAD  | routine                | routine.index       | App\Http\Controllers\Routine\RoutineController@index    | 
| POST      | routine                | routine.store       | App\Http\Controllers\Routine\RoutineController@store    | 
| GET_HEAD  | routine/{routine}      | routine.show        | App\Http\Controllers\Routine\RoutineController@show     | 
| DELETE    | routine/{routine}      | routine.destroy     | App\Http\Controllers\Routine\RoutineController@destroy  | 
| GET_HEAD  | waterRoutine           | waterRoutine.index       | App\Http\Controllers\WaterRoutine\WaterRoutineController@index    | 
| POST      | waterRoutine           | waterRoutine.store       | App\Http\Controllers\WaterRoutine\WaterRoutineController@store    | 
| GET_HEAD  | waterRoutine/{waterRoutine}      | waterRoutine.show        | App\Http\Controllers\WaterRoutine\WaterRoutineController@show     | 
| DELETE    | waterRoutine/{waterRoutine}      | waterRoutine.destroy     | App\Http\Controllers\WaterRoutine\WaterRoutineController@destroy  | 
| GET_HEAD  | audio                  | audio.index         | App\Http\Controllers\Audio\AudioController@index        | 
| POST      | audio                  | audio.store         | App\Http\Controllers\Audio\AudioController@store        | 
| PUT_PATCH | audio/{audio}          | audio.update        | App\Http\Controllers\Audio\AudioController@update       | 
| GET_HEAD  | audio/{audio}          | audio.show          | App\Http\Controllers\Audio\AudioController@show         | 
| DELETE    | audio/{audio}          | audio.destroy       | App\Http\Controllers\Audio\AudioController@destroy      |


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

