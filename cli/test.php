<?php
var_dump(dirname(__DIR__));
exit();
$fichier = __DIR__.DIRECTORY_SEPARATOR.'demo.txt';
file_put_contents($fichier, 'Salut les gens');