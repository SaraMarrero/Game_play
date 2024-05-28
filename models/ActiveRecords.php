<?php
    namespace  Model;

    class ActiveRecords{

        // Bases de datos
        protected static $tabla = '';
        protected static $db;
        protected static $columnasDB = [];
        protected static $errores = [];

        /**
         * Establece la conexión de la base de datos
         * @param \PDO $database El objeto PDO para la conexión de la base de datos
        */
        public static function setDB($database){
            self::$db = $database; 
        }

        // Inserta los elementos en la base de datos
        public function guardar() {
            // Sanitizar los datos
            $atributos = $this->sanitizarAtributos();
        
            // Construir la consulta con marcadores de posición
            $columnas = implode(",", array_keys($atributos));
            $valores = implode(",", array_fill(0, count($atributos), "?"));
        
            $query = "INSERT INTO " . static::$tabla . " ($columnas) VALUES ($valores)";
        
            // Preparar la consulta
            $consulta = self::$db->prepare($query);
        
            // Le quita las comillas y ejecuta
            $valores_sin_comillas = array_map(function($valor) {
                return trim($valor, "'");
            }, array_values($atributos));
            
            $resultado = $consulta->execute($valores_sin_comillas);

            return $resultado;
        }

        /** Inserta los elementos en la base de datos cuando tienen un cmapo autoincrmenetal
         * @param int $id Campo autoincremetal que se quiere dar por nulo para la inserción
        */
        public function guardarAutoincremental($id) {
            $atributos = $this->sanitizarAtributos();
        
            // Excluir campos autoincrementales de la lista de columnas
            unset($atributos[$id]);
        
            // Construir la consulta con marcadores de posición
            $columnas = implode(",", array_keys($atributos));
            $valores = implode(",", array_fill(0, count($atributos), "?"));
        
            // Construir la consulta preparada con marcadores de posición
            $query = "INSERT INTO " . static::$tabla . " ($columnas) VALUES ($valores)";

            // Preparar la consulta
            $consulta = self::$db->prepare($query);
        
            // Le quita las comillas y ejecuta
            $valores_sin_comillas = array_map(function($valor) {
                return trim($valor, "'");
            }, array_values($atributos));
            
            $resultado = $consulta->execute($valores_sin_comillas);

            return $resultado;
        }
        

        // Consulta para leer todos los datos de una tabla
        public static function selectAll(){
            $query = "SELECT * FROM " . static::$tabla;
            $resultado = self::consultarSQL($query);
            return $resultado;
        }

        /**
         * Consulta para leer datos específicos
         * @param string $campo Nombre de la columna para la condición
         * @param string $dato Valor de la condición
         * @return array Resultado en forma de array asociativo
        */
        public function selectEspecifico($campo , $dato){
            $query = "SELECT * FROM " . static::$tabla . " WHERE " . $campo . " = " . $dato;
            $resultado = self::consultarSQL($query);
            return $resultado;
        }

        /**
         * Consulta para leer datos específico con doble condición
         * @param string $campo Nombre de la columna para la primera condición
         * @param string $dato Valor de la primera condición
         * @param string $campo2 Nombre de la columna para la segunda condición
         * @param string $dato2 Valor para la segunda condición
         * @return array Resultado en forma de array asociativo
        */
        public function selectEspecificoDoble($campo, $campo2, $dato, $dato2){
            $query = "SELECT * FROM " . static::$tabla . " WHERE " . $campo . " = " . $dato . " AND " . $campo2 . " = " . $dato2;        
            $resultado = self::consultarSQL($query);
            return $resultado;
        }

        /**
         *  Consulta para actualizar elementos
         * @param string $campo Nombre de la columna para condición
         * @param array $datos Array con los datos actualizados 
         * @param string $condicion Valor para la segunda condición
         * @return bool Resultado en forma de booleano (true o false)
        */
        public function update($campo, $datos, $condicion){
            $set = '';

            foreach($datos as $key => $value){
                $set .= $key . " = '" . $value . "', ";
            }

            // Elimina la coma final
            $set = rtrim($set, ', ');

            // Actualiza en la base de datos
            $query = "UPDATE " . static::$tabla . " SET " . $set . " WHERE " . $campo . " = " . $condicion . ";";
            $consulta = self::$db->prepare($query);
            $resultado = $consulta->execute();

            return $resultado;
        }

        /**
         *  Consulta para actualizar elementos específicos
         * @param string $campo Nombre de la columna para la primera condición
         * @param string $dato Valor para la segunda condición
         * @param string $campo2 Nombre de la columna para la segunda condición
         * @param string $dato2 Valor para la segunda condición
         * @param bool Resultado en forma de booleano (true o false)
        */
        public function updateEspecifico($campo, $dato, $campo2, $dato2){
            // Actualiza en la base de datos
            $query = "UPDATE " . static::$tabla . " SET " . $campo . " = " . $dato . " WHERE " . $campo2 . " = " . $dato2 . ";";
            $consulta = self::$db->prepare($query);
            $resultado = $consulta->execute();

            return $resultado;
        }

        /**
         * Consulta para actualizar elementos con doble condición
         * @param array $datos Array con los datos actualizados
         * @param string $campo Nombre para la primera condición
         * @param string $condicion Valor para la segunda condición
         * @param string $campo2 Nombre para la segunda condicion
         * @param string $condicion2 Valor para la segunda condicion
         * @return bool Resultado en forma de booleano (true o false)
        */
        public function updateDoble($datos, $campo, $condicion, $campo2, $condicion2){
            $set = '';

            foreach($datos as $key => $value){
                $set .= $key . " = '" . $value . "', ";
            }

            // Elimina la coma final
            $set = rtrim($set, ', ');

            // Actualiza en la base de datos
            $query = "UPDATE " . static::$tabla . " SET " . $set . " WHERE " . $campo . " = " . $condicion . " AND " . $campo2 . " = " . $condicion2;

            $consulta = self::$db->prepare($query);
            $resultado = $consulta->execute();

            return $resultado;
        }


        // Consulta para borar elementos
        public function delete(){
            $query = "DELETE FROM " . static::$tabla;
            $consulta = self::$db->prepare($query);
            $resultado = $consulta->execute();

            return $resultado;
        }

        /**
         * Consulta para borrar elementos con condición
         * @param string $campo Nombre para la condición
         * @param string $dato Valor para la condición
         * @return bool Resultado en forma de booleano (true o false)
        */
        public function deleteEspecifico($campo, $dato){
            $query = "DELETE FROM " . static::$tabla . " WHERE " . $campo . " = " . $dato . ";";
            $consulta = self::$db->prepare($query);
            $resultado = $consulta->execute();

            return $resultado;
        }

        /**
         * Consulta para seleccionar elementos con limit
         * @param string $campo Nombre para la condición
         * @param string $dato Valor para la condición
         * @param int $iniciar Valor donde iniciar la paginación
         * @param int $articulosPorPagina Valor del número de elementos que se mostrará en cada página
         * @return array Resultado en forma de array asociativo
        */
        public function selectLimit($campo, $dato, $iniciar, $articulosPorPagina){
            $query = "SELECT * FROM " . static::$tabla . " WHERE " . $campo . " = " . $dato . " LIMIT " . $iniciar . ", " . $articulosPorPagina;
            $resultado = self::consultarSQL($query);
            return $resultado;
        }

        // Identifica y une los atributos de la bd con sus valores en forma de array
        public function atributos(){
            $atributos = [];

            foreach(static::$columnasDB as $columna){
                if($columna === 'id') continue;
                $atributos[$columna] = $this->$columna;
            }

            return $atributos;
        }

        // Sanitiza lod datos
        public function sanitizarAtributos() {
            $atributos = $this->atributos();
            $sanitizado = [];
        
            foreach ($atributos as $key => $value) {
                // Verificar si $value no es null antes de llamar a quote
                $sanitizado[$key] = ($value !== null) ? self::$db->quote($value) : null;
            }
        
            return $sanitizado;
        }
        

        public static function getErrores(){
            return static::$errores;
        }

        /**
         * Consulta la base de datos
         * @param string $query La consulta SQL a ejecutar
         * @return array El resultado de la consulta como un array asociativo 
        */
        public static function consultarSQL($query) {
            // Consultar la base de datos
            $consulta = self::$db->prepare($query);
            $consulta->execute();
        
            // Obtener la primera fila como un array asociativo
            $array = $consulta->fetchAll(\PDO::FETCH_ASSOC);
        
            // Devuelve el resultado
            return $array;
        }

        /**
         * Establece la imagen del juego.
         * @param string $fotoJuego La ruta de la imagen del juego
        */
        public function setImagen($fotoJuego){
            if($fotoJuego){
                $this->fotoJuego = $fotoJuego;
            }
        }
    }