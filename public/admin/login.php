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
   
   
    <title>Insite Admin Login</title>   
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/public/assets/css/normalize.css">
    <link rel="stylesheet" href="/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/bootstrap-theme.min.css">
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
          
        <div id="canvasWraper" class="alpsha60">
          <div id="canvas"></div>
        </div>                                                                                                                      
      
    </div>

    <div class="login-form">
                  
                
                <form>

                    <li>
                        <input name="username" type="text" class="text" value="" placeholder="USERNAME" >
                    </li>
                    <li>
                        <input name="password" type="password" placeholder="Password" value="">
                    </li>
                    <div class="p-container">
                                <!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>Remember Me</label> -->
                                <input type="submit" value="SIGN IN" >
                            <div class="clear"> </div>
                    </div>
                </form>
                </div>
           
    </div>
        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/public/assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="/public/assets/js/vendor/bootstrap.min.js"></script>
        <script src="/public/assets/js/vendor/jquery.bpopup.min.js"></script>
        <script src="/public/assets/js/plugins.js"></script>
        <script src="/public/assets/js/jquery.bpopup.min.js"></script>
        <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
        <script src="/public/admin/js/init.js"></script>

        <script>
            $(document).ready(function() {
               //$('#example').DataTable();
               $('.login-form').bPopup({
                  opacity: 0.9,
                  modal: false
               }).find('form')
                 .submit(function (){

                  $.ajax({

                       url: '/services/ajax/auth/login',
                       data: $(this).serializeObject(),
                       error: function() {
                          $('#info').html('<p>An error has occurred</p>');
                       },
                       dataType: 'json',
                       success: function(data) {
                          if (data.error == 0) {
                              window.location.href = "/";
                          }
                            else {
                              console.log(data);
                            }
                       },
                       type: 'POST'

                  });
                  return false;

               });

            });
        </script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>

  </body>
</html>
