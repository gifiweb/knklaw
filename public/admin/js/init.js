/**
       * [toggleFlyWin description]
       * @param  {[type]} action [description]
       * @param  {[type]} mode   [description]
       * @return {[type]}        [description]
       */
      function toggleFlyWin(action, mode) {
      
            if (action == 'toggle')  {
            
                  if ($('.settings-arrow').attr('data-dir') == 'left')  action = 'close';
                      else  action = 'open';
            
            }
            
            $('.settings-arrow').hide();
            
            switch (action) {
            
                case "open"    :   {
                   
                    $('.settings-arrow').css({right: 0, left: 'auto'});
                    $('.settings-window').css('background','#F5F5F5').animate({right: '0px'}, 600, 
                        
                        function () {
                                        
                            $('.settings-arrow').attr('data-dir', 'left').css({'background-position':'center left'});
                                    
                        });
                        $('.' + mode).click();
                        
                    break;
                    
                }
                
                case "close"   :   {
                   
                    $('.settings-arrow').css({left: '0', right: 'auto'});
                    $('.settings-window').css('background','transparent').animate({right: '102%'}, 600, 
                    
                        function () {
                                        
                            $('.settings-arrow').attr('data-dir', 'right').css({'background-position':'center right'});  
                                  
                        });
                        
                    break;
                    
                }
            
            }
      
      }   

      $('.save').click(function (e) {
                      
          $.ajax({

              type: "POST",
              url: "/services/ajax",
              data: {action: 'save-project', destination: 'insite.php'},
              success: function(responce) {

                console.log(responce);
                                  
              }
        })
                                
    });

    $('.manmanu').click(function () {
                      
        toggleFlyWin('toggle', 'seting');
        $(this).blur();
                      
    });

    $('ul.form li a').click( function(e) {
                            
        e.preventDefault(); // prevent the default action
        e.stopPropagation; // stop the click from bubbling
        $(this).closest('ul').find('.selected').removeClass('selected');
        $(this).parent().addClass('selected');
        var win = $(this).attr('class');
        //console.log(win);
                            
        $('.settings-field').hide();
        $('.settings-field.' + win).load(
            '/public/admin/' + win + '.php .settings-field.' + win + ' > *', 
            function (response, status, xhr) {
                switch (win) {
                  case "people" : 
                      people_init();
                      break;
                  case "tasks" : 
                      tasks_init();
                      break;     
                }
                $('.settings-field.' + win).show();
            }
        );

        
                            
    }).eq(0).click();

    
