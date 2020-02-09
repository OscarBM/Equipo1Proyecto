<?php
	#VARIABLES		
	$tiempo_ejecucion_inicio = date("h:i:s");
	$archivos;#obtener todos los html
	$LOG_FILE = "al_equipo1_log.txt";#Este archivo sera el LOG
	$colors = array("red", "green", "blue", "yellow");
	
	#crear sesion para el archivo LOG
	$sesion = "======================= SESION: ".date("Y-m-d-h:i:sa")."=======================";
	file_put_contents($LOG_FILE, $sesion."\n\n\n", FILE_APPEND | LOCK_EX);
	
	$tiempo_abrirTodos_inicio = date("h:i:s");#Obtener tiempo de inicio de abrir todos los archivos
	
	#INICIO DE LOOP
	foreach ($colors as $value) {
	  #echo "$value <br>";
	  $tiempo_abrirArchivo_inicio = date("h:i:s");
	  #funcion abrir archivo
	  #openFile();
	  echo "Abri el file ".$value."<br>";
	  $tiempo_abrirArchivo_final = date("h:i:s");
	  
	  #obtener tiempo total de abir archivo actual
	  #registrar en el log
	  
	}
	
	$tiempo_abrirTodos_final = date("h:i:s");#Obtener tiempo de inicio de abrir todos los archivos
	#obtener tiempo total de abrir archivos
	
	#registrar en log
	
	$tiempo_ejecucion_final = date("h:i:s");
	#obtener tempo total ejecucion
	
	#registrar en el log
	
	
	#FUNCION para ABRIR HTML
	function openFile(){
		$txt = "John Doe\n";
		$myfile = "newfile.txt";
		file_put_contents($myfile, $txt, FILE_APPEND | LOCK_EX);
		$txt = "Jane Doe\n";
		file_put_contents($myfile, $txt, FILE_APPEND | LOCK_EX);
	}
	
	
	
?>