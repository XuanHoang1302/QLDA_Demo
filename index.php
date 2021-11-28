<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./Controller/main.css">
    <title>Document</title>
</head>
<body>
    <?php
    $controller = filter_input(INPUT_GET,'controller');
    if(empty($controller)) $controller = 'index';
    $controller_name = $controller."_controller";
    
    require_once("Controller/{$controller_name}.php");
    $controller_object = new $controller_name();
    $controller_object->run();  
    ?>
</body>
</html>



