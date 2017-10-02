
<?php

    include( "BD.php" );

    class Graficos extends BD
    {
        /**
        * Constructor de la clase.
        */
        public function Graficos()
        {
            $this->ini(); //En el constructor se inicializan todos los requerimientos de la clase BD.
        }
        /*
		*Esta funcion se encarga de dar una notificacion en caso de que la  insercion se halla realizado o no.
		*@param varchar consulta sql
		*@retun retorna una notificacion para saber si la insercion fue un exitasa o no.
		*/
        function imprimir_validacion($cons)
        {
			//$r = $this->retornar_tabla($cons);
			$rta = "";
			// if (mysqli_affected_rows($this->conectar()) == 0)
			if(mysqli_affected_rows($this->conectar()) ==0)
			{
				$rta.= header( "location: per.php" );
			}
			else
			{
				$rta.= "<div class='alert alert-warning'><h2><center>Hubo un error al modificar el archivo</center></h2></div>";
			}
			return $rta;
        }

         /*
        *esta funcion se encarga de validar el usuario darle el permiso de ingresar al adminisstrador o denegar el aceso al no esistir
        @param varchar se encarga de recibir la consulta enviada atraves del validar.php
        @param varchar se encarga de recibir la consulta enviada atraves del validar.php
        @Return  Se encarga de retornar los archivos hasta cumplir  con el ciclo while
        */

        function escribir_validacion($cons)
        {
            //se crea una variable con la finalidad de incluir la funcion de retornar tabla creada en el archivo BD.php
            //echo $cons;
            $res = $this->validar_usuario($cons);
            $nom_usu = $res[1];
	            if($res[0] == 1)
					{
	                    session_start();
	                    /* Creamos la sesión */
	                    $_SESSION['nom_usu'] = $nom_usu;

	                   header('Location:admin.php');
	                }
	               else
	                {
	                        $a ="<script type='text/javascript'>";
	                            $a .="window.location='index.php?error=1'";
	                        $a .="</script>";

	                        Return $a;

	                }
        }


    
        function validacion_scaner($cons)
        {
            //se crea una variable con la finalidad de incluir la funcion de retornar tabla creada en el archivo BD.php
            //echo $cons;
            $res = $this->validar_usuario($cons);
              $num_documento = $res[0];
              $nom_per = $res[1];
         	 if(!$res[0])
	                {
	                     header("location: personal.php");
	                }
	               else
	                {
	                       
	                       $consul = "SELECT num_doc FROM tb_registro WHERE fecha_salida = '0000-00-00' AND num_doc='$num_documento'";
	                       $res1 = $this->validar_usuario($consul);
	                       //echo $res1[0];
	                       if ($res1[0]==$num_documento) 
	                       {
	                       	$insert_into = "UPDATE tb_registro SET fecha_salida = SYSDATE() WHERE tb_registro.num_doc = '$num_documento'";
	                       	 $respuesta = $this->insertar_registro($insert_into);
	                       	 if (!$respuesta) {
	                       	 	 $cons = "SELECT SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , h.fecha_ingreso, h.fecha_salida))*60) AS hor FROM tb_registro h WHERE num_doc='$num_documento'";
	                       	 		$resp = $this->validar_usuario($cons);
            						$hor = $resp[0];
            						$actualizar_hora = "UPDATE tb_registro SET horas ='$hor' WHERE num_doc='$num_documento'";
        							$respuesta = $this->insertar_registro($actualizar_hora);
        							if (!$respuesta) {
        								header("location: index.php?ti=3&nom_per=$nom_per");
        							}
        							 else{
	                       	 	echo "Error verifique los datos";
	                       	 }
	                       	 	
	                       	 }
	                       	 else{
	                       	 	echo "Error verifique los datos";
	                       	 }
	                       }
	                       else
	                       {

	                       	header("location: index.php?ti=1&num_doc=$num_documento");
	                       	/*$obs = "prueba22";
	                       	echo $insert_into = " 	INSERT INTO `tb_registro` (`id_registro`, `num_doc`, `fecha_ingreso`, `fecha_salida`, `observacion`) VALUES (NULL, '$num_documento', SYSDATE(), 'DATATIME', '$obs')";
	                       	 $respuesta = $this->insertar_registro($insert_into);
	                       	 if (!$respuesta) {
	                       	 	header("location: scaner.php");
	                       	 }
	                       	 else{
	                       	 	echo "Error verifique los datos";
	                       	 }*/
	                       }


	                }
        }
        function inser_regis($insert_into, $consulta, $num_documento)
        {	
        	$res = $this->validar_usuario($consulta);
            $nom_per = $res[0];
        	$respuesta = $this->insertar_registro($insert_into);
	                       	 if (!$respuesta) {
	                       	 	header("location: index.php?ti=2&nom_per=$nom_per");
	                       	 }
	                       	 else{
	                       	 	echo "Error verifique los datos";
	                       	 }
        }
	    /*
		*Esta funcion se encarga de traer los datos de una tabla y colocarlos en un select atravez de un ciclo while.
		*@param varchar consulta sql a ejecutar.
		*@param varchar campo de la llave primaria de la tabla.
		*@param varchar cualquier campo que no sea la llave primaria de la tabla y que se quiere mostrar en el select.
		*@return retorna la consulta en un option segun el campo seleccionado deseado
		*/
	    function escribir_opcion($cons,$id,$desc,$id_buscado=null)
		{
			        $seleccionado = "";
					$r = $this->retornar_tabla($cons); //esta funcion biene de BD.php y retorna los datos de la consulta a realizar
					$rta = "";
					while ($row = mysqli_fetch_assoc ( $r ))
					{
						if ($id_buscado==$row [ $id ]) {
							$seleccionado= " selected ";
						}
						else{
							  $seleccionado = "";

						}
						$rta.="<OPTION  value='".$row [ $id ]."' $seleccionado>".utf8_encode($row [ $desc ])."</OPTION>";
					}


			return $rta;
		}
        /*
        *esta funcion se encarga de traer los datos de la consulta generada en el archivo del index enviada atraves de un parametro y de ahí resivida en el archivo BD.php y
        *escribe la grilla verde
        *@param varchar se encarga de recibir la consulta enviada atraves del index.php
        @Return  Se encarga de retornar los archivos hasta cumplir  con el ciclo while
        */
        function escribir($cons)
        {
			//se crea una variable con la finalidad de incluir la funcion de retornar tabla creada en el archivo BD.php
			$res = $this->retornar_tabla($cons);
			//echo $cons;
			$b="";
			while($fila = mysqli_fetch_array($res))
			{
				$b .="<tr>";
				for ($i=0; $i < mysqli_num_fields($res); $i++)
				{	

					$b .="<td class='success'>".utf8_encode($fila [$i])."</td>";

				}
				
			}
			Return $b;
        }

       function escribir_opciones($cons)
        {
			//se crea una variable con la finalidad de incluir la funcion de retornar tabla creada en el archivo BD.php
			$res = $this->retornar_tabla($cons);
			//echo $cons;
			$b="";
			while($fila = mysqli_fetch_array($res))
			{
				$b .="<tr>";
				for ($i=0; $i < mysqli_num_fields($res); $i++)
				{	

					$b .="<td class='success'>".utf8_encode($fila [$i])."</td>";

				}
				$b .="<td class='success'><a href='modificar.php?actualizador=1&id=".utf8_encode($fila[0])."'><button class='btn btn-primary btn-lg'>Editar</button></td>";
				$b .="</tr>";
			}
			Return $b;
        }

}
