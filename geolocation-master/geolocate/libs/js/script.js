	$('#btnRun').click(function() {

		$.ajax({
			url: "libs/php/geolocate.php",
			type: 'POST',
			dataType: 'json',
			data: {
				q: $('#selCountry').val(),
				lang: $('#selLanguage').val()
			},
			success: function(result) {

				console.log(result);

				if (result) {

					$('#txtContinent').html(result['results'][0]['formatted']);
					$('#txtCapital').html(result['results'][0]['geometry']['lat']);
					$('#txtLanguages').html(result['results'][0]['geometry']['lng']);
					$('#txtPopulation').html(result['results'][0]['timezone']);
					$('#txtArea').html(result['results'][0]['countryCode']);

				}
			
			},
			error: function(jqXHR, textStatus, errorThrown) {
				// your error code
			}
		}); 
	

	});