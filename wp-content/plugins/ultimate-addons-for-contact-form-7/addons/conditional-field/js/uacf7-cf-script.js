; (function ($) {
	'use strict';

	jQuery(document).ready(function () {

		var $this = false;
		uacf7_cf_handler_this($this);

		jQuery(document).on('keyup', '.wpcf7-form input:not(.wpcf7-uacf7_country_dropdown, .wpcf7-uacf7_city, .wpcf7-uacf7_state, .wpcf7-uacf7_zip), .wpcf7-form textarea', function () {
			var $this = $(this);
			uacf7_cf_handler_this($this);
		});

		jQuery(document).on('change', '.wpcf7-form select:not(.wpcf7-uacf7_product_dropdown), .wpcf7-form input[type="radio"]:not(.uacf7-rating input[type="radio"]), .wpcf7-form input[type="date"]', function () {
			var $this = $(this);
			uacf7_cf_handler_this($this);
		});

		jQuery(document).on('change', 'input[type="checkbox"]', function () {
			var $this = $(this);
			uacf7_cf_handler_this($this);
		});

	});


	/*
	 * Conditional script
	 */
	function uacf7_cf_handler_this($this) {
		jQuery('form.wpcf7-form').each(function () {
			var contactFormId = jQuery('input[name="_wpcf7"]', this).val();
			var repeater_count = jQuery('.uacf7-repeater-count', this).val();
			var form = uacf7_cf_object[contactFormId];
			var $i = 0;

			if (typeof repeater_count === 'undefined') {
				var repeater_weapper = '.uacf7_conditional';
			} else {
				if ($this == false) {
					var repeater_weapper = '.uacf7_conditional';
				} else {
					if (typeof $this.attr('uacf-original-name') === 'undefined' || $this.attr('uacf-original-name').length == 0) {
						var repeater_weapper = '.uacf7_conditional';
					} else {
						var repeater_weapper = $this.closest('.uacf7_repeater_sub_field');
					}

				}
			}

			// Condition  repeater Checked 
			var tag_name_array = [];
			var count = 0;
			var count_2 = 0;
			jQuery(form).each(function () {
				var $uacf7_cf_conditions = form[count_2]['uacf7_cf_conditions'];
				var $conditionsLength = $uacf7_cf_conditions['uacf7_cf_tn'].length;
				var x;
				if (typeof repeater_count !== 'undefined') {
					for (x = 0; x < $conditionsLength; x++) {
						tag_name_array.push($uacf7_cf_conditions['uacf7_cf_tn'][x]);
						count++;
					}
				}
				count_2++
			});

			if (typeof repeater_count !== 'undefined') {
				if ($this != false) {
					if (typeof $this.attr('uacf-original-name') !== 'undefined') {
						if (jQuery.inArray($this.attr('uacf-original-name'), tag_name_array) == -1) {
							return false;
						}
					}

				}
			}

			// Condition  repeater Checked End
			jQuery(form).each(function () {

				var $uacf7_cf_conditions = form[$i]['uacf7_cf_conditions'];
				var $conditionsLength = $uacf7_cf_conditions['uacf7_cf_tn'].length;

				/*
				* Checking validation.
				* If tag name not empty 
				*/
				if ($conditionsLength > 0 && form[$i]['uacf7_cf_group'] != '') {
					/* Fields value */
					var vaL = jQuery('.wpcf7-form [name="' + $uacf7_cf_conditions['uacf7_cf_tn'] + '"]').val();

					if (jQuery('.wpcf7-form [name="' + $uacf7_cf_conditions['uacf7_cf_tn'] + '"]').is("input[type='radio']")) {
						var vaL = jQuery('.wpcf7-form [name="' + $uacf7_cf_conditions['uacf7_cf_tn'] + '"]:checked').val();
					}

					/* 
					* Conditions If show
					*/
					if (form[$i]['uacf7_cf_hs'] == 'show') {
						if (typeof repeater_count === 'undefined') {
							jQuery('.uacf7_conditional.' + form[$i]['uacf7_cf_group'] + '').hide().addClass('uacf7-hidden');

						} else {
							if ($this == false) {
								jQuery('.uacf7_conditional.' + form[$i]['uacf7_cf_group'] + '').hide().addClass('uacf7-hidden');

							} else {
								if (typeof $this.attr('uacf-original-name') === 'undefined' || $this.attr('uacf-original-name').length == 0) {
									jQuery('.uacf7_conditional.' + form[$i]['uacf7_cf_group'] + '').hide().addClass('uacf7-hidden');

								} else {
									$this.closest('.uacf7_repeater_sub_field').find('.uacf7_conditional.' + form[$i]['uacf7_cf_group'] + '').hide().addClass('uacf7-hidden');

								}
							}
						}
					}

					var $conditionRule = '';
					var x;
					var $conditions = [];
					for (x = 0; x < $conditionsLength; x++) {
						var $tag_name = $uacf7_cf_conditions['uacf7_cf_tn'][x];

						if (typeof $tag_name === 'undefined') {
							var $tag_name = $uacf7_cf_conditions['uacf7_cf_tn'][x];
						}

						if ($tag_name == $uacf7_cf_conditions['uacf7_cf_tn'][x]) {
							var maybeChecked = '';
							var maybeMultiple = '';
							var checkedItem = '';

							if (jQuery('.wpcf7-form [name="' + $tag_name + '"]').is("input[type='radio']")) {
								var maybeChecked = ':checked';
							}

							if (jQuery('.wpcf7-form [name="' + $tag_name + '"]').is("input[type='checkbox']")) {

								var maybeChecked = ':checked';
								var maybeMultiple = '[]';

								var checked_values = [];
								jQuery('.wpcf7-form [name="' + $tag_name + '"]:checked').each(function () {

									checked_values.push(jQuery(this).val());
								});

								var index = checked_values.indexOf($uacf7_cf_conditions['uacf7_cf_val'][x]);

								var checkedItem = checked_values[index];

							}
							// //Repeater support
							var tagName = $tag_name.replace('[]', '');

							if (jQuery('.wpcf7-form [uacf-original-name="' + $tag_name + '"]').is("input[type='checkbox']") || jQuery('.wpcf7-form [uacf-original-name="' + $tag_name + '"]').is("input[type='radio']")) {

								var maybeChecked = ':checked';
								var maybeMultiple = '[]';

								var checked_values = [];
								//Repeater support
								jQuery('.wpcf7-form-control-wrap.' + tagName + ' input:checked').each(function () {

									checked_values.push(jQuery(this).val());
								});

								var index = checked_values.indexOf($uacf7_cf_conditions['uacf7_cf_val'][x]);

								var checkedItem = checked_values[index];

							}
							if (typeof repeater_count === 'undefined') {
								var currentValue = jQuery('.wpcf7-form [name="' + $uacf7_cf_conditions['uacf7_cf_tn'][x] + '"]' + maybeChecked + '').val();
							} else {
								var current_field = jQuery('.wpcf7-form [uacf-original-name="' + $uacf7_cf_conditions['uacf7_cf_tn'][x] + '"]');
								if ($this == false) {

									if (typeof current_field === 'undefined') {
										var current_field = jQuery('.wpcf7-form [name="' + $uacf7_cf_conditions['uacf7_cf_tn'][x] + '"]');

									} else {
										var currentValue = jQuery('.wpcf7-form [uacf-original-name="' + $uacf7_cf_conditions['uacf7_cf_tn'][x] + '"]' + maybeChecked + '').val();
									}

								} else {
									// console.log(current_field);
									if (typeof current_field === 'undefined' || current_field.length == 0) {
										var currentValue = jQuery('.wpcf7-form [name="' + $uacf7_cf_conditions['uacf7_cf_tn'][x] + '"]' + maybeChecked + '').val();
									} else {
										var currentValue = repeater_weapper.find('[uacf-original-name="' + $uacf7_cf_conditions['uacf7_cf_tn'][x] + '"]' + maybeChecked + '').val();
									}
								}

							}
							if (jQuery('.wpcf7-form [name="' + $uacf7_cf_conditions['uacf7_cf_tn'][x] + '"]').is("input[type='checkbox']")) {

								if (typeof checkedItem === 'undefined') {
									var currentValue = '';

								} else {
									var currentValue = checkedItem;
								}


							}

							if ($uacf7_cf_conditions['uacf7_cf_operator'][x] == 'equal') {

								if (currentValue == $uacf7_cf_conditions['uacf7_cf_val'][x]) {

									$conditions.push('true');

								} else {
									$conditions.push('false');

								}
							}

							if ($uacf7_cf_conditions['uacf7_cf_operator'][x] == 'not_equal') {

								if (currentValue != $uacf7_cf_conditions['uacf7_cf_val'][x]) {

									$conditions.push('true');

								} else {
									$conditions.push('false');

								}
							}

							if ($uacf7_cf_conditions['uacf7_cf_operator'][x] == 'greater_than') {

								if (parseInt(currentValue) > parseInt($uacf7_cf_conditions['uacf7_cf_val'][x])) {

									$conditions.push('true');

								} else {
									$conditions.push('false');

								}
							}

							if ($uacf7_cf_conditions['uacf7_cf_operator'][x] == 'less_than') {

								if (parseInt(currentValue) < parseInt($uacf7_cf_conditions['uacf7_cf_val'][x])) {

									$conditions.push('true');

								} else {
									$conditions.push('false');

								}
							}

							if ($uacf7_cf_conditions['uacf7_cf_operator'][x] == 'greater_than_or_equal_to') {

								if (parseInt(currentValue) >= parseInt($uacf7_cf_conditions['uacf7_cf_val'][x])) {

									$conditions.push('true');

								} else {
									$conditions.push('false');

								}
							}
							if ($uacf7_cf_conditions['uacf7_cf_operator'][x] == 'less_than_or_equal_to') {

								if (parseInt(currentValue) <= parseInt($uacf7_cf_conditions['uacf7_cf_val'][x])) {

									$conditions.push('true');

								} else {
									$conditions.push('false');

								}
							}
						}

					}

					if (typeof repeater_count === 'undefined') {
						var $this_condition = jQuery(repeater_weapper + '.' + form[$i]['uacf7_cf_group'] + '');
					} else {
						if ($this == false) {
							var $this_condition = jQuery('.uacf7_conditional.' + form[$i]['uacf7_cf_group'] + '');
						} else {
							if (typeof $this.attr('uacf-original-name') === 'undefined' || $this.attr('uacf-original-name').length == 0) {
								var $this_condition = jQuery(repeater_weapper + '.' + form[$i]['uacf7_cf_group'] + '');
							} else {
								var $this_condition = repeater_weapper.find('.uacf7_conditional.' + form[$i]['uacf7_cf_group'] + '');
							}
						}
					}

					if (form[$i]['uacf7_cf_condition_for'] === 'all') {
						var equalResult = $conditions.indexOf("false");

						if (form[$i]['uacf7_cf_hs'] == 'show') {
							if (equalResult == -1) { //IF not false and all true
								$this_condition.show().removeClass('uacf7-hidden');
								$this_condition.attr('data-condition', 'true');
							} else {
								$this_condition.hide().addClass('uacf7-hidden');
								$this_condition.attr('data-condition', 'false');
							}

						} else {
							if (equalResult == -1) { //IF not false and all true
								$this_condition.hide().addClass('uacf7-hidden');
								$this_condition.attr('data-condition', 'true');
							} else {
								$this_condition.show().removeClass('uacf7-hidden');
								$this_condition.attr('data-condition', 'false');
							}
						}
					} else {
						var orResult = $conditions.indexOf("true");
						if (form[$i]['uacf7_cf_hs'] == 'show') {
							if (orResult != -1) { //IF true or false 
								$this_condition.show().removeClass('uacf7-hidden');
								$this_condition.attr('data-condition', 'true');
							} else {
								$this_condition.hide().addClass('uacf7-hidden');
								$this_condition.attr('data-condition', 'false');
							}

						} else {
							if (orResult == -1) { //IF true or false
								$this_condition.show().removeClass('uacf7-hidden');
								$this_condition.attr('data-condition', 'true');
							} else {
								$this_condition.hide().addClass('uacf7-hidden');
								$this_condition.attr('data-condition', 'false');
							}
						}
					}
				}
				$i++;
			});
		});

		uacf7_skip_validation();
	}
	/*
	 * Conditional script
	 */

	/*
	 * Skip validation
	 */
	function uacf7_skip_validation() {

		jQuery('form.wpcf7-form').each(function () {

			var $form = jQuery(this);
			var hidden_fields = [];
			jQuery('.uacf7_conditional', $form).each(function () {
				var $this = jQuery(this);

				if ($this.hasClass('uacf7-hidden')) {

					$this.find('input,select,textarea').each(function () {
						hidden_fields.push(jQuery(this).attr('name'));
					});
				}
			});
			$form.find('[name="_uacf7_hidden_conditional_fields"]').val(JSON.stringify(hidden_fields));

			$form.on('submit', function () {
				uacf7_skip_validation();
			});

		});
	}

})(jQuery);
