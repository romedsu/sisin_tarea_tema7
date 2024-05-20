# Práctica del Tema 7 - EXPLOTACIÓN DE APLICACIONES INFORMÁTICAS
### https://github.com/romedsu/sisin_tarea_tema7

**Autor** : Rodrigo Medina

## 1 | Configuración del Vagrantfile  (Cabecera y provisión)

### 1.1 | Actualizamos repositortios de Ubuntu
      sudo apt update

### 1.2 | Instalamos  el servidor web Nginx en Ubuntu (-y para confirmar)
      sudo apt install -y nginx

### 1.3 | Instalamos el driver mysqli para poder conectar mySQL con PHP (-y para confirmar) 
      sudo apt install -y php php-mysqli

### 1.4 | Instalamos API de tipo RESTful  
      sudo apt-get install php7.0-fpm

### 1.5 | Reinciciamos Nginx
      sudo systemctl restart nginx
  
### 1.6 | Creamos archivo .sql con toda la creación de la BBDD, y cada nueva instrucción la redireccionamos al archivo .sql
      echo "-- Insercción BBDD tarea SISIN Tema 7" > /home/vagrant/datos_tarea.sql

      echo "create database gestion_modulos_profesionales;" >> /home/vagrant/datos_tarea.sql

      echo "use gestion_modulos_profesionales;" >> /home/vagrant/datos_tarea.sql

      echo "create table empleados(
        idEmpleado int auto_increment  primary key,
        nombre varchar(25),
        apellido varchar(25),
        edad int,
        salario decimal(7,2),
        departamento varchar(50))auto_increment = 21;" >> /home/vagrant/datos_tarea.sql

      echo "insert into empleados(nombre,apellido,edad,salario,departamento)VALUES" >> /home/vagrant/datos_tarea.sql
      echo "('Miguel','Cueto',30,2500.00,'Ventas')," >> /home/vagrant/datos_tarea.sql
      echo "('Manolo','Alonso',40,2000.00,'Desarrollo')," >> /home/vagrant/datos_tarea.sql
      echo "('Raquel','Carril',50,1000.00,'Ventas')," >> /home/vagrant/datos_tarea.sql
      echo "('Teresa','Molina',10,2400.00,'Marketing')," >> /home/vagrant/datos_tarea.sql
      echo "('Pepe','Couce',20,2500.00,'Ventas');" >> /home/vagrant/datos_tarea.sql

## 2 | Configuración desde terminal

### 2.1 | DESDE TERMINAL --> Instalamos mySQL en Ubuntu (-y para confirmar) 
      sudo apt install -y mysql-server
      password: root

### 2.2 | DESDE TERMINAL --> Entramos en mySQL
      mysql -u root -p


### 2.3 | mySQL --> Conectamos el archivo .sql con la BBDD
        source /home/vagrant/datos_tarea.sql

### 2.4 | DESDE TERMINAL --> En el archivo de configuración de Nginx, cambiamos a través de nano, el directorio raíz por la ruta de la carpeta sincronizada.
        sudo nano /etc/nginx/sites-enabled/default
             root /tarea_t7_rodrigo;

### 2.5 | DESDE TERMINAL --> Mejorar las solicitudes en el directorio /backend del proyecto. Añadimos código debajo del punto anterior
           location /backend/ {
             include fastcgi_params;
             fastcgi_param REQUEST_METHOD $request_method;
             fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
             fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
             }
      

### 2.6 | DESDE TERMINAL --> Reiniciamos Nginx para aplicar los cambios del root en su archivo de configuración
        sudo systemctl restart nginx

## 3 | Configuración del Frontend y Backend

### 3.1 | Configuración del index.html

### 3.2 | Configuración de conexionBBDD.php --> **(/backend)**

### 3.3 | Configuración de JavaScript (script en index.html) 
 const urlObtenerHorario = 'http://192.168.55.106/backend/conexionBBDD.php'

### 3.4 | Configuración CSS --> **(/fronted/css)**

