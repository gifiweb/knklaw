<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hospitab</title>
        <meta name="description" content="">
        <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link href='http://fonts.googleapis.com/css?family=Lato:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/public/assets/css/normalize.css">

        <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public/admin/css/font-awesome.min.css">
        <link href="/public/admin/vendor/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" href="/public/assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/public/assets/js/vendor/datepicker/css/datepicker3.css">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/redmond/jquery-ui.css">
        <link rel="stylesheet" href="/public/assets/css/main.css">
        <link rel="stylesheet" href="/public/admin/css/admin.css">
        <script src="/public/assets/js/vendor/modernizr-2.8.3.min.js"></script>

    </head>
</head>

<body>

    <div id="wrapper">

        <header>
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <div class="containers">
                
                <div class="navbar-header">
                    <button data-tour="nav-bar" id="showLeftPush" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>

                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="/public/assets/img/logo-small-blue.png" class="inner">
                        <img src="/public/assets/img/logo-text-small.png" class="inner" style="max-height: 12px">
                    </a>

                        <!-- <button id="showRightPush">-></button> -->
                    <div data-tour="profile" class="dropdown profile">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://placehold.it/28x28" class="profile-image img-circle">
                            <span><?php echo $user['firstname']; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-cog"></i> Account</a></li>
                            <li class="divider"></li>
                            <li><a id="logout" href="#"><i class="fa fa-sign-out"></i> Sign-out</a></li>
                        </ul>
                    </div>
                </div>
                
              </div>
            </nav>
        </header>
        <nav>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="/admin/dashboard"><i class="fa fa-fw fa-users"></i> Users</a>
                    </li>
                    <li>
                        <a href="/admin/tasks"><i class="fa fa-fw fa-table"></i> Tasks</a>
                    </li>
                    <li>
                        <a href="/admin/read"><i class="fa fa-fw fa-edit"></i> Read</a>
                    </li>
                    <li>
                        <a href="/admin/shop"><i class="fa fa-fw fa-money"></i> Shop</a>
                    </li>
                    <li>
                        <a href="/admin/video"><i class="fa fa-fw fa-youtube-play"></i> Video</a>
                    </li>
                    <li>
                        <a href="/admin/forms"><i class="fa fa-fw fa-check-square-o"></i> Forms</a>
                    </li>
                    <!-- <li>
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
                    <li class="active">
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
</nav>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <div id="tasks-container"></div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/public/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="/public/assets/js/vendor/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>    
    <script src="/public/admin/vendor/jquery.jtable.js" type="text/javascript"></script>
    <script src="/public/assets/js/plugins.js"></script>
        <script src="/public/assets/js/main.js"></script>
    <script src="/public/admin/js/custom.js"></script>
    <script>
        tasks_init();
    </script>

</body>

</html>
