<?php
	#VARIABLES		
	$tiempo_ejecucion_inicio = date("h:i:s");
	$archivos;#obtener todos los html
	$colors = array("red", "green", "blue", "yellow");
	
	#crear archivo log
	#registrar nueva sesion en el log
	
	$tiempo_abrirTodos_inicio = date("h:i:s");#Obtener tiempo de inicio de abrir todos los archivos
	
	#INICIO DE LOOP
	foreach ($colors as $value) {
	  #echo "$value <br>";
	  $tiempo_abrirArchivo_inicio = date("h:i:s");
	  #funcion abrir archivo
	  openFile1();
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
	function openFile1(){
		$txt = "John Doe\n";
		$myfile = "newfile.txt";
		file_put_contents($myfile, $txt, FILE_APPEND | LOCK_EX);
		$txt = "Jane Doe\n";
		file_put_contents($myfile, $txt, FILE_APPEND | LOCK_EX);
	}
?>