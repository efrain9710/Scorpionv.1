<?php  
	include('Clases/Graficos.php');
	if(isset($_GET['ti']))
			{
				//verificaion de scaner
				if($_GET['ti']==1)
				{
					echo $cod_barra = $_POST['cod_barra'];
					$obj_gerarquia = new graficos();
					echo $obj_gerarquia->validacion_scaner("SELECT num_doc, nom_per FROM tb_personal WHERE cod_barra='$cod_barra' OR num_doc='$cod_barra'");
				}
				if($_GET['ti']==7)
				{
					$num_documento = $_POST['num_doc'];
					$obs = $_POST['observacion'];
					$obj_gerarquia = new graficos();
					echo $obj_gerarquia->inser_regis("INSERT INTO `tb_registro` (`id_registro`, `num_doc`, `fecha_ingreso`, `fecha_salida`, `observacion`) VALUES (NULL, '$num_documento', SYSDATE(), 'DATATIME', '$obs')", "SELECT nom_per FROM tb_personal WHERE num_doc='$num_documento'",$num_documento);
				}		

				//validacion de el usuario
				if($_GET['ti']==2)
				{
					$correo	=$_POST['correo'];
					$clave	=$_POST['clave'];
					$obj_gerarquia = new graficos();
					echo $obj_gerarquia->escribir_validacion("SELECT id_tip_usu, nom_usu FROM tb_usuarios WHERE correo='$correo' and clave='$clave'");
				}
				//Cerrar sesion
				if($_GET['ti']==3)
				{
					session_start();
					session_destroy();	
					mysqli_close();
					header('Location: index.php');
				}
				//valida la insercion de un registro
				if($_GET['ti']==4)
				{	

			   //    if($_POST['var2'])
				  // {
					 //  echo  "na se envio nada";
				  // }
					$arreglo = explode(",",$_POST['total']);
					for($i=0;$i<count($arreglo);$i++)
					{
						$a="var".($i+1);
						$campos[$i][0] =$_POST[$a];
						$campos[$i][1] =$arreglo[$i];
					}
					$obj= new Graficos();
					$obj->ini();
					//echo $obj->insertar($_POST['tabla'],$campos);
					echo $obj->insertar($_POST['tabla'],$campos);	//aqui se ejecuta la insercion de un registro		
			    }
                //procedimieto para actualizar
			    if($_GET['ti']==5)
				{	
					$arreglo = explode(",",$_POST['total']);
					for($i=0;$i<count($arreglo);$i++)
					{
						$a="var".($i+1);
						$campos[$i][0] =$_POST[$a];
						$campos[$i][1] =$arreglo[$i];
					}
					$obj= new Graficos();
					$obj->ini();
					echo $obj->imprimir_validacion($obj->crear_script_actualizacion($_POST['tabla'],$campos,$_GET['id'],$_GET['valor_id']));	//aqui se ejecuta la actualizacion de un registro		
			    }
			    if($_GET['ti']==6)
				{
					include ("restablecer/validacion.php");
					$num_doc =$_POST['num_doc'];
					$correo =$_POST['correo'];
					$obj= new correo();
					//echo $num_doc.$correo;
					echo $obj->verificacion_de_existencia($num_doc, $correo);
				}
				if($_GET['ti']==8)
				{	
					$arreglo = explode(",",$_POST['total']);
					for($i=0;$i<count($arreglo);$i++)
					{
						$a="var".($i+1);
						$campos[$i][0] =$_POST[$a];
						$campos[$i][1] =$arreglo[$i];
					}
					$obj= new Graficos();
					$obj->ini();
					echo $obj->imprimir_validacion($obj->crear_script_actualizacion($_POST['tabla'],$campos,$_GET['num_doc']));	//aqui se ejecuta la actualizacion de un registro		
			    }
		    }

?>