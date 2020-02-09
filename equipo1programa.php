<?php
	#VARIABLES		
	$tiempo_ejecucion_inicio = microtime(true);#date("h:i:s");
	$archivos;#obtener todos los html
	$LOG_FILE = "al_equipo1_log.txt";#Este archivo sera el LOG
	#$lista_archivos = array("red", "green", "blue", "yellow");
	$LISTA_PATH = "CS13309_Archivos_HTML/Files/";
	$lista_archivos = scandir($LISTA_PATH);
	#$MENSAJE_ERROR = "ERROR: ";
	
	#crear sesion para el archivo LOG
	$sesion = "======================= SESION: ".date("Y-m-d-h:i:sa")."=======================";
	file_put_contents($LOG_FILE, $sesion."\n\n\n", FILE_APPEND | LOCK_EX);
	
	$tiempo_abrirTodos_inicio = microtime(true);#date("h:i:s");#Obtener tiempo de inicio de abrir todos los archivos
	
	#INICIO DE LOOP
	foreach ($lista_archivos as $value) {
	  #$tiempo_abrirArchivo_inicio = microtime(true);#date("h:i:s");
	  #funcion abrir archivo
	  openFile($value);
	  
	  #echo "Abri el file ".$value."<br>";
	  #$tiempo_abrirArchivo_final = microtime(true);#date("h:i:s");
	  #echo $value."________".round($tiempo_abrirArchivo_final - $tiempo_abrirArchivo_inicio,5)." microsegundos<br>";
	  
	  #obtener tiempo total de abir archivo actual
	  #registrar en el log
	  
	}
	//sleep(2);
	$tiempo_abrirTodos_final = microtime(true);#date("h:i:s");#Obtener tiempo de inicio de abrir todos los archivos
	#echo restarTiempo($tiempo_abrirTodos_final, $tiempo_abrirTodos_inicio); #obtener tiempo total de abrir archivos
	echo "Tiempo abriendo todos los archivos:  ".round($tiempo_abrirTodos_final - $tiempo_abrirTodos_inicio,5)." microsegundos<br>";
	
	#registrar en log
	
	$tiempo_ejecucion_final = microtime(true);#date("h:i:s");
	echo "Tiempo de ejecución total:  ".round($tiempo_ejecucion_final - $tiempo_ejecucion_inicio,5)." microsegundos<br>"; #obtener tempo total ejecucion
	
	#registrar en el log
	
	
	#FUNCION para ABRIR HTML
	function openFile($fileName){
		$tiempo_abrirArchivo_inicio = microtime(true);#date("h:i:s");
		#$txt = "John Doe\n";
		#$myfile = "newfile.txt";
		#file_put_contents($myfile, $txt, FILE_APPEND | LOCK_EX);
		#$txt = "Jane Doe\n";
		#file_put_contents($myfile, $txt, FILE_APPEND | LOCK_EX);
		
		#$filePath = "002w.html";
		#$filePath = $_SERVER['DOCUMENT_ROOT']."/CS13309_Archivos_HTML/Files/002.html";
		#$filePath = "CS13309_Archivos_HTML/Files/005.html";
		$filePath = "CS13309_Archivos_HTML/Files/".$fileName;
		$partes_archivo = pathinfo($filePath);
		
		if($partes_archivo['extension'] == "html"){
			#$myfile = fopen("CS13309_Archivos_HTML\Files\002.html", "r") or die("Unable to open file!");
			$myfile = fopen($filePath, "r") or die("Unable to open file!");
			#echo fread($myfile,filesize($filePath));
			echo "Abriendo ".$fileName."";
			fclose($myfile);
			$tiempo_abrirArchivo_final = microtime(true);#date("h:i:s");
			echo $fileName."________".round($tiempo_abrirArchivo_final - $tiempo_abrirArchivo_inicio,5)." microsegundos<br>";
		
		}else {
			echo "ERROR: no es html<br>";
		}
		
	}
	
	
	
	#FUNCION para obtener TIEMPO transcurrido
	function restarTiempo($t_Fin_, $t_Ini_){
		$t_Ini_components = explode(":", $t_Ini_);
		$t_Fin_components = explode(":", $t_Fin_);
		
		$t_Fin_inSeconds = $t_Fin_components[0]*60*60 + $t_Fin_components[1]*60 + $t_Fin_components[2];
		$t_Ini_inSeconds = $t_Ini_components[0]*60*60 + $t_Ini_components[1]*60 + $t_Ini_components[2];
		$t_Total_inSeconds = $t_Fin_inSeconds - $t_Ini_inSeconds;

		$t_Total_sec = $t_Total_inSeconds % 60;
		$t_Total_min = (($t_Total_inSeconds - $t_Total_sec) / 60) % 60;
		$t_Total_h = ($t_Total_inSeconds - $t_Total_sec - $t_Total_min*60) / 60 / 60;

		return str_pad((int) $t_Total_h,2,"0",STR_PAD_LEFT).":"
			  .str_pad((int) $t_Total_min,2,"0",STR_PAD_LEFT).":"
			  .str_pad((int) $t_Total_sec,2,"0",STR_PAD_LEFT);
	}
	
	
	
?>