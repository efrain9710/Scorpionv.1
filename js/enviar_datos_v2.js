

/*envia un formulario a otra pagina
*@param id del formulario a enviar.
*@param  archivo php a donde se envia el formulario.
*@param id del div en donde se recibe la respuesta.
*/
			window.onload = function () {
			document.formularioContacto.addEventListener('submit', validarFormulario);
			}
			 
			function validarFormulario(evObject) {
			evObject.preventDefault();
			var todoCorrecto = true;
			var formulario = document.formularioContacto;
			for (var i=0; i<formulario.length; i++) {
			                if(formulario[i].type =='text') {
			                               if (formulario[i].value == null || formulario[i].value.length == 0 || /^\s*$/.test(formulario[i].value)){
			                               alert (formulario[i] 'Error no puede estar vacío o contener sólo espacios en blanco');
			                               todoCorrecto=false;
			                               location.href="modificar.php";
			                               }
			                }
			                }
			if (todoCorrecto ==true) {
				
					function enviar_formulario(idformulario, archivodestino, divrecibe)
						{
							console.log("enviando formulario"+" "+idformulario+" "+archivodestino+" "+ divrecibe);
							$(function ()
								{
										//
								        $("#"+idformulario).on("submit", function(e){
								            e.preventDefault();
								            var f = $(this);
								            var formData = new FormData(document.getElementById(idformulario));
								            console.log( formData['Name'] );
								            formData.append("dato", "valor");
								            //formData.append(f.attr("name"), $(this)[0].files[0]);
								            $.ajax({
								                url: archivodestino,
								                type: "post",
								                dataType: "html",
								                data: formData,
								                cache: false,
								                contentType: false,
								         		processData: false
								            })

								                .done(function(res)
								                	{
								                    	$("#"+divrecibe).html(res);
								               	 	});
								        });
								});
						}

			}

		}





