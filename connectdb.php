//establish database connection
try{
    $dat = new PDO("sqlite:musiccentredb.sqlite");
}
catch(PDOException $e){
    echo e->getMessage();
}
?>