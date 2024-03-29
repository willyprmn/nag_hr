$url = "http://localhost/nag-erp/api/webservices/";
$(document).ready(function () {
	url = window.location.search;
	$split_nya = url.split("&id=");
	if ($split_nya[1]) {
		//lookup_bpb();
		//callBack_ListKontraBon($split_nya[1]);	 
		//$("#klik_saya").attr("disabled",true);
		//$("#curr").attr("disabled",true);
		CallExistingData()
	}

	GenerateTable();
});


function save() {
	if ($data.id == "") {
		var $format = "1";
	} else {
		var $format = "2";
	}
	$.ajax({
		type: "POST",
		cache: false,
		url: $url + "MASTER_KARYAWAN_PAGE.php",
		data: { code: '1', format: $format, data: $data },     // multiple data sent using ajax
		success: function (response) {
			data = response;
			console.log(data);
			d = JSON.parse(data);
			console.log(d.message);
			if (d.message == '1') {
				var my_coa = decodeURIComponent(d.records[0].id_coa);
				console.log(d);
				$("#bank").val(my_coa).trigger("change");
			}
			else {
				alert(d.records);
			}
		}
	});
}


function GenerateTable() {
	table = $('#DataKaryawan').DataTable({
		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
			url: $url + "MASTER_KARYAWAN_PAGE.php",
		},
		"aoColumns": [
			{ data: 'no' },
			{ data: 'n_nik' },
			{ data: 's_nm_lengkap' },
			{ data: 's_departement' },
			{ data: 's_bagian' },
			{ data: 's_jabatan' },
			{ data: 'd_tgl_mulai' },
			{
				"data": null,
				"render": function (data) {
					console.log(data);
					return decodeURIComponent(data.button);
				}
			}
		]
	});
}