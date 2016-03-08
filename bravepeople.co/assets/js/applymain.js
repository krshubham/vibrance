
$(document).ready(function() {

	var el = {
		form: $('#apply')
	};

	el.submit = {
		button: $('input[type=submit]', el.form)
	};

	el.fields = {
		all: $('.jobs-var', el.form),
		required: $('.required', el.form)
	};

	var form = {

		init: function() {
			// keep valid state
			this.valid = true;

			// use classes to target certain elements in ie6
			if (el.form.find('> ul').hasClass('ie6')) {
				el.form.find('input[type=text]').addClass('input-text');
				el.form.find('textarea').addClass('textarea');
			}

			this.events();
		},
		
		errors: {
			clearAll: function() {
				// clear error messages
				$('.error', el.form).removeClass('error');
				$('.error-message', el.form).remove();
				$('.jobs-project h4.type').css('color','#acb1b1');
			},

			show: function(message, el) {
				$(el)
					.addClass('error')
					.append('<span class=\"error-message\">' + message + '</span>');
				
				if ($(el).attr('name')=='project-types-val') {
					$('.jobs-project h4.type').css('color','#d62c2c');
				}
				
				// mark form as invalid
				form.valid = false;
			}
		},

		validate: function() {
			var self = this;

			// reset initial from valid state
			form.valid = true;

			// clear errors
			this.errors.clearAll();

			el.fields.all.each(function(i, el) {
				// get data from fields
				// only input and textarea fields can have validations at the moment
				var preData = $(this).val();
				var placeholderData = $(this).attr('title');
				if (preData != '' && preData != placeholderData) {
					var data = $(this).val();
				}
				//console.log($(this).find('input, textarea, select').attr('name'));
				//console.log(data);

				// check if this field needs validation
				var required = $(el).hasClass('required');
				
					//email = $(el).hasClass('email'),
					//numeric = $(el).hasClass('numeric'),
					//alpha = $(el).hasClass('alpha');

				// return early if not a required field and no data to check
				if (!required && !data)
					return;

				// if required and no data filled in, show an error
				if (required && !data) {
					//return self.errors.show('This field is required', el);
					//console.log('e');
					return self.errors.show('', el);
				}
				//else if (data == $(el).attr('title')) {
					//return self.errors.show('', el);
				//}
				
				/*
				if (email && !(/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(data)))
					//return self.errors.show('Please enter a valid email address', el);
					return self.errors.show('', el);

				if (numeric && !(/^[0-9]+$/.test(data)))
					//return self.errors.show('Please enter a number without spaces, dots or commas', el);
					return self.errors.show('', el);

				if (alpha && !(/^[a-zA-Z ]+$/.test(data)))
					//return self.errors.show('This field accepts only letters &amp; spaces', el);
					return self.errors.show('', el);
				*/
				
			});
		},

		buttonState: {
			active: function() {
				el.submit.button
					.removeClass()
					.val('Send');
			},
			sending: function() {
				el.submit.button
					.removeClass()
					.addClass('sending')
					.val('Sending');
			},
			failed: function() {
				el.submit.button
					.removeClass()
					.addClass('try-again')
					.val('Try Again');
			},
			sent: function() {
				el.submit.button
					.removeClass()
					.addClass('sent')
					.val('Sent')
					.attr('disabled', true);
			}
		},

		submit: function() {
			var self = this;
			
			clearPlaceholders();
			
			$.post('assets/sendform.php', el.form.serialize() + '&request_method=ajax', function(response) {
				// does the word 'PASS' exist in response
				var success = /PASS/.test(response) ? true : false;

				if (success) {
					// form submitted and response received
					setTimeout(function() {
						self.buttonState.sent();
					}, 1000);
				} else {
					// fallback to non-ajax submission
					// since the validation said the form was OK
					// but the server responded with a FAIL
					el.form
						.unbind('submit')
						.submit();
				}
			});
		},

		events: function() {
			var self = this;

			el.form.submit(function() {
				
				setProjectTypes();
				setBudgetType();
				
				// validate form
				self.validate();
				self.buttonState.sending();

				// submit form if valid
				if (self.valid) {
					//self.submit();
					return true;
				} else {
					setTimeout(function() {
						self.buttonState.failed();
					}, 1000);
				}
				
				// prevent default action
				return false;
			});
		}
	};

	form.init();
	
	function setBudgetType() {
		if (isMobile()) {
			$('#budget-amount').remove();	
		}
		else {
			$('#budget-amount').removeAttr('disabled');
			$('#budget-select').remove();	
		}
	}
	
	function clearPlaceholders() {
		$('.jobs-var').each(function() {
			if($(this).val().toLowerCase() == $(this).attr('title').toLowerCase()) {
				$(this).val('');
			}
		});
	}
	
	function setProjectTypes() {
		var values = '';
		$('#project-types li').each(function() {
			if($(this).find('span').hasClass('active')) {
				values += $(this).attr('id') + ', ';	
			}
		});
		$('#project-types-val').val(values.substring(0, values.length - 1));
	}
	
	function isMobile() {
		if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
			return true;
		}
		else {
			return false;
		}
	}
	if (isMobile()) {
		$('#budget-container').hide();
		$('#budget-container-mobile').show();
	}
	
	
	// Form Placeholders
	
	var colorHolder = new Array();
	var defaultTextHolder = new Array();
	var defaultColorHolder = new Array();
	
	function bravePlaceholder() {
		$('.add-placeholder').each(function(e){
			var id = $(this).attr('id');
			defaultColorHolder[id] = $(this).css('color');
			defaultTextHolder[id] = $(this).attr('title');
			colorHolder[id] = $(this).attr('phc');
			var placeholder = $(this).attr('title');
			$(this).val(placeholder);
			$(this).css('color',colorHolder[id]);
			
		});
	}
	bravePlaceholder();
	
	$('.add-placeholder').on('focus', function() {
		var id = $(this).attr('id');
		if ($(this).val() == defaultTextHolder[id])
		{
			$(this).val('');
			$(this).css('color',defaultColorHolder[id]);
		}
	});
	$('.add-placeholder').on('blur', function() {
		var id = $(this).attr('id');
		if ($(this).val() == '')
		{
			$(this).css('color',colorHolder[id]);
			$(this).val(defaultTextHolder[id]);
		}
	});
	
	// End Placeholders
	
	$('#project-types li span').click(function() {
		var checkbox = $(this);
		if ($(this).hasClass('active')) {
			checkbox.removeClass('active');
		}
		else {
			checkbox.addClass('active');
		}
	});
	
	
});