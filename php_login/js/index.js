// $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
//   var $this = $(this),
//       label = $this.prev('label');

// 	  if (e.type === 'keyup') {
// 			if ($this.val() === '') {
//           label.removeClass('active highlight');
//         } else {
//           label.addClass('active highlight');
//         }
//     } else if (e.type === 'blur') {
//     	if( $this.val() === '' ) {
//     		label.removeClass('active highlight'); 
// 			} else {
// 		    label.removeClass('highlight');   
// 			}   
//     } else if (e.type === 'focus') {
      
//       if( $this.val() === '' ) {
//     		label.removeClass('highlight'); 
// 			} 
//       else if( $this.val() !== '' ) {
// 		    label.addClass('highlight');
// 			}
//     }

// });

$('#loginForm').validate({ // initialize the plugin
	rules: {
		email: {
			required: true,
			email: true
		},
		password: {
			required: true,
		}
	},
	messages :{
        email: {
			required: "Email field is required",
			email: "Please enter valid email address"
		},
		password: {
			required: "Please enter the password",
		}
    }
});


$('#signupForm').validate({ // initialize the plugin
	rules: {
		firstname: {
			required: true,
		},
		lastname: {
			required: true,
		},
		email: {
			required: true,
			email: true
		},
		phone: {
			required: true,
			digits: true,
			minlength: 10,
			maxlength: 11,
		},
		password: {
			required: true,
		}
	},
	messages :{
        firstname: {
			required: "Please enter your First name",
		},
		lastname: {
			required: "Please enter your Last name",			
		},
		email: {
			required: "Please enter your Email",
			email: "Please enter valid email address"
		},
		phone: {
			required: "Please Enter your phone number",
			digits: "Please enter valid Phone number",
		},
		password: {
			required: "Please enter the password",
		}
    }
});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});