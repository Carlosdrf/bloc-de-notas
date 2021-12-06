<?php
$msg = null;

if(isset($_POST["directorio"])){
    $carpeta = htmlspecialchars($_POST['carpeta']);
    $ruta = htmlspecialchars($_POST['ruta']);
    $directorio = $ruta."/".$carpeta;
    

    if(!is_dir($directorio)){
        $crear = mkdir($directorio, 0777, true);

        if($crear){
            $msg = "directorio creado";
        }else{
            $msg = "ha ocurrido un error al crear el directorio";
        }
    }else{
        $msg = "el directorio ya existe";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Directorios</title>
</head>
<body>
    <div>
        <h1>Creacion de directorios</h1>
        <strong><?php echo $msg ?></strong>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"] ?>">
        <table>
        <tr>
            <td>
                Directorio/s:
            </td>
            <td>
                <input type="text" name="carpeta">
            </td>
        </tr>
        <tr>
            <td>Guardar en la ruta:</td>
            <td><input type="text" name= "ruta"></td>
        </tr>
    </table>
    <input type="hidden" name="directorio">
    <input type="submit" value="Crear">
    </form>
    <br><br>
        <a href="index.php">Click aqui para crear archivos</a>
    </div>
</body>
</html>