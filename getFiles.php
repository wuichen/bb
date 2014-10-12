<?php

$dir    = 'uploads';
$files = scandir($dir);

echo json_encode($files);


?>