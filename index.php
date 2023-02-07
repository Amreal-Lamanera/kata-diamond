<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        <label for="input">
            Carattere:
        </label>
            <input id="input" type="text" name="input" placeholder="INSERISCI UN CARATTERE">
    </form>

    <?php
    if (isset($_POST['input']) && !empty($_POST['input'])) {
        $char = trim(strtoupper($_POST['input']));
        if (!strlen($char) || strlen($char) > 1 || $char === 'A') {
            echo "<br/> <p>Input '$char' non valido</p> <br/>";
        }
        $matrix = generateCharactes($char);
        foreach ($matrix as $key => $value) {
            foreach ($value as $key2 => $value2) {
                echo "$key $key2 $value2<br/>";
            }
        }
    }
    ?>
</body>
</html>

<?php
function generateCharactes($char) {
    $matrix[0] = range('A', $char);
    $matrix[1] = range($char, 'A');
    return $matrix;
}
?>