<script>
	setTimeout(function(){
		var script = document.createElement('script');
		script.src = "<?php echo base_url() ?>api/js/HRD_USER_FORM.js";
		$("#dynamicScript").append(script);
	},3000)
</script>