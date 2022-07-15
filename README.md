<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## Configuraciones iniciales previas al despliegue



=> En Linux:

Se puede instalar apache o nginx

 Instalar composer de manera global => (https://linuxize.com/post/how-to-install-and-use-composer-on-ubuntu-20-04/) 

 Instalar php => $ sudo apt-get install -y php8.0
 
 Instalar complementos de php => sudo apt-get install -y php8.0-{bcmath,bz2,intl,gd,mbstring,curl,zip,common,xml,pgsql}

Reiniciar servicio apache o nginx


=> En windows:

Se instala el ejecutable de composer 

Se instala el ejecutable xampp o ngnix


# Despliegue

- Se debe clonar el proyecto del repositorio https://github.com/felixceinfes/enlazaa-backend_curso.git
- $ git clone https://github.com/felixceinfes/enlazaa-backend_curso.git
- Entrar a la carpeta del proyecto => cd enlazaa-backend_curso
- Ejecutar el gestor de paquetes de php => composer install
- ##### En linux: dar permisos de escritura lectura al usuario para acceder a la carpeta storage 
=>$ sudo -R o+rw storage/

- crear el archivo .env y copiar el contenido que aparece al final de esta guía
- Una vez copiado el contenido ejecutar los siguientes comandos

    => php artisan config:cache
    
    => php artisan cache:clear
    
    => php artisan route:clear
    

# Base de datos

Para configurar base de datos se debe cambiar las variables en el archivo .env.  Se puede configurar cualquier base de datos, los diferentes drivers son (pgsql, mysql, sqlsrv)

DB_CONNECTION=pgsql 

DB_HOST=localhost

DB_PORT=5432

DB_DATABASE=xxxxxxxx

DB_USERNAME=xxxxxxxx

DB_PASSWORD='xxxxxx'



## Contenido del archivo .env
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:rIfv2uWmdSwpszXky4jagi3ZVUr13ebc6ncyqz6cO1I=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=xxxxxx
DB_USERNAME=xxxxxxxxx
DB_PASSWORD='xxxxxxx'

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

JWT_SECRET=6343x8fQdgXIwG0B2kkBpX2kPkKhQWHBhjCyV8yH3l8dqLb8cfVi9rlJlMfkaEjx

JWT_ALGO=HS256


