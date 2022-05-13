<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Random Integer Generator</title>
    <meta name="description" content="Random Integer Generator">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sticky-menu.css" rel="stylesheet">
</head>

<?php
$numbs = [];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    for ($x = 0; $x < 10000; $x++) {
        $numbs[] = getNum();
    }
    //$output = implode(",", $numbs);
}

function getNum()
{
    return rand(0, 100000);
}
?>

<!-- About -->
<section id="about" class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Result</h1>
                <p>All instance names<p>
                <p>Instance name + <?php echo count($numbs)?><p>
                <p>Largest num + instance name<p>
                <p>Smallest num + instance name<p>
            </div>
        </div>
    </div>
</section>
