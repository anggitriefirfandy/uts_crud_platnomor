<?php
session_start();

$conn_str = "host= hansken.db.elephantsql.com " .
    "port=5432 " .
    "user=uenwrgcd " .
    "dbname=uenwrgcd " .
    "password=q6R9aPMcYGZMGlSG8vi8wnJ628W13LIu";
$conn = pg_connect($conn_str);

?>
