<?php
//inclui a biblioteca de funções utilizadas
include "functions.php";
//declara as variáveis que serão utilizadas
$chaveC = $textoC = $chaveD = $textoD = $textoDSC = "";

// quando algo é enviado
if ($_SERVER['REQUEST_METHOD']=='POST'){
    
    //o id é a variável que define qual função é utilizada, por meio do switch logo abaixo
	$id=$_POST['enviar'];
	
	switch ($id) {
		case "encriptar":
			$chaveC = $_POST['chaveC'];
			$textoC = $_POST['textoC'];
			$textoC = encriptar($textoC, $chaveC);
			break;
		case "decriptar":
			$chaveD = $_POST['chaveD'];
			$textoD = $_POST['textoD'];
			$textoD = decriptar($textoD, $chaveD);
			break;
		case "decriptarSemChave":
			$textoDSC = $_POST['textoDSC'];
			$textoDSC = decriptarSemChave($textoDSC);
			break;
	}
} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Cifra de César</title>
	<style>
	  body {
		  font: 400 15px/1.8 Lato, sans-serif;
		  color: #777;
	  }
	  h3, h4 {
		  margin: 10px 0 30px 0;
		  letter-spacing: 10px;      
		  font-size: 20px;
		  color: #111;
	  }
	  .container {
		  padding: 80px 120px;
	  }
	  .bg-1 {
          background: #2d2d30;
          color: #bdbdbd;
	   }
      .bg-1 h3 {color: #fff;}
      .bg-1 p {font-style: italic;}
	  .btn {
		  padding: 10px 20px;
		  background-color: #333;
		  color: #f1f1f1;
		  border-radius: 0;
		  transition: .2s;
	  }
	  .btn:hover, .btn:focus {
		  border: 1px solid #333;
		  background-color: #fff;
		  color: #000;
	  }
	  .modal-header, h4, .close {
		  background-color: #333;
		  color: #fff !important;
		  text-align: center;
		  font-size: 30px;
	  }
	  .modal-header, .modal-body {
		  padding: 40px 50px;
	  }
	</style>
</head>
<body>
<div id="tour" class="bg-1">
  <div class="container">
	<h1>Cifra de César</h1><br>

	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">×</button>
			  <h4>Encriptador</h4>
			</div>
			<div class="modal-body">
			  <form action="cifraCesar.php" method="POST" role="form">
				<div class="form-group">
				  <label for="psw"> Deslocamento</label>
				  <input type="number" class="form-control" name="chaveC" class="number" value="" min="0">
				</div>
				<div class="form-group">
				  <label for="psw"> Texto para ser processado</label>
				  <input type="text" class="form-control" name="textoC" cols="64">
				</div>
				  <button type="submit" value="encriptar" name="enviar" class="btn btn-block">Enviar</button>

			  </form>
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			  </button>
			</div>
		  </div>
		</div>
	</div>
	
	<br><h3>Texto Encriptado:</h3>
			<?php
            //se a função encriptar foi utilizada, imprime o texto
			if ($textoC){
				echo $textoC;
			}
			?>
	<br><br>
	<button class="btn" data-toggle="modal" data-target="#myModal">Encriptar</button><br>
	
	<div class="modal fade" id="myModal2" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">×</button>
			  <h4>Decriptar</h4>
			</div>
			<div class="modal-body">
			  <form action="cifraCesar.php" method="POST" role="form">
				<div class="form-group">
				  <label for="psw"> Deslocamento</label>
				  <input type="number" class="form-control" name="chaveD" class="number" value="" min="0">
				</div>
				<div class="form-group">
				  <label for="psw"> Texto para ser processado</label>
				  <input type="text" class="form-control" name="textoD" cols="64">
				</div>
				  <button type="submit" value="decriptar" name="enviar" class="btn btn-block">Enviar</button>

			  </form>
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			  </button>

			</div>
		  </div>
		</div>
	</div>

	<br><h3>Texto Decriptografado:</h3>
			<?php
            //se a função decriptar foi utilizada, imprime o texto
			if ($textoD){
				echo $textoD;
			}
			?>
	<br><br>
	<button class="btn" data-toggle="modal" data-target="#myModal2">Decriptar</button><br>
	
	<div class="modal fade" id="myModal3" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">×</button>
			  <h4>Decriptador sem Chave</h4>
			</div>
			<div class="modal-body">
			  <form action="cifraCesar.php" method="POST" role="form">
				<div class="form-group">
				  <label for="psw"> Texto para ser processado</label>
				  <input type="text" class="form-control" name="textoDSC" cols="64">
				</div>
				  <button type="submit" value="decriptarSemChave" name="enviar" class="btn btn-block">Enviar</button>

			  </form>
			</div>
			<div class="modal-footer">
			  <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
				<span class="glyphicon glyphicon-remove"></span> Cancel
			  </button>

			</div>
		  </div>
		</div>
	</div> 

	<br><h3>Texto Decriptografado sem Chave:</h3>
			<?php
            //se a função decriptar sem chave foi utilizada, imprime o texto
			if($textoDSC){
				echo "$textoDSC";
			}
			   
			?>
	<br><br>
	<button class="btn" data-toggle="modal" data-target="#myModal3">Decriptar sem Chave</button><br>	
	</div>
</div> 	
</body>
</html>
