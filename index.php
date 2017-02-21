<?php
//thanks a lot
//thanks a lot khodet
$keyboard_keys = [
    '',
    'CTRL',
    'ALT',
    'WINDOW',
    'SPACE',
    'BACKSPACE',
    'LEFT ARROW',
    'RIGHT ARROW',
    'TOP ARROW',
    'BOTTOM ARROW',
    'SHIFT',
    'TAB',
    'CAPS LOCK',
    'ENTER',
    'INSERT',
    'ESC',
    'DELETE',
    'HOME',
    'END',
    'PAGE UP',
    'PAGE DOWN',
    '/',
    '*',
    '-',
    '+',
    '.',
    '`',
    'F1',
    'F2',
    'F3',
    'F4',
    'F5',
    'F6',
    'F7',
    'F8',
    'F9',
    'F10',
    'F11',
    'F12',
    '0',
    '1',
    '2',
    '3',
    '4',
    '5',
    '6',
    '7',
    '8',
    '9',
    'A',
    'B',
    'C',
    'D',
    'E',
    'F',
    'G',
    'H',
    'I',
    'J',
    'K',
    'L',
    'M',
    'N',
    'O',
    'P',
    'Q',
    'R',
    'S',
    'T',
    'U',
    'V',
    'W',
    'X',
    'Y',
    'Z',
    //insert farsi
    'َش',
    'س',
    'ی',
    'ب',
    'ل',
    'ا',
    'ت',
    'ن',
    'م',
    'ک',
    'گ',
    'ظ',
    'ط',
];
include_once ('config.php');
$categories = $conn->query('SELECT * FROM categories');
$category_array = array();
while($row = $categories->fetch_assoc()){
    $category_array[$row['id']] = $row['name'];
}
$sql = "SELECT * FROM hotkeys";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="hotkeys">
    <meta name="author" content="Saeed">
    <title>hotkeys</title>

    <!-- Bootstrap -->
    <link href="https://unpkg.com/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-rtl/dist/css/bootstrap-rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/highcharts/css/highcharts.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<form action="submit_key.php" method="post">
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">افزودن دکمه</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="category">عنوان</label>
                            <select name="category_id" id="category" class="form-control">
                                <?php foreach($category_array as $key => $category):?>
                                    <option value="<?= $key ?>"><?=$category?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <select name="key4" id="key4" class="form-control">
                            <?php foreach ($keyboard_keys as $keyboard_key): ?>
                                <option value="<?= $keyboard_key ?>"><?= $keyboard_key ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="key3" id="key3" class="form-control">
                            <?php foreach ($keyboard_keys as $keyboard_key): ?>
                                <option value="<?= $keyboard_key ?>"><?= $keyboard_key ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="key2" id="key2" class="form-control">
                            <?php foreach ($keyboard_keys as $keyboard_key): ?>
                                <option value="<?= $keyboard_key ?>"><?= $keyboard_key ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="key1" id="key1" class="form-control">
                            <?php foreach ($keyboard_keys as $keyboard_key): ?>
                                <option value="<?= $keyboard_key ?>"><?= $keyboard_key ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <br>
                            <label for="description" class="col-sm-2 control-label">Description</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="description"
                                          placeholder="Description" name="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <button class="btn btn-primary btn-block" type="submit">
                            ثبت
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">نمایش کلید های ترکیبی</h3>
        </div>
        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>کلید ترکیبی</th>
                    <th>توضیحات</th>
                    <th>دسته بندی</th>
                    <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                <?php while($row = $result->fetch_assoc()):?>
                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['key']?></td>
                    <td><?=$row['description']?></td>
                    <td><?=$category_array[$row['category_id']]?></td>
                    <td>
                        <form action="delete.php" onsubmit="return confirm('Are you sure?')" method="post">
                            <input type="hidden" value="<?=$row['id']?>" name="id">
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">نمودار</h3>
        </div>
        <div class="panel-body" style="direction: ltr">
            <div id="chart"></div>
        </div>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://unpkg.com/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/highcharts/highcharts.js"></script>
<script>
    Highcharts.chart('chart', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'World\'s largest cities per 2014'
        },
        subtitle: {
            text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
        },
        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'tedad'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'dars: <b>{point.y:.1f} adad</b>'
        },
        series: [{
            name: 'tedad',
            <?php
            $result = $conn->query('SELECT categories.name as name, count(*) AS y from hotkeys, categories where categories.id = hotkeys.category_id GROUP BY category_id');
            $data = array();
            while($row = $result->fetch_assoc()){
                $data[$row['name']] = $row['y'];
            }
            ?>
            data: [
                <?php foreach ($data as $key => $value) {
                echo "['$key', $value],";
                }
                ?>
            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
</script>
</body>
</html>
