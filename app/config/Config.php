<?php
// Check if running in Docker
if (getenv('DB_HOST')) {
    // Docker environment
    define('BASEURL', 'http://localhost:8080');
    define('DB_HOST', getenv('DB_HOST') ?: 'mysql');
    define('DB_PORT', getenv('DB_PORT') ?: '3306');
    define('DB_USER', getenv('DB_USER') ?: 'simpati_user');
    define('DB_PASS', getenv('DB_PASS') ?: 'simpati_password');
    define('DB_NAME', getenv('DB_NAME') ?: 'simpati_trans');
} else {
    // Production environment
    define('BASEURL', 'https://tugas.koniwajo.com/public');
    define('DB_HOST', 'localhost');
    define('DB_PORT', '3307');
    define('DB_USER', 'konj4576_rental');
    define('DB_PASS', 'sembarangji');
    define('DB_NAME', 'konj4576_rental');
}

//DEFAULT CONTROLLER
define('CONTROLLER', 'Home');


//KONFIGURASI
// 1MB = 1000000
// 2MB = 2000000
define('UKURANFOTO', 1000000);

//ETC
define('APP_NAME', 'Simpati Trans');
define('APP_TYPE', 'RENT CAR');
define('APP_TAGLINE', 'Your rental car solution.');
define('alamat_usaha', 'Jl. Mesjid Raya No.80, Tombolo, Kec. Somba Opu, Kabupaten Gowa. Sulawesi-Selatan, Indonesia. ');
define('development', 'https://halowebapps.com');
define('halowebapps', 'Haloweb.');
define('website', 'https://simpatitrans.com');
define('phone', '0411 - 8985984 | Whatsapp : 0821-7773-3329');
define('email', 'cvjasasaudagar@gmail.com');
define('logo', '/img/assets/logonya.jpeg');
