## BACKEND

Comandos para correr proyecto - *backend*:

Ingresar a carpeta backend

- ejecutar *composer install* (para instalar las dependencias).
- ejecutar *cp .env.example .env* (para copiar lo que hay en .env.example y crear un archivo con el mismo contenido llamado .env).
- Asegurarse de tener la DB creada.
- ejecutar *php artisan migrate*.
- ejecutar *php artisan db:seed --class=DatabaseSeeder*.
- finalmente utilizar el comando *php artisan serve*.

## FRONTEND

Ingresar a carpeta frontend

Comandos para correr proyecto - *frontend*:

- ejecutar comando *npm install*.
- ejecutar *npm start*.