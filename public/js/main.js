function realizaProceso(valorCaja1, valorCaja2){

        var tok = $('#_token').val();

   var parametros = {
        "valorCaja1" : valorCaja1,
        "valorCaja2" : valorCaja2,
        "_token" : tok
    };

        $.ajax({
			data:  parametros,
			url:   'tess/ajax',
			type:  'POST',
			dataType: 'json',
			beforeSend: function () {
				
			},
			success:  function (data) {
				//console.log(data[]);
				console.log(data['ok']);
				console.log(data['save']);
			}
        });
}