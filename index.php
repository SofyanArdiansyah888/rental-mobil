<?php
// Lakukan redirect ke /public/auth
header("Location: public/auth");
exit(); // Penting untuk memastikan tidak ada kode PHP lain yang dieksekusi setelah header redirect