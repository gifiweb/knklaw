<?php use \application\components\modules\Blog\Blog; 

    $blog = new Blog($user);
    $articles = $blog->blog_list();
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
        <link href="/public/admin/vendor/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="/public/admin/css/summernote.css">
        <link rel="stylesheet" href="/public/assets/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="/public/assets/js/vendor/datepicker/css/datepicker3.css">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/redmond/jquery-ui.css">
        <link rel="stylesheet" href="/public/assets/css/main.css">
        <link rel="stylesheet" href="/public/admin/css/admin.css">
        
        <script src="/public/assets/js/vendor/modernizr-2.8.3.min.js"></script>

        <style>
            .avatar {
                /*width: 170px;*/
                max-height: 430px;
                padding: 4px;
                border: 3px dashed #ccc;
                position: relative;
            }

            .avatar img{
                max-height: 430px;
            }

            .upload-image {
                position: absolute;
                bottom: 10px;
                /*border: none;
                background: none;*/
            }

            form > div {
                margin: 10px auto;
            }

            .list ol {
                /*list-style-type: none;*/
                font-size: 16px;
                margn: 0;
            }

            .article-block {
                cursor: pointer;
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
                   <!--  <li class="active">
                        <a href="/admin/dashboard"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li> -->
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

                <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a data-toggle="tab" href="#sectionA">Articles</a></li>
                  <li role="presentation"><a data-toggle="tab" href="#sectionB">New</a></li>
                </ul>

                <div class="tab-content">

    <div id="sectionA" class="tab-pane fade in active">

        <!-- Page Heading -->
                <div class="row list">
                    <div class="col-lg-12">
                        <ol>

                            <?php 

                                foreach ($articles as $key => $value) {
                                    echo "<li id='" . $value['id'] . "'><div class='article-block'><p class='title'>" . $value['title'] . "</p></div></li>";
                                }
                                // print_r ($articles);

                            ?>
                            
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

    </div>

    <div id="sectionB" class="tab-pane fade">

        <!-- Page Heading -->
                <div class="row single">
                    <div class="col-lg-12">
                        <form>
                            <div class="avatar">
                                <button class="upload-image">Change image</button>
                                <input id="avatar-upl" type="file" style="display: none" name="avatar">
                                <img id="preview-image" src="http://placehold.it/760x520">
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">Title</span>
                              <input type="text" class="form-control" placeholder="" name="title">
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">Description</span>
                              <textarea type="text" class="form-control" placeholder="" name="description"></textarea>
                            </div>
                          <textarea class="summernote"><p>Seasons <b>coming up</b></p></textarea>
                          <button type="submit" class="btn btn-default">submit</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

    </div>
    </div>
                
                
                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <div class="modal fade" id="editPost" tabindex="-1" role="dialog" aria-labelledby="editPostLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="editPostLabel">Edit Article #<span></span></h4>
          </div>
          <div class="modal-body">
            
            
                        <form>
                            <div class="avatar">
                                <button class="upload-image">Change image</button>
                                <input id="avatar-upla" type="file" style="display: none" name="avatar">
                                <img id="preview-imagea" src="http://placehold.it/760x520">
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">Title</span>
                              <input type="text" class="form-control" placeholder="" name="title">
                            </div>
                            <div class="input-group">
                              <span class="input-group-addon">Description</span>
                              <textarea type="text" class="form-control" placeholder="" name="description"></textarea>
                            </div>
                          <textarea class="summernote"><p>Seasons <b>coming up</b></p></textarea>
                        </form>
                   
                      
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/public/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
    <script src="/public/assets/js/vendor/bootstrap.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>    
    <script src="/public/admin/vendor/jquery.jtable.js" type="text/javascript"></script>
    <script src="/public/assets/js/plugins.js"></script>
        <script src="/public/assets/js/main.js"></script>
        <script src="/public/admin/js/summernote.js"></script>
    <script src="/public/admin/js/custom.js"></script>
    <script>

        // Variable to store your files
        var files = [];
        var articles = <?= json_encode($articles) ?>;



        $(function() {

                

              $('.summernote').summernote({
                height: 200
              });

              $('.upload-image').click(function(){
                $('#avatar-upl').click();
                 return false;
              });

              $('#avatar-upl').change(function(event){

                if (typeof (FileReader) != "undefined") {
                    
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $("#preview-image").attr("src", e.target.result);
                    }
                    reader.readAsDataURL($(this)[0].files[0]);
                } else {
                   alert("This browser does not support FileReader.");
                }

                prepareUpload(event);
              });

              $('form').on('submit', function (e) {

                e.preventDefault();
                uploadFiles(e);

              });

              $('.article-block').click(function(){

                    var modal = $('#editPost');
                    var id = $(this).parents('li').attr('id');

                    var post;
                    $.each(articles, function(index, value){
                        if (value['id'] == id) {
                            post = value;
                            return;
                        }
                    });

                    modal.find('[name="title"]').val(post['title']);
                    modal.find('[name="description"]').val(post['description']);
                    modal.find('.summernote').code(post['body']);
                    
                    $('#editPostLabel span').text(id);
                    modal.modal('show');
                });
          
        });


        // Grab the files and set them to our variable
        function prepareUpload(event)
        {
          files = event.target.files;
        }

        // Catch the form submit and upload the files
        function uploadFiles(event)
        {
            event.stopPropagation(); // Stop stuff happening
            event.preventDefault(); // Totally stop stuff happening

            // START A LOADING SPINNER HERE

            // Create a formdata object and add the files
            var data = new FormData();
            $.each(files, function(key, value)
            {
                data.append(key, value);
            });

            $.ajax({
                url: '/application/core/upload.php?files',
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                success: function(data, textStatus, jqXHR)
                {
                    if(typeof data.error === 'undefined')
                    {
                        // Success so call function to process the form
                        submitForm(event, data);
                        //console.log(data);
                    }
                    else
                    {
                        // Handle errors here
                        console.log('ERRORS: ' + data.error);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                    // STOP LOADING SPINNER
                }
            });
        }

        function submitForm(event, data)
        {
          
            var $form = $(event.target);
            var fields = $form.serializeObject();
            fields['body'] = $('.summernote').code();
            fields['avatar'] = data.files[0];

            $.ajax({
                url: '/services/ajax/blog/create',
                type: 'POST',
                data: fields,
                cache: false,
                dataType: 'json',
                success: function(data, textStatus, jqXHR)
                {
                    if(typeof data.error === 'undefined')
                    {
                        // Success so call function to process the form
                        //console.log('SUCCESS: ' + data.success);
                    }
                    else
                    {
                        // Handle errors here
                        console.log('ERRORS: ' + data.error);
                    }
                    console.log(data);
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                },
                complete: function()
                {
                    // STOP LOADING SPINNER
                }
            });
        }


    </script>

</body>

</html>
