<?php 
    $errh = $errw = $errg = "";
    $height = $weight = "";
    $bmipass = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($_POST['height'])) {
            $errh = "<span style='color:#FFFFFF; font-size:20px; display:block'>Height is required</span>";
        } else {
            $height = validate($_POST['height']);
        }
    
        if (empty($_POST['weight'])) {
            $errw = "<span style='color:#FFFFFF; font-size:20px; display:block'>Weight is required</span>";
        } else {
            $weight = validate($_POST['weight']);
        }

        if (empty($_POST['height'] && $_POST['weight'])) {
            echo "";
        } else {
            $bmi = ($weight / ($height * $height));
            $bmipass = $bmi;
        }
    }
    
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <!-- add icon link -->
    <link rel = "icon" href ="/BMICalculator/img/calculator.png">
    <link rel="stylesheet" href="/BMICalculator/css/bmistyle.css">
</head>
<body>

    
    <section class="wrapper">

    <h2>BMI Checking Online</h2>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <div class="section1">
        <img height= "30" width="40" src="/BMICalculator/img/height.png">
        <span>Enter Your Height</span>

        <input type="text" name="height" autocomplete="off" placeholder="Meter"><?php echo $errh; ?>
    </div>
    
    <div class="section2">
        <img height= "30" width="40" src="/BMICalculator/img/weight.png">
        <span>Enter Your Weight</span>
        <input type="text" name="weight" autocomplete="off" placeholder="Kilogram"><?php echo $errw; ?>
    </div>
    <center>
        <div class="submit">
            <input type="submit" name="submit" value="Check">
        </div>
    </center>    

    
</form>


<?php
   
    error_reporting(0);
    echo "<center><span style='color:#FFFFFF; font-size:18px; ' class='pass'>Your BMI is : ". number_format($bmipass , 2) ."</span>";

    if (isset($_POST['submit'])){
        if ($bmipass >= 13.6 && $bmipass <= 18.5) {
            echo "<center><span style='color:#FFFFFF; display:block; margin-top:5px ;margin-right:50px; font-size:18px;'> Low body weight. You need to gain weight by eating moderately.</span></center>";?>
           <?php
        } elseif ($bmipass > 18.5 && $bmipass < 24.9) {
            echo "<center><span style='color:#FFFFFF; display:block; margin-top:5px;margin-right:50px; font-size:18px;'> The standard of good health.</span></center>";?>
            <?php
        } elseif ($bmipass > 25 && $bmipass < 29.9) {
            echo "<center><span style='color:#FFFFFF; display:block; margin-top:5px;margin-right:50px; font-size:18px;'> Excess body weight. Exercise needs to reduce excess weight.</span></center>";?>
            <?php
        } elseif ($bmipass > 30 && $bmipass < 34.9) {
            echo "<center><span style='color:#FFFFFF; display:block; margin-top:5px;margin-right:50px; font-size:18px;'> The first stage of obesity. It is necessary to choose food and exercise.</span></center>";?>
            <?php
        } elseif ($bmipass > 35 && $bmipass < 39.9) {
            echo "<center><span style='color:#FFFFFF; display:block; margin-top:5px;margin-right:50px; font-size:18px;'> The second stage of obesity. Moderate diet and exercise are required.</span></center>";?>
            <?php
        } elseif ($bmipass >= 40) {
            echo "<center><span style='color:#FFFFFF; display:block; margin-top:5px;margin-right:50px; font-size:18px;'> Excess fat.<b style='color:#ed4337'> Fear of death</b>. Need a doctor advice.</span></center>";?>
            <?php
        }
    } else {
        echo "";
    }
?>

    </section>    
</body>
</html>