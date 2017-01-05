<script type="text/javascript">
	$(function () {
		 $('#field_type').on('change', function () {
			if ($('#field_type').val()=='multicheck') {
				$('#select_inputval').css('display', 'block');
			}
		}).change();
	});
</script>