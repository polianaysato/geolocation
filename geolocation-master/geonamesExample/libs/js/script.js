	$(document).ready(function(){

		function myFunction(){
			var api = $('#selAPI option:selected').text();
			if(api == 'Geonames'){
				$('label').hide();
				$('#selLocation').hide();
			}else{
				$('label').show();
				$('#selLocation').show();
			}
		}



		
	});


	$('#btnRun').click(function() {

		$.ajax({
			url: "libs/php/getCountryInfo.php",
			type: 'POST',
			dataType: 'json',
			data: {
				country: $('#selCountry').val(),
				lang: $('#selLanguage').val(),
				api: $('#selAPI').val(),
				location: $('#selLocation').val()
			},
			success: function(result) {

				console.log(result);

				if (result.status.name == "ok") {

					$('#txtContinent').html(result['continent']);
					$('#txtCapital').html(result['capital']);
					$('#txtLanguages').html(result['languages']);
					$('#txtPopulation').html(result['population']);
					$('#txtArea').html(result['area']);
					$('#txtName').html(result['name']);
					$('#txtLongitude').html(result['lng']);
					$('#txtLatitude').html(result['lat']);
					$('#txtCity').html(result['city']);
					$('#txtTimezone').html(result['timezone']);

				}
			
			},
			error: function(jqXHR, textStatus, errorThrown) {
			
			}
		}); 
	

	});