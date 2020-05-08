<!DOCTYPE html>
<html>
<head>
	<title>JSON - Dropdown Dinamis</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<br><br>
	<div class="container" style="width:600px;">
		<h2 align="center">JSON - Dropdown Dinamis</h2>
		<br><br>
		<select name="pil1" id="Pertama" class="form-control input-lg">
			<option value="">Pilihan Pertama</option>
		</select><br>
		<select name="pil2" id="Kedua" class="form-control input-lg">
			<option value="">Pilihan Kedua</option>
		</select><br>
		<select name="pil3" id="Ketiga" class="form-control input-lg">
			<option value="">Pilihan Ketiga</option>
		</select>
	</div>
</body>
</html>

<script>
$(document).ready(function() {

	load_json_data('Pertama');

	function load_json_data(id, parent_id) {
		var	html_code = '';
		$.getJSON('jurusan.json', function(data) {
			html_code += "<option value=''>Pilihan " + id + "</option>";
			$.each(data, function(key, value) {
				if(id == 'Pertama') {
					if(value.parent_id == '0') {
						html_code += "<option value='" + value.id + "'>" + value.jurusan + "</option>";
					}
				} else {
					if(value.parent_id == parent_id) {
						html_code += "<option value='" + value.id + "'>" + value.jurusan + "</option>";
					}
				}
			});
			$('#'+id).html(html_code);
		});
	}

	$(document).on('change', '#Pertama', function() {
		var id_pertama = $(this).val();
		if(id_pertama != '') {
			load_json_data('Kedua', id_pertama);
			// console.log(id_pertama);
		} else {
			$('#Kedua').html('<option value="">Pilihan Kedua</option>');
			$('#Ketiga').html('<option value="">Pilihan Ketiga</option>');
		}
	});

	$(document).on('change', '#Kedua', function() {
		var id_kedua = $(this).val();
		if(id_kedua != '') {
			load_json_data('Ketiga', id_kedua);
			// console.log(id_kedua);
		} else {
			$('#Ketiga').html('<option value="">Pilihan Ketiga</option>');
		}
	});
});
</script>