<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pokedex</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="myStyle.css"> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    

  </head>

  <body>

    <div class="jumbotron text-center">
      <h1>Buscador Pokemon</h1>
    </div>
      
    <div class="container">
      
      <div class="row justify-content-center ">
      
        <div class="col-8 contenedor-pokedex">


          
          <div class="row" >
            <div class="header-pokedex">
              <div class="header-separador">
                <div></div>
              </div> 
            </div>
            
          </div>

          <br>
          <div class="row justify-content-center">

            <div class="col-6">
              <form class="searchform" action="search_pokemon.php" method="POST">
                <input class="searchfield" type="text" placeholder="Buscar..." name="buscado" />
                <button class="searchbutton" type="submit">Ir</button> 
              </form>
            </div>
          </div>
          <br>

	<?php
		$pokemons = array(	'Charmander' 	=> ['tipo' => "Fuego",		'genero' => "Macho", 	'ataque' => "Llamarada"],
						   	'Pikachu' 		=> ['tipo' => "Electrico",	'genero' => "Hembra", 	'ataque' => "Electrovolt"],
						   	'Bulbasaur' 	=> ['tipo' => "Agua",		'genero' => "Macho", 	'ataque' => "Agua"]);

    
		if(isset($_POST["buscado"]) && !(empty($_POST["buscado"])) && array_key_exists($_POST["buscado"], $pokemons)){
			$nombre = $_POST["buscado"];
			
			echo "<div class='row'>        
						<div class='col-4'>
              				<div class='pokemon-perfil justify-content-center'>
                				<img src='img/".$nombre.".png'"." alt='Ilust. 2004'  width='170' height='149'>
				            </div>
				        </div>
				       <div class='col-4 atributo-central'><b>" .$nombre."</b></div>
            		   <div class='col-2 atributo-central'>
              				<img src='img/".$pokemons[$nombre]['genero'].".png'"."  alt='Macho' width='37' height='40'>
			           </div>
			           <div class='col-2 atributo-central'>
			              <img src='img/".$pokemons[$nombre]["tipo"].".png'"."alt='tipo' width='100' height='80'>

            		   </div>
        			 </div>
        			<br>"

                ;

		}else{
      if (!(empty($_POST["buscado"])) && !(array_key_exists($_POST["buscado"], $pokemons)) ) {
        echo "<b>No se encontro el pokemon ingresado!!</b>";
      }else{
        foreach ($pokemons as $nombre => $pokemon) {
          
          echo "<div class='row'>        
              <div class='col-4'>
                        <div class='pokemon-perfil justify-content-center'>
                          <img src='img/".$nombre.".png'"." alt='Ilust. 2004'  width='170' height='149'>
                      </div>
                  </div>
                 <div class='col-4 atributo-central'><b>" .$nombre."</b></div>
                     <div class='col-2 atributo-central'>
                        <img src='img/".$pokemon['genero'].".png'"."  alt='Macho' width='37' height='40'>
                   </div>
                   <div class='col-2 atributo-central'>
                      <img src='img/".$pokemon['tipo'].".png'"."alt='tipo' width='100' height='80'>

                     </div>
                 </div>
                <br>";
        }   
      }
        	
		}


	?>