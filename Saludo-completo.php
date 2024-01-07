<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
</head>
<body>
    <form action="" method="get">
        <label for="nombre">
            Introduzca su nombre: <input type="text" name="nombre" id="nombre" required>
        </label><br>
        <label for="hora">
            Introduzca su hora actual: <input type="time" name="hora" id="hora" required>
        </label><br><br>
        <button type="submit">Siguiente</button>
    </form>
    <?php
        //Verificaciones y declaraciones.
        if (isset($_GET["nombre"]) && !empty($_GET["nombre"]) && isset($_GET["hora"]) and !empty($_GET["hora"])) {
            $nombre = $_GET["nombre"];
            $hora_int = intval($_GET["hora"]);
            $hora_str = $_GET["hora"];

            //Conversión a 12 horas.
            $hora_str_12 = explode(":", $hora_str);
            switch ($hora_str_12[0]) {
                case 13:
                    $hora_str_12[0] = 1;
                    break;
                case 14: 
                    $hora_str_12[0] = 2;
                    break;
                case 15: 
                    $hora_str_12[0] = 3;
                    break;
                case 16:
                    $hora_str_12[0] = 4;
                    break;
                case 17:
                    $hora_str_12[0] = 5;
                    break;
                case 18: 
                    $hora_str_12[0] = 6;
                    break;
                case 19:
                    $hora_str_12[0] = 7;
                    break;
                case 20:
                    $hora_str_12[0] = 8;
                    break;
                case 21: 
                    $hora_str_12[0] = 9;
                    break;
                case 22: 
                    $hora_str_12[0] = 10;
                    break;
                case 23:
                    $hora_str_12[0] = 11;
                    break;
                case 00:
                    $hora_str_12[0] = 12;
                    break;
            }
            
            //Condicional día.
            if ($hora_int > 4 && $hora_int < 13) {
                echo "<hr>Buenos dias, " . $nombre . ". Actualmente son las " . $hora_str_12[0] . ":" . $hora_str_12[1] . " a.m. de la mañana.";
            //Condicional tarde.
            } elseif ($hora_int >= 13 && $hora_int < 19) {
                echo "<hr>Buenos tardes, " . $nombre . ". Actualmente son las " . $hora_str_12[0] . ":" . $hora_str_12[1] . " p.m. de la tarde.";
            //Condicional noche.
            } elseif ($hora_int > 19) {
                echo "<hr>Buenos noches, " . $nombre . ". Actualmente son las " . $hora_str_12[0] . ":" . $hora_str_12[1] . " p.m. de la noche.";
            //ERROR.
            } elseif ($hora_int == 0) {
                echo "<hr>Buenos noches, " . $nombre . ". Actualmente son las " . $hora_str_12[0] . ":" . $hora_str_12[1] . " a.m. de la noche.";
            } else {
                echo $hora_int;
                echo "<hr><b>Error: Algo salió mal.<b>";
            }
        } else {
            echo "<hr><b>Introduzca su nombre y hora actual.<b>";
        }
    ?>
</body>
</html>