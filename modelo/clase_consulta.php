<?php
class consulta{
		private $conexion_bd;
		private $filas;
		private $columnas;
		private $bases;
		private $schemas;
		private $tablas;
		private $filas_cant;
			public function __construct($pass="laika1",$host="localhost",$dbname="postgres",$usuario="postgres"){
				require_once "clase_conexion.php";
				$this->conexion_bd=Conexion::conectar($dbname,$pass,$host,$usuario);
				$this->filas=array();
				$this->columnas=array();
				$this->bases=array();
				$this->schemas=array();
				$this->tablas=array();
			}
			public function get_bases(){
				$sql="select pg_database.datname
						from pg_database
					   where pg_database.datname not in ('template0','template1')
					order by pg_database.datname;";
				$statement=$this->conexion_bd->prepare($sql);
				$statement->execute();
					while ($res_base=$statement->fetch(PDO::FETCH_NUM)){
				 			$this->bases[]=$res_base;
				 			}
				 	return $this->bases;
				$statement=NULL;
			}
			public function get_schemas($base_datos){
				$sql="select schema_name
						from information_schema.schemata
					   where not schema_name ilike 'pg%'
						 and schema_name <> 'information_schema'
						 and catalog_name = :base_datos
					order by schema_name;";
				$statement=$this->conexion_bd->prepare($sql);
				$statement->execute(array(':base_datos'=>$base_datos));
					while ($res_schema=$statement->fetch(PDO::FETCH_NUM)){
				 			$this->schemas[]=$res_schema;
				 			}
				 	return $this->schemas;
				$statement=NULL;
			}
			/*public function get_tablas($schema){
				$sql="select tablename 
						from pg_tables 
					   where schemaname = :schema
					order by tablename;";
				$statement=$this->conexion_bd->prepare($sql);
				$statement->execute(array(':schema'=>$schema));
					while ($res_tablas=$statement->fetch(PDO::FETCH_NUM)){
				 			$this->tablas[]=$res_tablas;
				 			}
				 	return $this->tablas;
				$statement=NULL;
			}*/
			public function get_tablas($schema){
				$sql="select table_name as tablename
						from information_schema.tables 
					   where table_schema = :schema
					order by table_name;";
				$statement=$this->conexion_bd->prepare($sql);
				$statement->execute(array(':schema'=>$schema));
					while ($res_tablas=$statement->fetch(PDO::FETCH_NUM)){
				 			$this->tablas[]=$res_tablas;
				 			}
				 	return $this->tablas;
				$statement=NULL;
			}
			public function get_filas($sql,$limit,$offset,$where,$and){
				if(isset($where)){
					$sql .=$where;
					}
				if(isset($and)){
					$sql .=$and;
					}
				$sql .=" order by 1";
				$sql .=" limit $limit";
				$sql .=" offset $offset";
				$statement=$this->conexion_bd->prepare($sql);
				$statement->execute();
					while ($res_filas=$statement->fetch(PDO::FETCH_BOTH)){
							$this->filas[]=$res_filas;
								}
					return $this->filas;
				$statement=NULL;
			}
			public function get_filas_cant($schema,$tabla,$where,$and){
				$sql="select count(*) from $schema.$tabla";
				if(isset($where)){
					$sql .=$where;
					}
				if(isset($and)){
					$sql .=$and;
					}
				$query=$this->conexion_bd->query($sql)->fetchAll();
			 	$this->filas_cant=$query[0][0];
				return $this->filas_cant;
				$query=NULL;
			}
			public function get_columnas($nombre_tabla,$nombre_schema){
				$sql="select COLUMN_NAME from INFORMATION_SCHEMA.columns col 
					where table_name = :table_name
					and table_schema = :table_schema
			   order by col.ordinal_position";
				$statement=$this->conexion_bd->prepare($sql);
				$statement->execute(array(':table_name'=>$nombre_tabla,':table_schema'=>$nombre_schema));
					while ($res_columnas=$statement->fetch(PDO::FETCH_NUM)){
				 			$this->columnas[]=$res_columnas;
				 			}
				 	return $this->columnas;
				$statement=NULL;
			}
			public function get_filas_column($schema,$tabla,$where,$columna){
				$sql="select $tabla.$columna from $schema.$tabla";
				if(isset($where)){
					$sql .=$where;
					}
				$sql .=" group by $tabla.$columna";
				$sql .=" order by $tabla.$columna";
				$statement=$this->conexion_bd->prepare($sql);
				$statement->execute();
					while ($res_filas=$statement->fetch(PDO::FETCH_BOTH)){
							$this->filas[]=$res_filas;
								}
					return $this->filas;
				$statement=NULL;
			}
			public function get_filas_column2($schema,$tabla,$where2,$columna2){
				$sql="select $tabla.$columna2 from $schema.$tabla";
				if(isset($where2)){
					$sql .=$where2;
					}
				$sql .=" group by $tabla.$columna";
				$sql .=" order by $tabla.$columna";
				$statement=$this->conexion_bd->prepare($sql);
				$statement->execute();
					while ($res_filas=$statement->fetch(PDO::FETCH_BOTH)){
							$this->filas[]=$res_filas;
								}
					return $this->filas;
				$statement=NULL;
			}
	}
?>