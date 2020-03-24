<script>
	console.log('123')
	setTimeout(function(){
		var script = document.createElement('script');
		script.src = "<?php echo base_url() ?>api/js/MASTER_KARYAWAN_PAGE.js?<?php echo date('Ymdhms') ?>";
		$("#dynamicScript").append(script);

	},7000);
	
</script>