Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/xenial64"
  config.vm.hostname = "server-virtual-t7-sisin"
  config.vm.network "private_network" , ip:"192.168.55.106"
  config.vm.synced_folder "." , "/tarea_t7_rodrigo"

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
    vb.cpus = 2
  end


  config.vm.provision "shell", inline: <<-SHELL
      #0 | Actualizamos repositortios de Ubuntu
      sudo apt update

      #1 | DESDE TERMINAL --> Instalamos mySQL en Ubuntu (-y para confirmar) 
      #  sudo apt install -y mysql-server

      #2 | Instalamos  el servidor web nginx en Ubuntu (-y para confirmar)
      sudo apt install -y nginx

      #3 | Instalamos el driver mysqli para poder conectar mySQL con PHP (-y para confirmar) 
      sudo apt install -y php php-mysqli

      #4 | Instalamos API de tipo RESTful  
      sudo apt-get install php7.0-fpm

     

      #5 | MYSQL --> Creamos BB

      #6 | Creamos archivo .sql con toda la creación de la BBDD, y cada nueva instrucción la redireccionamos al archivo .sql
      echo "-- Insercción BBDD tarea SISIN Tema 7" > /home/vagrant/datos_tarea.sql

      echo "create database bbdd_tarea;" >> /home/vagrant/datos_tarea.sql

      echo "use bbdd_tarea;" >> /home/vagrant/datos_tarea.sql

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


      #7 | Conectamos el archivo .sql con la BBDD
      #   source /home/vagrant/datos_tarea.sql

      #8 | DESDE TERMINAL --> En el archivo de configuración de Nginx, cambiamos a través de nano, el directorio raíz por la ruta de la carpeta sincronizada, y añadimos códido ( location \/backend\/ { \ (...))
      #  sudo nano /etc/nginx/sites-enabled/default
      #       root /tarea_t7_rodrigo

      #9 | DESDE TERMINAL --> Mejorar las solicitudes en el directorio /backend del proyecto
      #     location /backend/ {
      #       include fastcgi_params;
      #       fastcgi_param REQUEST_METHOD $request_method;
      #       fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
      #       fastcgi_pass unix:/var/run/php/php7.0-fpm.sock;
      #       }
      

      #10 | DESDE TERMINAL --> Reiniciamos Nginx para aplicar los cambios del root en su archivo de configuración
      #   sudo systemctl restart nginx

      # Instalación de los binarios de PHP, el driver mysqli y la extensión FPM para realizar peticiones de tipo RESTful
     

      # Generar archivo SQL con los registros de los diferentes Módulos Profesionales
      

  SHELL

end
