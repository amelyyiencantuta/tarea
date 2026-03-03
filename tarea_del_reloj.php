<!DOCTYPE html>
<html>
<head>
    <title>Reloj Espejo</title>

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #8d4edf, #1c6cc8);
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            background:white;
            padding:30px;
            border-radius:15px;
            width:350px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
        }

        h2{
            text-align:center;
            color:#0a0202;
        }

        h3{
            text-align:center;
            color: #355bc4;;
        }

        input{
            width:100%;
            padding:10px;
            margin-top:8px;
            margin-bottom:15px;
            border-radius:8px;
            border:1px solid #0a0202;
        }

        input[type="submit"]{
            background:#0a0202;
            color:white;
            border:none;
            font-weight:bold;
            cursor:pointer;
        }

        input[type="submit"]:hover{
            background:#0a0202;
        }

        .resultado{
            margin-top:15px;
            background:#0a0202;
            padding:10px;
            border-radius:8px;
            font-weight:bold;
        }
    </style>
</head>

<body>
<div class="card">

<h2>Tarea Reloj Espejo</h2>

<?php

// PASO 1 → Mostrar solo la pregunta inicial
if (!isset($_POST["n"]) && !isset($_POST["calcular"])) {
?>

<form method="post">
    <h3>¿Cuántas horas vas a ingresar?</h3>
    <input type="number" name="n" required>
    <input type="submit" value="Continuar">
</form>

<?php
}

// PASO 2 → Mostrar inputs de horas
elseif (isset($_POST["n"]) && !isset($_POST["calcular"])) {

    $n = (int)$_POST["n"];
?>

<form method="post">
    <input type="hidden" name="n" value="<?php echo $n; ?>">

    <?php
    for ($i = 0; $i < $n; $i++) {
        echo "Hora " . ($i+1) . " (HH:MM):";
        echo "<input type='text' name='horas[]' required>";
    }
    ?>

    <input type="submit" name="calcular" value="Calcular">
</form>

<?php
}

// PASO 3 → Mostrar resultado
elseif (isset($_POST["calcular"])) {

    echo "<div class='resultado'>";

    $horas = $_POST["horas"];
    $n = count($horas);

    for ($i = 0; $i < $n; $i++) {

        $horaEspejo = $horas[$i];
        $partes = explode(":", $horaEspejo);

        $h = (int)$partes[0];
        $m = (int)$partes[1];

        $totalMinutos = $h * 60 + $m;
        $resultado = 720 - $totalMinutos;

        if ($resultado <= 0) {
            $resultado += 720;
        }

        $horaReal = floor($resultado / 60);
        $minutoReal = $resultado % 60;

        if ($horaReal == 0) $horaReal = 12;
        if ($horaReal < 10) $horaReal = "0" . $horaReal;
        if ($minutoReal < 10) $minutoReal = "0" . $minutoReal;

        echo $horaEspejo . " → " . $horaReal . ":" . $minutoReal . "<br>";
    }

    echo "</div>";
}
?>

</div>
</body>
</html>