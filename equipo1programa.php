<?php
	#=========================================== VARIABLES ====================================		
	$tiempo_ejecucion_inicio = microtime(true);
	$archivos;#Variable donde se almacenaran los nombres de todos los html
	$LOG_FILE = "al_equipo1_log.txt";#Este archivo sera el LOG
	$LISTA_PATH = "CS13309_Archivos_HTML/Files/";
	$lista_archivos = scandir($LISTA_PATH);
	
	
	#=========================================== CODIGO PRINCIPAL ====================================
	#Crear sesion para el archivo LOG
	$sesion = "======================= SESION: ".date("Y-m-d-h:i:sa")."=======================";
	file_put_contents($LOG_FILE, $sesion."\n\n\n", FILE_APPEND | LOCK_EX);
	
	$tiempo_abrirTodos_inicio = microtime(true);#Obtener tiempo de inicio de abrir todos los archivos
	
	#INICIO DE LOOP
	foreach ($lista_archivos as $value) {
	  #Funcion abrir archivo
	  openFile($value);  
	}
	
	$tiempo_abrirTodos_final = microtime(true);#Obtener tiempo de inicio de abrir todos los archivos
	file_put_contents($LOG_FILE, "\n", FILE_APPEND | LOCK_EX);
	echo $log_abrir_total = "Tiempo abriendo todos los archivos:  ".round($tiempo_abrirTodos_final - $tiempo_abrirTodos_inicio,5)." microsegundos<br>";
	#Registrar en LOG
	file_put_contents($LOG_FILE, $log_abrir_total."\n", FILE_APPEND | LOCK_EX);
	
	$tiempo_ejecucion_final = microtime(true);
	#Obtener tiempo EJECUCION TOTAL
	echo $log_ejecucion_total = "Tiempo de ejecución total:  ".round($tiempo_ejecucion_final - $tiempo_ejecucion_inicio,5)." microsegundos<br>";
	#Registrar en LOG
	file_put_contents($LOG_FILE, $log_ejecucion_total."\n", FILE_APPEND | LOCK_EX);
	
	#=========================================== FUNCIONES ====================================
	#FUNCION para ABRIR HTML
	function openFile($fileName){
		$tiempo_abrirArchivo_inicio = microtime(true);
		$filePath = "CS13309_Archivos_HTML/Files/".$fileName;
		$partes_archivo = pathinfo($filePath);
		
		if($partes_archivo['extension'] == "html"){
			$myfile = fopen($filePath, "r") or die("Unable to open file!");
			echo "Abriendo ".$fileName."";
			fclose($myfile);
			$tiempo_abrirArchivo_final = microtime(true);#date("h:i:s");
			echo $log_archivo_individual = $fileName."________".round($tiempo_abrirArchivo_final - $tiempo_abrirArchivo_inicio,5)." microsegundos<br>";
			global $LOG_FILE;
			file_put_contents($LOG_FILE, $log_archivo_individual."\n", FILE_APPEND | LOCK_EX);
		
		}else {
			echo "ERROR: No es html<br>";
		}
		
	}
	
?>