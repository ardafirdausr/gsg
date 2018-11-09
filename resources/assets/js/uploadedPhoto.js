function showPreview(input) {
		console.log(input.files);
		if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
						$('#filename').text(input.files[0].name);
						$('#img-upload').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
		}
		else{
			$('#filename').text("");
			$('#img-upload').attr('src', "");
		}
}

$("#imgInp").change(function(){
		showPreview(this);
});