<!DOCTYPE html>
<!--[if lt IE 7]> <html lang="en-us" class="no-js ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html lang="en-us" class="no-js ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html lang="en-us" class="no-js ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>  
    
    <meta http-equiv="X-UA-Compatible" content="IE">
    <meta charset="utf-8">
    <meta name="robots" content="all">
    <meta name="author" content="Expodium Teem">
    <meta name="copyright" content="Expodium Teem">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="" type="image/x-icon">  
   
   
    <title>Insite Admin</title>   
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/public/assets/css/normalize.css">
    <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/redmond/jquery-ui.css">
    <link href="/public/admin/vendor/themes/metro/blue/jtable.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/public/admin/css/style.css">
    <script src="/public/assets/js/vendor/modernizr-2.8.3.min.js"></script>
  
</head>
  <body>
    
     <div id="container">
        
        <div class="ide_insite_exp_header">     
            <div class="ruler"></div>
            <button class="manmanu"></button>
            <div class="buttons-group">
                <button class="save">Save</button>
            </div>
            <div class="ide_insite_exp_header_second">
                <div class="project-tabs">
                 
                </div>
            </div>   

        </div>
          
        <div class="settings-window">
         
             <div align="set">
                <ul class="form">
                	<li class="selected"><a class="people" href="#" data-settings-menu><i class="icon-user"></i>People</a></li>
                    <li><a class="tasks" href="#" data-settings-menu><i class="icon-user"></i>Tasks <em>14</em></a></li>
                    <!-- <li><a class="profile" href="#" data-iml data-settings-menu><i class="icon-user"></i>Profile</a></li> -->
                    <!-- <li><a class="team" href="#" data-settings-menu><i class="icon-user"></i>Work Team</a></li> -->
                    <li><a class="pages" href="#" data-settings-menu><i class="icon-user"></i>Pages</a></li>
                    <li><a class="files" href="#" data-settings-menu><i class="icon-user"></i>Files</a></li>
                    <li><a class="articles" href="#" data-settings-menu><i class="icon-user"></i>Blog</a></li>
                    <!-- <li><a class="market" href="#" data-settings-menu><i class="icon-user"></i>Market</a></li> -->
                	<!-- <li><a class="messages" href="#" data-settings-menu><i class="icon-envelope-alt"></i>Messages <em>14</em></a></li> -->
                	<!-- <li><a class="seting" href="#" data-settings-menu><i class="icon-cogs"></i>Settings</a></li> -->
                	<!-- <li><a class="logout" href="#" data-settings-menu><i class="icon-signout"></i>Logout</a></li> -->
                </ul>
             </div>

             <div class="settings-field people"></div>
             <div class="settings-field tasks"></div>
             <div class="settings-field pages"></div>
             <div class="settings-field files"></div>
             <div class="settings-field articles"></div>

             <a href="#" class="settings-arrow" data-dir="right"></a>
                
        </div>
        
        
       
        
        <div id="canvasWraper" class="alpsha60">
          <div id="canvas"></div>
        </div>                                                                                                                      
      
    </div>

    
        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/public/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <!-- // <script src="/public/assets/js/vendor/bootstrap.min.js"></script> -->
        <script src="/public/assets/js/vendor/jquery.bpopup.min.js"></script>
        <script src="/public/assets/js/plugins.js"></script>
        <script src="/public/admin/js/init.js"></script>
        <script src="/public/admin/vendor/jquery.jtable.min.js" type="text/javascript"></script>

        <script type="text/javascript">

            // $(document).ready(function () {

                function people_init() {
                    //Prepare jTable
                    $('#people-container').jtable({
                        title: 'Users',
                        // useBootstrap: true,
                        // paging: true,
                        // sorting: true,
                        // defaultSorting: 'uid ASC',
                        selecting: true, //Enable selecting
                        selectingCheckboxes: true, //Show checkboxes on first column
                        actions: {
                            listAction: '/services/ajax/users/list',
                            createAction: '/services/ajax/users/create',
                            updateAction: '/services/ajax/users/update',
                            deleteAction: '/services/ajax/users/delete'
                        },
                        fields: {
                            id: {
                                key: true,
                                create: false,
                                edit: false,
                                list: false
                            },
                            firstname: {
                                title: 'First Name'
                            },
                            lastname: {
                                title: 'Last Name'
                            },
                            type: {
                                title: 'User Type',
                                options: { 'P': 'Patient', 'A': 'Admin', 'N': 'Nurse', 'H': 'Head Nurse', 'D': 'Doctor' }
                            },
                            username: {
                                title: 'Username',
                                edit: false
                            },
                            email: {
                                title: 'Email'
                            },
                            isactive: {
                                title: 'Status',
                                options: { '0': 'Inactive', '1': 'Active' },
                                create: false
                            },
                            dt: {
                                title: 'Signed up',
                                type: 'date',
                                create: false,
                                edit: false
                            }
                        }
                    });

                    //Load person list from server
                    $('#people-container').jtable('load');
                }

                function tasks_init() {
                    //Prepare jTable
                    $('#tasks-container').jtable({
                        title: 'Users',
                        // useBootstrap: true,
                        // paging: true,
                        // sorting: true,
                        // defaultSorting: 'uid ASC',
                        selecting: true, //Enable selecting
                        selectingCheckboxes: true, //Show checkboxes on first column
                        actions: {
                            listAction: '/services/ajax/tasks/list',
                            createAction: '/services/ajax/tasks/create',
                            updateAction: '/services/ajax/tasks/update',
                            deleteAction: '/services/ajax/tasks/delete'
                        },
                        fields: {
                            task_id: {
                                key: true,
                                create: false,
                                edit: false,
                                list: false
                            },
                            title: {
                                title: 'Task',
                            },
                            category: {
                                title: 'Category',
                                options: '/services/ajax/tasks/categories',
                                list: false
                            },
                            type: {
                                title: 'Type',
                                options: '/services/ajax/tasks/types',
                                list: false
                            },
                            nurse_id: {
                                title: 'Nurse',
                                options: '/services/ajax/users/nurses'
                                // options: {"21":"Nina Bodul","30":"Alex Penik"}
                            },
                            start_date: {
                                title: 'Start Date',
                                type: 'date',
                            },
                            end_date: {
                                title: 'End Date',
                                type: 'date',
                            },
                            created: {
                                title: 'Created',
                                type: 'date',
                                create: false,
                                edit: false
                            }
                        }
                    });

                    //Load person list from server
                    $('#tasks-container').jtable('load');
                }

            // });

        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            // (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            // function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            // e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            // e.src='//www.google-analytics.com/analytics.js';
            // r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            // ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

  </body>
</html>
