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
        } else {
            $result = creaDiamante($char);
            foreach ($result as $value) {
                echo "$value<br/>";
            }
        }
    }
    ?>
</body>
</html>

<?php
function creaDiamante($char)
{
    if (strtoupper($char) === 'A') {
        return ['A'];
    } elseif (strtoupper($char) === 'B') {
        return [' A ', 'B B', ' A '];
    }
    else {
        $chars = range('A', $char);
        $result = array();
        for ($i = 0; $i < count($chars); $i++) {
            $el = '';
            for ($j = 0; $j < count($chars)-1-$i; $j++) {
                $el .= 'x';
            }
            if (!$i) {
                $temp = $el;
                $el .= $chars[$i] . $temp;
            }
            else {
                $temp = '';
                for ($j = 0; $j < $i-1; $j++) {
                    $temp .= 'x';
                }
                $el .= $chars[$i] . $temp;
                $revEl = strrev($el);
                $el .= 'x' . $revEl;
            }
            $result[] = $el;
        }
        $revResult = array_reverse($result);
        array_shift($revResult);
        foreach ($revResult as $value) {
            $result[] = $value;
        }
        return $result;
    }
}
?>