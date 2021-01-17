# Escuela backend

<!-- ABOUT THE PROJECT -->
## Sobre el proyecto

Api de gestión de alumnos de una escuela


### Hecho con

* [Laravel](https://laravel.com)


<!-- GETTING STARTED -->
## Cómo empezar

Para poner funcionar la aplicación sigue los siguientes pasos

### Prerrequisitos

* [Composer](https://getcomposer.org/)
* [Docker y docker-compose](https://www.docker.com/get-started)

### Instalación

1. Clona el repositorio
   ```sh
   git clone https://github.com/aaron-velasco/Escuela-backend.git
   ```

2. Copia .env.example a un archivo con nombre .env

3. Instala las dependencias de composer
 ```sh
   composer install
   ```

4. Construye la imagen de docker
   ```sh
   docker-compose build app
   ```

5. Construye la imagen de docker
   ```sh
   docker-compose build-app
   ```

6. Arranca los contenedores de la aplicación
   ```sh
   docker-compose up -d
   ```

7. Genera la clave de la aplicación
   ```sh
   docker-compose exec app php artisan key:generate
   ```

8. Genera la clave de seguridad para JWT
   ```sh
   docker-compose exec app php artisan jwt:secret
   ```

9. Realiza las migraciones de la base de datos
   ```sh
   docker-compose exec app php artisan migrate
   ```

## Testing

Para ejecutar los tests de la aplicación Laravel usa el comando:
   ```sh
   docker-compose exec app php artisan test
   ```



<!-- USAGE EXAMPLES -->
## Uso

Para acceder a laAPI, accede a la url de la aplicación a través del puerto 8000, por ejemplo:
   ```
   http://localhost:8000
   ```

Para acceder a la documentación en Swagger UI de la API, accede a la url de la aplicación a través del puerto 8080, por ejemplo:
   ```
   http://localhost:8080
   ```

A mayores hay un archivo de postman en el repositorio para hacer pruebas.

