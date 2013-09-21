jQuery(document).ready( function($) {
	
	$("#bsk_pdf_manager_categories_id").change( function() {
		var cat_id = $(this).val();
		var new_action = $("#bsk-pdf-manager-pdfs-form-id").attr('action') + '&cat=' + cat_id;
		
		$("#bsk-pdf-manager-pdfs-form-id").attr('action', new_action);
		
		$("#bsk-pdf-manager-pdfs-form-id").submit();
	});
	
	$("#doaction").click( function() {
		var cat_id = $("#bsk_pdf_manager_categories_id").val();
		var new_action = $("#bsk-pdf-manager-pdfs-form-id").attr('action') + '&cat=' + cat_id;
		
		$("#bsk-pdf-manager-pdfs-form-id").attr('action', new_action);
		
		return true;
	});
	
	$("#bsk_pdf_manager_category_save").click( function() {
		var cat_title = $("#cat_title_id").val();
		if ($.trim(cat_title) == ''){
			alert('Category title can not be NULL.');
			
			$("#cat_title_id").focus();
			return false;
		}
		
		$("#bsk-pdf-manager-category-edit-form-id").submit();
	});
	
	$("#bsk_pdf_manager_pdf_save_form").click( function() {
		//check category
		var category = $("#bsk_pdf_manager_pdf_edit_categories_id").val();
		if (category < 1){
			alert('Please select category.');
			$("#bsk_pdf_manager_pdf_edit_categories_id").focus();
			return fasle;
		}
		
		//check title
		var pdf_title = $("#bsk_pdf_manager_pdf_titile_id").val();
		if ($.trim(pdf_title) == ''){
			alert('PDF title can not be NULL.');
			$("#bsk_pdf_manager_pdf_titile_id").focus();
			return false;
		}
		
		//check file
		if ($("#bsk_pdf_manager_pdf_file_old_id").length > 0){
			var is_delete = $("#bsk_pdf_manager_pdf_file_rmv_id").attr('checked');
			if (is_delete){
				var file_name = $("#bsk_pdf_file_id").val();
				file_name = $.trim(file_name);
				if (file_name == ""){
					alert('Please select a new PDF to upload because you checked delete old one.');
					$("#bsk_pdf_file_id").focus();
					return false;
				}
			}
			
		}else{
			var file_name = $("#bsk_pdf_file_id").val();
			file_name = $.trim(file_name);
			if (file_name == ""){
				alert('Please select a file to upload.');
				$("#bsk_pdf_file_id").focus();
				return false;
			}
		}
		
		$("#bsk-pdf-manager-pdfs-form-id").submit();
	});
	
	
});
