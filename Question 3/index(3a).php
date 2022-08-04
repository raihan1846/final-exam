<?php
$area = $html = $infotext = $sel1 = $sel2 = $sel3 = "";

$num1 = isset($_POST['a1']) ? floatval($_POST['a1']) : "";

$visibility = "visibility_off";

$selUnit = isset($_GET['txtSelectBox']) ? $_GET['txtSelectBox'] : '';

if (isset($_GET['txtSelectBox'])) {

   $visibility = "visibility_on";

    switch ($selUnit) {

        case "kg2lb":
            $sel1 = "selected";

            $html1 = '<h2>Pounds to Kilograms Converter</h2>';

            $html2 = '<input type="number" name="a1" id="a1" placeholder="Input weight in pounds(lb)" value="' . $num1 . '" required>';

            if (isset($_POST['btnConvert'])) {

                $ans = round(($num1 * 2.20462262185), 4);

                $infotext = '<div class="answer">' . $ans . ' kg</div>';
            }

            break;

        case "lb2kg":
            $sel2 = "selected";
            $html1 = '<h2>Kilograms to Pounds Converter</h2>';
            $html2 = '<input type="number" name="a1" id="a1" placeholder="Input weight in kilograms (kg)" value="' . $num1 . '" required>';

            if (isset($_POST['btnConvert'])) {

                $ans = round(($num1 / 2.20462262185), 4);

                $infotext = '<div class="answer">' . $ans . ' lb</div>';
            }

            break;


    }
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Weight Converter in PHP</title>

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <main>

        <div class="container">

            <h1>Weight Convert</h1>

            <div class="container-wrapper">

                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get" class="frmSelect">

                    <label for="txtSelectBox"><b>Choose the type of unit conversion:</b></label>

                    <select name="txtSelectBox" id="txtSelectBox" value="<?php echo $oper; ?>" required>

                        <option value="kg2lb" <?php echo $sel1; ?>>Pounds &#8594;Kilograms </option>

                        <option value="lb2kg" <?php echo $sel2; ?>>Kilograms &#8594; Pounds</option>

                    </select>



                    <button type="submit" class="btnSelect">Select</button>

                </form>

            </div>

            <div class="container-wrapper <?php echo $visibility; ?>">

                <form action="" method="post" class="frmAreaCalculate">

                    <?php echo $html1; ?>

                    <div class="btnWrapper">

                        <?php echo $html2; ?>

                        <a href="index(3a).php" type="button" name="btnReset" class="btnReset">Reset</a>

                        <button type="submit" name="btnConvert" class="btnConvert">Convert</button>

                    </div>
                    <?php echo $infotext; ?>

                </form>

            </div>

        </div>

    </main>

</body>

</html>