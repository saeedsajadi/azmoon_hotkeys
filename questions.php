<?php
include_once('config.php');
$category = $_GET['category'];
if(empty($category)){
    $category = 1;
}
$sql = "SELECT * FROM hotkeys WHERE category_id = '$category'";
$result = $conn->query($sql);
$questions = array();
$counter = 0;
$keys = array();
while ($row = $result->fetch_assoc()) {
    $questions[$counter]['question'] = $row['description'];
    $questions[$counter]['answer'] = $row['key'];
    $keys[] = $row['key'];
    $counter++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Page Description">
    <meta name="author" content="Saeed">
    <title>Page Title</title>

    <!-- Bootstrap -->
    <link href="http://unpkg.com/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title"><h3>سوالات</h3></div>
        </div>
        <div class="panel-body">
            <?php for ($i = 0; $i < $counter; $i++): ?>
                <h3> سوال شماره <?=$i+1?>: <?= $questions[$i]['question'] ?></h3>
                <p>
                    <?php
                    shuffle($keys);
                    $answers = array();
                    $answers[0] = $questions[$i]['answer'];
                    foreach ($keys as $key) {
                        if(count($answers) < 4){
                            if(! in_array($key, $answers)){
                                $answers[] = $key;
                            }
                        }
                    }
                    shuffle($answers);
                    ?>
                <ul>
                    <?php foreach ($answers as $answer):?>
                    <li><?=$answer?></li>
                    <?php endforeach;?>
                </ul>
                </p>
            <?php endfor; ?>
        </div>
    </div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>
