Vagrant.configure("2") do |config|
  
  config.vm.box = "ubuntu/xenial64"
  config.vm.hostname = "server-virtual-t7-sisin"
  config.vm.network "private_network" , ip:"192.168.55.106"
  config.vm.synced_folder "." , "/tarea_t7_rodrigo"

  config.vm.provider "virtualbox" do |vb|
    config.vb.memory = "1024"
    config.vb.memory = 2
  end


  config.vm.provision "shell", inline: <<-SHELL
      #0 | Actualizamos repositortios de Ubuntu
      sudo apt update

      #1 | Instalamos mySQL en Ubuntu
      sudo apt install mysql-server

      #2 | Instalamos  el servidor web nginx en Ubuntu (-y para confirmar)
      sudo apt install -y nginx

      #3 | Instalamos el driver mysqli para poder conectar mySQL con PHP (-y para confirmar)
      sudo apt install -y php php-mysqli

      #4 | Instalamos API de tipo RESTful
      sudo apt-get install php7.0-fpm

      sudo sed -i 's|root /var/www/html;|root /tarea_t7_rodrigo;|' /etc/nginx/sites-enabled/default

      sudo sed -i '/root \/tarea_t7_rodrigo;/a \
    location \/backend\/ { \
           include fastcgi_params; \
           fastcgi_param REQUEST_METHOD $request_method; \
           fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; \
           fastcgi_pass unix:/var/run/php/php7.0-fpm.sock; \
        }' /etc/nginx/sites-enabled/default

      sudo systemctl restart nginx

      echo "-- Insercción BBDD tarea SISIN Tema 7" > /vagrant/datos_tarea.sql

      echo "create databases bbdd_tarea;" >> /vagrant/datos_tarea.sql

      echo "use bbdd_tarea;" >> /vagrant/datos_tarea.sql

      echo "create table empleados(
        idEmpleado int auto_increment,
        nombre varchar2(25),
        apellido varchar2(25),
        edad int,
        salario(7,2),
        departamento varchar2(50));" >> /vagrant/datos_tarea.sql

      echo "insert into empleados(nombre,apellido,edad,salario,departamento)VALUES" >> /vagrant/datos_tarea.sql
      echo "('Miguel','Cueto',30,2500.00,'Ventas')," >> /vagrant/datos_tarea.sql
      echo "('Manolo','Alonso',33,1250.00,'Marketing')," >> /vagrant/datos_tarea.sql
      echo "('Raquel','Carril',25,2200.00,'Desarrollo')," >> /vagrant/datos_tarea.sql
      echo "('Teresa','Molina',43,1400.00,'Ventas')," >> /vagrant/datos_tarea.sql
      echo "('Pepe','Couce',55,1350.00,'Ventas');" >> /vagrant/datos_tarea.sql
      

      # Instalación de los binarios de PHP, el driver mysqli y la extensión FPM para realizar peticiones de tipo RESTful
     

      # Generar archivo SQL con los registros de los diferentes Módulos Profesionales
      

  SHELL

end
