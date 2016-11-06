<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php
//Step1
 $db = mysqli_connect('localhost','root','','cfgdb')
 or die('Error connecting to MySQL server.');

$data1[]=array();
$dates1[]=array();
$data2[]=array();
$dates2[]=array();

//Step2
$query = "SELECT date, COUNT(person) AS visits FROM `cfg_table` WHERE date < \"2016-10-11\" GROUP BY date";
mysqli_query($db, $query) or die('Error querying database.');

$result = mysqli_query($db, $query);

$i=0;
while ($row = $result->fetch_assoc()) {
 $dates1[$i] = $row['date'];
 $data1[$i] = $row['visits'];
 $i=$i+1;
}

$query2 = "SELECT date, COUNT(person) AS visits FROM `cfg_table` WHERE date > \"2016-10-10\" GROUP BY date";
mysqli_query($db, $query) or die('Error querying database.');

$result2 = mysqli_query($db, $query2);

$i=0;
while ($row2 = $result2->fetch_assoc()) {
 $dates2[$i] = $row2['date'];
 $data2[$i] = $row2['visits'];
 $i=$i+1;
}


$query3 = "SELECT gender, COUNT(gender) AS gcount FROM `cfg_table` WHERE visit_type=\"New\" GROUP BY gender";
mysqli_query($db, $query3) or die('Error querying database.');

$result3 = mysqli_query($db, $query3);

$i=0;
while ($row3 = $result3->fetch_assoc()) {
 $gender[$i] = $row3['gender'];
 $gcount[$i] = $row3['gcount'];
 $i=$i+1;
}

$query4 = "SELECT person, COUNT(person) AS visitcount FROM `cfg_table` WHERE date < \"2016-10-10\" AND person=\"PwC\" OR person=\"Carer\" AND visit_type=\"New\" GROUP BY person";
mysqli_query($db, $query4) or die('Error querying database.');

$result4 = mysqli_query($db, $query4);

$i=0;
while ($row4 = $result4->fetch_assoc()) {
 $visittype[$i] = $row4['person'];
 $visitcount[$i] = $row4['visitcount'];
 $i=$i+1;
}

$query5 = "SELECT person, COUNT(person) AS visitcount FROM `cfg_table` WHERE date > \"2016-10-10\" AND person=\"PwC\" OR person=\"Carer\" AND visit_type=\"New\" GROUP BY person";
mysqli_query($db, $query5) or die('Error querying database.');

$result5 = mysqli_query($db, $query5);

$i=0;
while ($row5 = $result5->fetch_assoc()) {
 $visittype2[$i] = $row5['person'];
 $visitcount2[$i] = $row5['visitcount'];
 $i=$i+1;
}

?>





    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <!--<li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
                    <li>
                        <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                    </li>
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <!--<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>-->
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26000</div>
                                        <div>Total Visits(Excluding other visitors)</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">31250</div>
                                        <div>Total Visits(Including other visitors)</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">48% of Journeys</div>
                                        <div>Curative Intents</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">Benefits Advice</div>
                                        <div>Popular Activity</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Chart of monthly visits</h3>
                            </div>
                            <div class="panel-body">
                                <div id="visits-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-long-arrow-right fa-fw"></i>New Male to Female visits</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-donut-chart"></div>
                                <div class="text-right">
                                    <a href="#">View Details <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> New PwC and New Carers</h3>
                            </div>
                            <div class="panel-body">
                                <div id="chart1"></div>
                                <div class="text-right">
                                    <a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Cancer Sites</h3>
                            </div>
                            <div class="panel-body">
                                <div id="chart2"></div>
                                <div class="text-right">
                                    <a href="#">View All <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/highcharts-more.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

    <script type="text/javascript">
        $(function() {

    //call your individual charts
    //add/overwrite any options you need for each chart

    $dates1 =  [2016-10-01,2016-10-02,2016-10-03,2016-10-04,2016-10-05,2016-10-06,2016-10-07,2016-10-08,2016-10-09,2016-10-10];
    $data1 = [23,113,118,84,89,53,106,119,86,37];
    $dates2 = [2016-10-11,2016-10-12,2016-10-13,2016-10-14,2016-10-15,2016-10-16,2016-10-17,2016-10-18,2016-10-19,2016-10-20];
    $data2 = [113,81,77,104,83,98,121,43,47,43];
    $gender = ['Female','Male','Under 18 Female','Under 18 Male'];
    $gcount = [270,103,1,4];

    $visittype = ['Carer','PwC'];
    $visitcount = [147,470];

    $visittype2 = ['Carer','PwC']
    $visitcount = [122,523]

    //chart 1
    $('#chart1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'New PwC and New Carers'
        },
        xAxis: {
            categories: [
                'Year 1',
                'Year 2'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'New Visits '
            }
        },
        series:[{
            name: 'PwC',
            data:[<?php echo $visitcount[1] . ",". $visitcount2[1]; ?>]
        },
        {
            name: 'Carers',
            data:[<?php echo $visitcount[0] . ",". $visitcount2[0]; ?>]
    }]
    });
    //chart 2
    $('#chart2').highcharts({
        chart: {
            type: 'bubble',
            plotBorderWidth: 1,
            zoomType: 'xy'
        },

        legend: {
            enabled: false
        },

        title: {
            text: ''
        },

        xAxis: {
            gridLineWidth: 1,
            title: {
                text: 'Cancer sites'
            }/*,
            labels: {
                format: '{value} gr'
            },
            plotLines: [{
                color: 'black',
                dashStyle: 'dot',
                width: 2,
                value: 65,
                label: {
                    rotation: 0,
                    y: 15,
                    style: {
                        fontStyle: 'italic'
                    },
                    text: 'Safe fat intake 65g/day'
                },
                zIndex: 3
            }]*/
        },

        yAxis: {
            startOnTick: false,
            endOnTick: false,
            title: {
                text: ''
            }/*,
            labels: {
                format: '{value} gr'
            },
            maxPadding: 0.2,
            plotLines: [{
                color: 'black',
                dashStyle: 'dot',
                width: 2,
                value: 50,
                label: {
                    align: 'right',
                    style: {
                        fontStyle: 'italic'
                    },
                    text: 'Safe sugar intake 50g/day',
                    x: -10
                },
                zIndex: 3
            }]*/
        },

        tooltip: {
            useHTML: true,
            headerFormat: '<table>',
            pointFormat: '<tr><th colspan="2"><h3>{point.c_site}</h3></th></tr>' +
                
                '<tr><th>Cancer sites:</th><td>{point.z}%</td></tr>',
            footerFormat: '</table>',
            followPointer: true
        },

        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            },
            bubble:{
               // minSize:100,
                //maxSize:200,
                minSIze:'1%',
                maxSize:'20%'
            }
        },

        series: [{
            data: [
                { x: 95, y: 85, z: 17.8, name: 'Brain/CNS', c_site: 'Brain/CNS' },
                { x: 90.5, y: 102.9, z: 65, name: 'Breast', c_site: 'Breast' },
                { x: 80.8, y: 21.5, z: 12.8, name: 'Gynae', c_site: 'Gynae' },
                { x: 80.4, y: 102.5, z: 25, name: 'Haemat', c_site: 'Haemat' },
                { x: 80.3, y: 82.1, z: 18.8, name: 'Head/Neck', c_site: 'Head/Neck' },
                { x: 78.4, y: 30.1, z: 1.6, name: 'Liver', c_site: 'Liver' },
                { x: 74.2, y: 68.5, z: 23.5, name: 'Lower GI', c_site: 'Lower GI' },
                { x: 73.5, y: 30.1, z: 10, name: 'Lung', c_site: 'Lung' },
                { x: 71, y: 93.2, z: 20.3, name: 'Not Stated', c_site: 'Not Stated' },
                { x: 79.2, y: 18.6, z: 2, name: 'Pancreatic', c_site: 'Pancreatic' },
                { x: 68.6, y: 35, z: 14.8, name: 'Prostate', c_site: 'Prostate' },
                { x: 65.5, y: 126.4, z: 4, name: 'Rare', c_site: 'Rare' },
                { x: 65.4, y: 50.8, z: 8, name: 'Sarcoma', c_site: 'Sarcoma' },
                { x: 63.4, y: 22.8, z: 2.7, name: 'Skin/Mel', c_site: 'Skin/Mel' },
                { x: 64, y: 23, z: 3, name: 'Testicular', c_site: 'Testicular' },
                { x: 68.6, y: 20, z: 0.5, name: 'Unknown', c_site: 'Unknown Primary' },
                { x: 63.4, y: 31.8, z: 11.4, name: 'Upper GI', c_site: 'Upper GI' },
                { x: 64, y: 32.9, z: 11.8, name: 'Urolog', c_site: 'Urolog' }
            ]
        }]

    });
    

    $('#visits-chart').highcharts({
        title: {
            text: 'Monthly Visits'
        },
        xAxis: {
            categories: <?php echo json_encode($dates1) ?>,
            crosshair: true
        },
        series:[{
            
            name: 'Month 1',
            data:[<?php echo join($data1,','); ?>]
        },{
            name: 'Month 2',
            data:[<?php echo join($data2,','); ?>]
        }]
    }); 



    // Donut Chart
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "<?php echo $gender[0]; ?>",
            value: [<?php echo $gcount[0]; ?>]
        },  {
            label: "<?php echo $gender[1]; ?>",
            value: [<?php echo $gcount[1]; ?>]
        },
        {
            label: "<?php echo $gender[2]; ?>",
            value: [<?php echo $gcount[2]; ?>]
        },  {
            label: "<?php echo $gender[3]; ?>",
            value: [<?php echo $gcount[3]; ?>]
        }],
        colors:['#0087BD','blue','green','black'],
        resize: true
    });

    

    


});
    </script>

</body>

</html>
