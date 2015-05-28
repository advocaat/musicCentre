<?php
try {
    $dat = new PDO("sqlite:data/database.sqlite");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>