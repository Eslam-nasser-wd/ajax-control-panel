var finalUrl;

document.addEventListener('DOMContentLoaded', function (event) {
	'use strict';

	// Initialise resize library
	var resize = new window.resize();
	resize.init();

	// Upload photo
	var upload = function (photo, callback) {
		var formData = new FormData();
		formData.append('photo', photo);
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState === 4) {
				callback(request.response);
			}
		}
		request.open('POST', 'process.php');
		request.responseType = 'json';
		request.send(formData);
	};


	document.querySelector('form input[type=file]').addEventListener('change', function (event) {
		event.preventDefault();

		var files = event.target.files;
		for (var i in files) {

			if (typeof files[i] !== 'object') return false;

			(function () {

				var initialSize = files[i].size;

				resize.photo(files[i], 1200, 'file', function (resizedFile) {

					var resizedSize = resizedFile.size;

					upload(resizedFile, function (response) {
						finalUrl = response.url;
					});

					// This is not used in the demo, but an example which returns a data URL so yan can show the user a thumbnail before uploading th image.
					resize.photo(resizedFile, 600, 'dataURL', function (thumbnail) {
						// console.log(finalUrl);
					});

				});

			}());

		}

	});

});
