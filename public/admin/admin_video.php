<?php
    use \application\components\modules\Video\Video;

    $video = new Video(array());
    $videos = $video->list_videos();

?>
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
        
        <link rel="stylesheet" href="/public/assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/public/assets/js/vendor/datepicker/css/datepicker3.css">
        <link rel="stylesheet" href="/public/assets/css/main.css">
        <link rel="stylesheet" href="/public/admin/css/admin.css">
        <script src="/public/assets/js/vendor/modernizr-2.8.3.min.js"></script>

        <style>
            form > div {
                margin: 10px auto;
            }
        </style>

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
                <div class="jumbotron" style="text-align: center; padding-bottom: 50px">
                    <div class="container">
                    <div class="col-lg-4">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#videoModal">
                          New Video
                        </button>
                    </div>
                    
</div></div>
                    <div class="col-lg-12">
                        <table class="table table-row">
                            <thead>
                                <tr >
                                    <th>Video</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Show/hide<br>in timeline</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($videos as $key => $vd): ?>
                                    <tr id="<?= $vd['id'] ?>">
                                        <td>
                                            <a href="<?= $vd['src'] ?>" data-webm="<?= $vd['src'] ?>" class="html5lightbox" title="<?= $vd['title'] ?>" data-description="<?= $vd['description'] ?>">
                                                <img src="/public/assets/img/<?= $vd['poster'] ?>">
                                            </a>
                                        </td>
                                        <td><?= $vd['title'] ?></td>
                                        <td><?= $vd['description'] ?></td>
                                        <td><?= ($vd['id'] == '0') ? "don't show" : "show"; ?></td>
                                        <td>
                                            <button class="btn btn-success edit btn-lg"><span class="glyphicon glyphicon-pencil aria-hidden="true""></span></button>
                                            <button class="btn btn-danger delete btn-lg"><span class="glyphicon glyphicon-remove aria-hidden="true""></span></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                
                            </tbody>
                        </table>
                    </div>
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="videoModalLabel">Add new shop</h4>
          </div>
          <div class="modal-body">
            
            <form action="" id="shops">
                <div class="avatar">
                    <button class="upload-image">Change image</button>
                    <input id="avatar-upl" type="file" style="display: none" name="avatar">
                    <img class="preview-image" src="http://placehold.it/360x120">
                </div>
                <div class="input-group">
                  <span class="input-group-addon">Shop name</span>
                  <input type="text" class="form-control" placeholder="" name="title">
                </div>
                <div class="input-group">
                  <span class="input-group-addon">Category</span>
                  <select class="form-control" name="cat_id">
                      <option value="1">Cats</option>
                      <option value="2">Dogs</option>
                      <option value="3">Food</option>
                      <option value="4">Shoes</option>
                  </select>
                </div>
            </form>
                      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary submit">Save changes</button>
          </div>
        </div>
      </div>
    </div>

 


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/public/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="/public/assets/js/vendor/bootstrap.min.js"></script>
    <script src="/public/assets/js/plugins.js"></script>
        <script src="/public/assets/js/main.js"></script>
        <script src="/public/assets/vendor/lightbox/html5lightbox.js"></script>
    <script src="/public/admin/js/custom.js"></script>

    <script>
        $(document).ready(function(){

            $('#video').submit(function(){
                console.log($(this).serializeObject());
                return false;
            });

            $('table tr').find('button.edit').click(function(){
                var line = $(this).parents('tr');
                var modal = $('#videoModal');
                var id = line.attr('id');

                var cop_name = line.find('td').eq(1).text();
                var cop_img  = line.find('td').eq(0).find('img').attr('src');
                var cop_shop = line.find('td').eq(2).data('shop-id');

                modal.find('.preview-image').attr('src', cop_img);
                modal.find('[name="cname"]').val(cop_name);
                modal.find('[name="shop_id"]').val(cop_shop);

                modal.find('#videoModalLabel').text(id);
                modal.modal('show');
            });

        });
    </script>

</body>

</html>
