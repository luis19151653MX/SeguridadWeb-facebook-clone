
# Project WeakEncryption- Facebook 
This project requires you to clone or rebuild any website of your choice, using **only HTML, CSS,JS & PHP**.

## Clone Project
1. From a Visual Studio Code terminal: cd path/to/directory (if using XAMPP, ensure it's in the htdocs directory).
2. Run: git clone https://github.com/luis19151653MX/SeguridadWeb-facebook-clone.git

## Open Project in the Browser
Don't forget to start the Apache and MySQL servers from XAMPP:
<br/> 
**URL**: http://localhost/SeguridadWeb-facebook-clone/


## Database Configuration
1. Create a MySQL database named "facebook."
2. Create the "usuarios" table using the following query:
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


# Vulnerability (file php register)
The current project, as it stands, registers users by encoding their information using base64 encoding algorithms. Strings encoded in this way can be easily compromised since the encoding can be easily reversed. For example, tools like base64decode.org (https://www.base64decode.org/) can be used for this purpose. Meanwhile, the password is stored using the MD5 encryption algorithm, which is relatively easy to crack using tools like John the Ripper.


# Vulnerability Resolution(AES & password hash(bycript) )
Change line 51 in the index file: <form class="form-login" id="registerForm" method="post" action="./php/register.php" style="display: none;" > to action="./php/secureRegister.php"

Change line 28 in the index file: <form class="form-login" id="loginForm" action="./php/login.php" method="post"> to action="./php/secureLogin.php"

These changes will allow sensitive fields to be stored with AES and passwords with password_hash()
password hash docs: https://www.php.net/manual/en/function.password-hash.php