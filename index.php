<?php
$num1 = (isset($_POST['num1']))? $_POST['num1']:'';
$num2 = (isset($_POST['num2']))? $_POST['num2']:'';
$op = (isset($_POST['op']))?$_POST['op']:'';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Matheus Nervis da Silva">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calculadora</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <form method="POST" action="index.php">
        <input name = "num1" maxlength = "21" onkeypress = "return SomenteNumero(event, true)"
            step = "0.000001" type = "number" value="<?php echo($num1);?>"><br>
        <input name = "num2" maxlength = "21" onkeypress = "return SomenteNumero(event, true)"
            step = "0.000001" type = "number" value="<?php echo($num2);?>"><br>
        <select name="op">
            <option value="m" <?php echo(($op == 'm')?'selected':'');?>>Mult</option>
            <option value="d" <?php echo(($op == 'd')?'selected':'');?>>Div</option>
            <option value="a" <?php echo(($op == 'a')?'selected':'');?>>Ad</option>
            <option value="s" <?php echo(($op == 's')?'selected':'');?>>Sub</option>
        </select><br>
        <input type="submit">
    </form>
    <?php

    if($num1 != '' && $num2 != '' && $op != ''){

            require_once('calc.php');

            if(number($num1) && number($num2)){
                $num1 = (double) $num1;
                $num2 = (double) $num2;
                $op=$_POST['op'];

                switch($op){
                    case 'm':
                        $res = mult($num1, $num2);
                        break;
                    case 'd':
                        if($num2 != 0)$res = div($num1, $num2);
                        else $res = '<h3 class="msg_error">Erro: A operação requisitada é inválida</h3>';
                        break;
                    case 'a':
                        $res = ad($num1, $num2);
                        break;
                    case 's':
                        $res = sub($num1, $num2);
                        break;
                    default:
                        $res = '<h3 class="msg_error">Erro: A operação requisitada é inválida</h3>';
                }
            }else{
                $res = '<h3 class="msg_error">Erro: Pelo menos um dos valores, é inválido.</h3>';
            }
            $res = (string) $res;
            echo(($res[0] == '<')?$res:'<h3 class="result">'.$res.'</h3>');
        }elseif(($num1 == '' && $num2 != '') || ($num1 != '' && $num2 == '')){
            echo('<h3 class="msg_error">Erro: Um dos valores não informados.</h3>');
        }
    ?>
</body>
</html>
