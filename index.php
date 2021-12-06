
<?php
$msg = null;
if(isset($_POST["escribir"]))
{
    $nombre = $_REQUEST['nombre'];
    $extension = ".txt";
    $contenido = $_POST['contenido'];
    $aggmod = htmlspecialchars($_POST['aggmod']);
    
    $ruta = "archivos/".$nombre.$extension;

    if($aggmod=="a"){
        $manejador = fopen($ruta, 'a') or die ("error al crear");

        if(fwrite($manejador, $contenido))
        {
            fwrite($manejador, "\n\n");
            $msg .= "Archivo creado con exito, disponible en... <a href ='$ruta' target='_blank'>$ruta</a> <a href ='$ruta' download target='_blank'>descargar</a>";
        }else{
            $msg= "ha habido un error al crear el fichero";
        } 
    }else{
        $manejador = fopen($ruta, 'w') or die ("error al crear");

        if(fwrite($manejador, $contenido))
        {
            fwrite($manejador, "\n\n");
        
            $msg .= "Archivo creado con exito, disponible en... <a href ='$ruta' target='_blank'>$ruta</a> <a href ='$ruta' download target='_blank'>descargar</a>";
        }else{
            $msg= "ha habido un error al crear el fichero";
        }

    }    
    fclose($manejador);  
    
    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>manejo de archivos</title>
</head>
<body>
    <div>
        <h1>Crear y escribir ficheros con PHP</h1>
        <strong><?php echo $msg ?></strong>
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST">
        <table>
            <tr>
                <td>Nombre del archivo:</td>
                <td><input type="text" name="nombre"></td>
            </tr>
            <tr>
                <td>Agregar o Modificar contenido:</td>
                <td>
                    <select name="aggmod">
                        <option value="a">Agregar</option>
                        <option value="w">Modificar</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>extension del archivo:</td>
                <td><input type="text" readonly="readonly" value=".txt"></td>
            </tr>
            <tr>
                <td>Contenido del archivo:</td>
                <td>
                    <textarea name="contenido" cols="30" rows="10"></textarea>
                </td>
            </tr>
        </table> 
               
        <input type="hidden" name="escribir">
        <input type="submit" name="boton" value="Crear archivo">
        </form>
        <br><br>
        <a href="crearDirectorio.php">Click aqui para crear directorios</a>
    </div>
</body>
</html>