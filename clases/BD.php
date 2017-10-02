<?php

    class BD
    {

        public $servidor;
        public $usuario;
        public $clave;
        public $bd;

        /**
        * Constructor de la clase.
        */
        public function BD()
        {

        }

        /**
        * Inicializa los valores básicos o que se requieren para que haya conexión con la base de datos.
        */
        public function ini()
        {
            include( "config.php" ); //Se acude al archivo de configuración para los parámetros de la base de datos.

            $this->servidor     = $servidor;
            $this->usuario      = $usuario;
            $this->clave        = $clave;
            $this->bd           = $bd;


            //-------puede agregar más código si se requieren datos adicionales desde el config -----------------
        }


        /**
        * Realiza una conexión simple a la base de datos.
        * @return       conexion        
        */
        private function conectar_a_bd()
        {
            $respuesta=$this->conectar();
            return  $respuesta;
        }

        /*
        *en esta funcion se elaborar la conexion al servidor y ala base de datos 
        *no resive ningun parametro no funcion
        @return retorna la conexion ala base de datos y servidor 
        */
        function conectar()
        {

                 Return mysqli_connect($this->servidor, $this->usuario, $this->clave, $this->bd);
                
        }

        /*
        *Esta funcion se encarga de ejecutar una consulta en la base de datos para la validacion de un usuario
        *@param varchar consulta sql
        *@param usuario para la verificacion
        *retorna el resultado de la consulta
        */
        function validar_usuario($cons)
        {
            $con = $this->conectar();
            $respuesta = mysqli_query($con, $cons);
            $a = mysqli_fetch_array($respuesta);
            Return $a;
        }


        /**
        * Se encarga de retornar la fecha y hora desde el servidor de la base de datos.
        */
        public function traer_valor_campo($campo,$tabla)
        {
            $respuesta = "";
            echo $sql = " SELECT $campo AS $campo FROM $tabla";
            $conexion = $this->conectar_a_bd();
            $resultado = $conexion->query( $sql );
            while( $fila = mysqli_fetch_assoc( $resultado ) )
            {
                $respuesta = utf8_encode($fila[ $campo ]);
            }
            mysqli_free_result( $resultado ); //Se libera la memoria destinada a la recopilación de datos de la BD.
            return $respuesta;
        }

   
        /*
		*Esta funcion se encarga de formar una consulta de insersion enviada desde un formulario y ejecutar la sentencia sql.
		*@param varchar nombre de la tabla a insertar el registro.
		*@param varchar nombre de los campos de la tabla y los datos que se insertaran.
		*@return retorna el resultado de la consulta de insercion.
		*/
        function insertar($tabla, $campos)
       {    
            $resultado=""; 
            $rta = "";
			$c=", ";
			$value  =" VALUES (";
			$insert ="INSERT INTO ".$tabla."(";
			for ($i=0; $i <count($campos) ; $i++) 
			{ 
				if($i>=count($campos)-1)$c=" ";
				$insert .= $campos[$i][1].$c;
				$value .= "'".trim($campos[$i][0])."'".$c;
			}
			echo $insert_into= $insert.") ".$value.")";
            //$rta.=$insert_into;
			$con = $this->conectar();
            if(strpos($insert_into, "''")>=1)
            {
                $insert_into="SELECT NOW()";
                $rta.= "<div class='alert alert-warning'><h2><center>Hubo un error por favor verifique que todos los campos tengan datos </center></h2></div>";
            }
            else
            {
    			 $con->query($insert_into);
                 header( "location: admin.php" );

                
    		}
            Return $resultado.$rta;


        }
        function insertar_registro($insert_into)
        {
            $con = $this->conectar();
            $con->query($insert_into);
        }

        /*
        *Esta funcion se encarga de formar una consulta de actualizacion enviada desde un formulario y ejecutar la sentencia sql.
        *@param varchar nombre de la tabla a insertar el registro.
        *@param varchar nombre de los campos de la tabla y los datos que se insertaran.
        *@param varchar nombre del campo de la llave primaria de la tabla
        *@param varchar valor del id a actualizar
        *@return retorna el resultado de la consulta de insercion.
        */
        function crear_script_actualizacion($tabla, $campos,$valor_id)
        {
            $c=", ";
            //$value  =" VALUES (";
            $actualizacion ="UPDATE ".$tabla." SET ";
            for ($i=0; $i <count($campos) ; $i++) 
            { 
                if($i>=count($campos)-1)$c=" ";
                // $actualizacion .= $campos[$i][1].$c;
                // $value .= "'".$campos[$i][0]."'".$c;
                $actualizacion .= $campos[$i][1]." = '".$campos[$i][0]."'".$c;
                //$value .= "'".$campos[$i][0]."'".$c;
            }
             $actualizacion= $actualizacion." WHERE num_doc = $valor_id";
            //echo $actualizacion;
            $con = $this->conectar();
            $resultado = $con->query($actualizacion);
            Return $resultado;
        }

        /*
        *en esta funcion se encarga de recivir la consulta enviada desde el archivo graficos.php y hacer su consulta en la base de datos 
        @param varchar recive la consulta de la base de datos 
        @return retorna la consulta
        */
        function retornar_tabla($cons)
        {
			$con = $this->conectar();
			$resultado = $con->query($cons);
			Return $resultado;
        }
		
		/*
		*Esta funcion se encarga de eliminar un registro de una tabla en la base de datos
		*@param varchar nombre de la tabla en donde se elimina el regisro
		*@param int id del registro a eliminar
        *@param varchar campo de la tabla, que se toma como referencia para señalar el registro especifico a eliminar.
        *@return retorna el resultado de la eliminacion		
		*/
        function eliminar($tabla, $id, $condicion)
        { 
            $con = $this->conectar();         
            $eliminar_todo ="DELETE FROM ".$tabla." WHERE ".$tabla.".".$condicion."='".$id."'";
            $resultado = $con->query( $eliminar_todo);
            Return $eliminar_todo;
        }


         /*
        *Esta funcion se encarga de insertar un registro en la tabla tb_log
        *@param int id del ususario
        *@param varchar descricion de la accion
        *@param varchar tabla en que se elimina el registro
        *@param datetime fecha en se realizo tal accion en la base de datos.
        *@return retorna el resultado de la eliminacion     
        */
        function insertar_tb_log($id_usuario, $descripcion, $tabla, $f_reg)
        { 
            $con = $this->conectar();         
            $inserta ="INSERT INTO tb_log(id_log, id_usuario, descripcion, objeto_afectado, f_reg) VALUES (NULL, '$id_usuario', '$descripcion', '$tabla', '$f_reg')";
            $resultado = $con->query( $inserta);
            Return $inserta;
        }
         

         /*
        * esta funcion se encarga de traer el id del usuario que elimina un registro.
        *@param int id del usuario que elimina un registro.
        *@return retorna la consulta sql.
        */
    function traer_id_usuario_elimina($pass)
        {
            $respuesta = "";
             $sql = "SELECT * FROM tb_usuarios WHERE contrasena = $pass";
            $conexion = $this->conectar_a_bd();
            $resultado = $conexion->query( $sql );
            while( $fila = mysqli_fetch_assoc( $resultado ) )
            {
                $respuesta = $fila['id_usuario'];
            }
            mysqli_free_result( $resultado ); //Se libera la memoria destinada a la recopilación de datos de la BD.
            return $respuesta;
           // return $sql;
        }

       






    }