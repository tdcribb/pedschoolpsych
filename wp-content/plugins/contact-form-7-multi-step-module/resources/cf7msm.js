jQuery(document).ready(function($) {
	if (cf7msm_posted_data) {
		var step_field = $("input[name='step']");
		//multi step forms
		if (step_field.length > 0) {
			var cf7_form = $(step_field[0].form);
			$.each(cf7msm_posted_data, function(key, val){
				if (key == 'cf7msm_prev_url') {
					cf7_form.find('.wpcf7-back').click(function(e){
						window.location.href = val;
						e.preventDefault();
					});
				}
				if (key.indexOf('_') != 0 && key != 'step') {
					var field = cf7_form.find('*[name="' + key + '"]');
					if (field.length > 0) {
						field.val(val);
					}
					else {
						//checkbox
						field = cf7_form.find('input[name="' + key + '[]"]'); //value is this or this or tihs
						if (field.length > 0) {
							$.each(val, function(i, v){
								field.filter('input[value="' + v + '"]').prop('checked', true);
							});
						}
					}
				}
			});
		} //end multi step forms
	}
});