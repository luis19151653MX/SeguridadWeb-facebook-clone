
# Project WeakEncryption- Facebook 
This project requires you to clone or rebuild any website of your choice, using **only HTML, CSS,JS & PHP**.

## Clonar proyecto
1. Desde una terminal visual studio code: cd ruta/del/directorio(si usas xampp que este en htdocs)
2. git clone https://github.com/luis19151653MX/SeguridadWeb-facebook-clone.git

## Abrir proyecto en el navegador
No olvides encender el servidor apache y mysql desde xampp:
<br/> 
**URL**: http://localhost/SeguridadWeb-facebook-clone/


## Configuracion de la base de datos
1. Crear base de datos mysql llamada facebook. 
2. Crear la tabla usuarios, puedes usar la siguiente query:
<br />
CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    primer_nombre VARCHAR(50) NOT NULL,
    apellido_paterno VARCHAR(50) NOT NULL,
    numero_celular VARCHAR(20) NOT NULL,
    direccion VARCHAR(100) NOT NULL,
    sexo VARCHAR(10) NOT NULL,
    pais VARCHAR(50) NOT NULL,
    religion VARCHAR(50) NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    correo VARCHAR(100) NOT NULL UNIQUE
);


# Vulnerabilidad(archivo php/register)
El proyecto ejecutandolo como esta actualmente, registra usuarios codificando su informacion usando algotimos de codificacion base 64, las cadenas codificadas de esta forma pueden ser facilmente vulneradas, ya que se puede revertir facilmenete la codificacion. Por ejemplo se puede usar esta web:https://www.base64decode.org/
Mienstras que la contraseña se guarda con el algoritmo de encriptacion MD5, el cual es muy facil the crakear usando John the Ripper.