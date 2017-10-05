<?php
/**
 * Created by PhpStorm.
 * User: TreeNewBeee
 * Date: 2017-09-12
 * Time: 18:19
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<div id="container" style="min-width:400px;height:400px;"></div>
<script src="../Highcharts-5.0.14/code/highcharts.js"></script>
<script src="../Highcharts-5.0.14/code/highcharts-more.js"></script>
<script src="../Highcharts-5.0.14/code/themes/dark-unica.js"></script>

<?php
    $name = isset($_GET['name']) ? $_GET['name'] : null;
    $type = isset($_GET['type']) ? $_GET['type'] : null;

    require_once '../db_login.php';
    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);
    if ($conn->connect_error) die($conn->connect_error);
    mysqli_set_charset($conn, 'utf8');

    $query = "SELECT * FROM `eagles` WHERE `name` = '".$name."' AND `type` = '".$type."' AND `year` = '".date("Y")."'";
    $result = $conn->query($query);
    $row = $result->fetch_array();
//    var_dump($row);
//    $name = $row['name'];
//    echo $name;

    if (isset($_GET['name'])){
        switch ($type){
            case '翔鹰':
                echo <<<PRINT
                    <script>
                        var chart= new Highcharts.Chart('container', {
                            
                            chart: {
                                polar: true,
                                type: 'line'
                            },
                            title: {
                                text: '{$type}成绩-{$row['name']}',
                                x: -80
                            },
                            pane: {
                                size: '80%'
                            },
                            xAxis: {
                                categories: ['内驱力', '凝聚力', '开拓力', '掌控力',
                                    '决策力'],
                                tickmarkPlacement: 'on',
                                lineWidth: 0
                            },
                            yAxis: {
                                gridLineInterpolation: 'polygon',
                                lineWidth: 0,
                                min: 0
                            },
                            tooltip: {
                                shared: true,
                                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
                            },
                            legend: {
                                align: 'right',
                                verticalAlign: 'top',
                                y: 70,
                                layout: 'vertical'
                            },
                            series: [{
                                name: '归一化成绩',
                                data: [{$row['dim1']}, {$row['dim2']}, {$row['dim3']}, {$row['dim4']}, {$row['dim5']}],
                                pointPlacement: 'on'
                            }]
                        });
                    
                    </script>
PRINT;
                break;
            case '精鹰':
                echo <<<PRINT
                    <script>
                        var chart= new Highcharts.Chart('container', {
                            
                            chart: {
                                polar: true,
                                type: 'line'
                            },
                            title: {
                                text: '{$type}成绩-{$row['name']}',
                                x: -80
                            },
                            pane: {
                                size: '80%'
                            },
                            xAxis: {
                                categories: ['专业力', '开拓力', '主动力', '培训力',
                                    '贡献力'],
                                tickmarkPlacement: 'on',
                                lineWidth: 0
                            },
                            yAxis: {
                                gridLineInterpolation: 'polygon',
                                lineWidth: 0,
                                min: 0
                            },
                            tooltip: {
                                shared: true,
                                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
                            },
                            legend: {
                                align: 'right',
                                verticalAlign: 'top',
                                y: 70,
                                layout: 'vertical'
                            },
                            series: [{
                                name: '归一化成绩',
                                data: [{$row['dim1']}, {$row['dim2']}, {$row['dim3']}, {$row['dim4']}, {$row['dim5']}],
                                pointPlacement: 'on'
                            }]
                        });
                    
                    </script>
PRINT;
                break;
            case '雏鹰':
                echo <<<PRINT
                    <script>
                        var chart= new Highcharts.Chart('container', {
                            
                            chart: {
                                polar: true,
                                type: 'line'
                            },
                            title: {
                                text: '{$type}成绩-{$row['name']}',
                                x: -80
                            },
                            pane: {
                                size: '80%'
                            },
                            xAxis: {
                                categories: ['内驱力', '专业力', '开拓力', '主动力',
                                    '执行力'],
                                tickmarkPlacement: 'on',
                                lineWidth: 0
                            },
                            yAxis: {
                                gridLineInterpolation: 'polygon',
                                lineWidth: 0,
                                min: 0
                            },
                            tooltip: {
                                shared: true,
                                pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
                            },
                            legend: {
                                align: 'right',
                                verticalAlign: 'top',
                                y: 70,
                                layout: 'vertical'
                            },
                            series: [{
                                name: '归一化成绩',
                                data: [{$row['dim1']}, {$row['dim2']}, {$row['dim3']}, {$row['dim4']}, {$row['dim5']}],
                                pointPlacement: 'on'
                            }]
                        });
                    
                    </script>
PRINT;


                break;
        }
    }

?>

</body>
</html>


