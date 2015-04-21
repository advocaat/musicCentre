<?php
try {
    $dat = new PDO("sqlite:database.sqlite");
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>