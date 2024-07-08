## License

Pues la licencia de Windos y Macos que me permiten usar la compu, pero bueno
Este es un repositorio para que usen de ejemplo para su proyecto

Actualmente cuenta con un CRUD simple con el objeto DB
Mail por medio de Gmail
Excel exportación

En clase se ira explicando pero no es una exigencia para su proyecto, que envie correos o descargue en excel
el CRUD (Create Read Update Delete) si ya sea por modelo o insercion(query) en DB

## Que cosas necesitas
php artisan storage:link 
Para tener el link interno para las imagenes

ejecutar el sql en resources/sql

tener en el .env los datos para la conexion a mysql
sobre todo el nombre de la base de datos db_sample

composer require maatwebsite/excel
php artisan vendor:publish --provider="Maatwebsite\Excel\ExcelServiceProvider"
