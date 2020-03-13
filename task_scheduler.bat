D:
cd D:\Proyecto Feria\aviacage-api-laravel
:loop
php artisan schedule:run
timeout /t 45 /nobreak > nul
goto :loop