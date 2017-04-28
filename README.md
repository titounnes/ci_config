# CI_BaseConfig

CI_BaseConfig merupakan turunan dari CI-3 denagn basis config. 

CI_BaseConfig menyertakan generate config dengan menggnakan PHP-CLI

Untuk menggunakan FW ini, unduh dan letakkan di directory projecy anda, msalkan /usr/share/app/
Arahkan document root ke /usr/share/app/ci_config/public

Buat database misal ci_config
Import database dengan perintah mysql ci_config < reg_snkpk.sql -u[user] -p

Untuk generate config form

php index.php generate module foo bar -f
pada directory application/controllers akan dibuat controller Foo.php
pada directory application/config akan dibuat directory foo
pada directory application/config/foo akan dibuat file bar.php

Selanjutnya kita hanya mengisi data pada config bar.php dan mengatur session di method __construct pada controller Foo.php 