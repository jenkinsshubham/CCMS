$(document).ready(function() { 
	$('#password_confirm').on('keyup', function () {
	    if ($('#password').val() == $('#password_confirm').val()) {
	        $('#password_confirm').css('color', 'green');
	    } else 
	        $('#password_confirm').css('color', 'red');
	});

    // start username validation
            var min_chars = 4;  
      
            //result texts  
            var characters_error = 'Minimum amount of chars is 4';  
            var checking_html = 'Checking...';  
      
            //when button is clicked  
            $('#username').on('keyup',function(){   
                //run the character number check  
                if($('#username').val().length < min_chars){  
                    //if it's bellow the minimum show characters_error text '  
                    $('#username_availability_result').html(characters_error);  
                }else{  
                    //else show the cheking_text and run the function to check  
                    $('#username_availability_result').html(checking_html);  
                    check_availability();  
                }  
            });
    // end username validation

});

      
    //function to check username availability  
    function check_availability(){  
      
            //get the username  
            var username = $('#username').val();  
      
            //use ajax to run the check  
            $.post("/sitn/Controllers/functions/reg_validation.php", { username: username },  
                function(result){  
                    //if the result is 1  
                    if(result == 1){ 
                    	icon="<span class='glyphicon glyphicon-ok'></span> "; 
                        //show that the username is available  
                        $('#username_availability_result').html(icon + username + ' is available');  
                    }else{  
                    	icon="<span class='glyphicon glyphicon-remove'></span> "; 
                        $('#username_availability_result').html(icon + username + ' is not available');  
                    }  
            });  
      
    } 