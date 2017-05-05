<?php

  session_start();
	if (!isset($_SESSION['login']) || $_SESSION["login"]==0 || $_SESSION["login"]==2) 
	{
		header('Location: http://localhost/PDO/projecto/paginaRestritaPage.php');
	}
	
?>
  
<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Bruno Ferreira, Henrique Sá e Pedro Belchior">
	<meta name="description" content="Plataforma para pedidos de taxi na zona de Mirandela">
	<meta name="keywords" content="itaxi, taxi mirandela, taxi">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>iTáxi - Área de Cliente</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">

<!--Funçoes JQuery-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
 
<script>
	$(document).ready(function() {

    $('#btndados').click(function(e) {
    $("#atdados").delay(100).fadeIn(100);
    $("#formsetpass").fadeOut(100);
    $('#btnsetpass').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
	
	$('#btnsetpass').click(function(e) {
    $("#formsetpass").delay(100).fadeIn(100);
    $("#atdados").fadeOut(100);
    $('#btndados').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  

 
  }); 
</script>


 




    <style>
		body {background-color:black}
	</style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <header>
    <div class = "nav navbar-inverse navbar-static-top">
    	<div class = "container-fluid">
        	<div class="header">
                <div class="col-xs-3 col-sm-3 col-md-5 col-lg-6" id="logo">
                	<img src="images/logo.png" width="150px" height="100px" alt="Logo iTáxi"/>     
                </div>
                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=		"#mainNavBar" aria-expanded="false" id="botaomenu">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
      			</button>
                <div class="col-xs-9 col-sm-9 col-md-7 col-lg-6 collapse navbar-collapse" id="mainNavBar">
                	<ul class="nav navbar-nav nav-right">
                        <li><a href="indexPage.php">Home</a></li>
                        <li><a href="empresaPage.php">Empresa</a></li>
                        <li><a href="ondeestamosPage.php">Onde estamos</a></li>
                        <li><a href="tarifasPage.php">Tarifas</a></li>
                        <li><a href="contactosPage.php">Contactos</a></li>
                        <?php if (isset($_SESSION['login']) && ($_SESSION["login"]==2 || $_SESSION["login"]==1)  ) {  ?>
							
									<?php if ($_SESSION["login"]==1) { ?>
										<li><a class="active" href="areaclientePage.php" title="">Área Cliente</a></li>
										<li><a href="php/logout.php" title="">Logout</a></li>
									
									<?php } else if ($_SESSION["login"]==2) { ?>
										<li><a href="areafornecedorPage.php" title="">Área Fornecedor</a></li>
										<li><a href="php/logout.php" title="">Logout</a></li>
									<?php } ?>
									
						<?php } else {?>
							<li><a href="loginPage.php" title="">Login</a></li>
						<?php }  ?>
                       
  					</ul>
                 </div>
             </div>
            </div>
         </div>
     </div>
    </header> 
    <div class="container-fluid" >
	<div class="row">
		<div class="col-md-2" id="menucliente">
			<ul class="nav nav-pills nav-stacked nav-pills-colors">
			Bem vindo(a) <?php echo $_SESSION['nome']; ?>
				<li class="active"><a>Área de Cliente</a></li>
				<li><a href="#" id="btnconta">A minha conta</a></li>
				<li><a href="#" id="btndados">Atualizar dados</a></li>
				<li><a href="#" id="btnsetpass">Mudar password</a></li>
				<li><a href="#" id="btncc">Consultar conta corrente</a></li>
				<li class="active"><a>Serviços</a></li>
				<li><a href="http://192.168.1.7/pdo/geo/localizacao.html" id="btntaxi">Chamar táxi</a></li>
				<li><a href="#" id="btnhist">Consultar histórico</a></li>
			</ul>
		</div>
		
		<div class="col-md-10">
      <div class="alert-placeholder"></div>
        <div class="panel panel-danger">
          <div class="panel-body ">
            <div id="img" align="center">
              <img src="http://e-biznes.pl/3/wp-content/uploads/2014/07/itaxi-logo.png" class="login" height="70">
            </div>
  
  <!-- Atualizar dados-->
  <div class="row">  
	<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="atdados" action="php/atualizarDadosFornecedor.php" method="post" role="form" style="display: block;">
        <h1 align="center">Actualizar Dados</h1>
        <div class="form-group">
          <label for='nome'>Nome:</label>
          <input type="text" name="nome" id="nome" tabindex="1" class="form-control" placeholder="Nome" value="">
        </div>
		<div class="form-group">
          <label for='morada'>Morada:</label>
          <input type="text" name="morada" id="morada" tabindex="1" class="form-control" placeholder="Morada" value="">
        </div>
        <div class="form-group">
          <label for='nif'>NIF:</label>
          <input type="text" name="nif" id="nif" tabindex="2" class="form-control" placeholder="NIF" value="">
        </div>
        <div class="form-group">
          <label for='telemovel'>Telemovel:</label>
          <input type="text" name="telemovel" id="telemovel" tabindex="3" class="form-control" placeholder="Telemovel" value="">
        </div>
		 <div class="form-group">
          <label for='email'>Email:</label>
          <input type="email" name="email" id="email" tabindex="3" class="form-control" placeholder="Email" value="">
        </div>
    
      <div class="form-group">
        <div class="row">
          <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
            <input type="submit" name="btnAtualizar" id="btnAtualizar" tabindex="4" class="form-control btn btn-primary" value="Atualizar" />
          </div>
          </div>
      </div>
      </form>
    </div>
  </div>
	<!-- Atualizar password-->
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
      <form id="formsetpass" action="php/recuperarp.php" method="post" role="form" autocomplete="off" style="display: none;">
        <h1 align="center">Mudar password</h1>
          <div class="form-group">
            <label for='passantiga'>Password antiga:</label>
            <input type="text" name="passantiga" id="passantiga" tabindex="1" class="form-control" placeholder="Password antiga" value="">
          </div>
          <div class="form-group">
            <label for='novapass'>Nova password:</label>
            <input type="text" name="novapass" id="novapass" tabindex="2" class="form-control" placeholder="Nova password" value="" />
          </div>
          <div class="form-group">
            <label for='reppass'>Repetir nova password:</label>
            <input type="text" name="reppass" id="reppass" tabindex="3" class="form-control" placeholder="Repetir nova password" value="" />
          </div>
          <div class="form-group">
          <div class="row">
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
              <input type="submit" name="btnSetPass" id="btnSetPass" tabindex="4" class="form-control btn btn-primary" value="Alterar password" />
            </div>
          </div>
          </div>
      </form>              
    </div>
  </div>
<!--Pedido taxi-->
<div class="row">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
		<div id="content">
			<script type="text/javascript">
			
		// <![CDATA[
            if (navigator.geolocation) {
 
                // Se conseguir fazer a leitura, chama a função posicao(). Se não conseguir, chama a função erro()
                navigator.geolocation.getCurrentPosition(posicao, erro);
            } else {
                alert('Seu navegador não tem suporte a geolocalização');
            }
 
            // Função chamada quando navigator.geolocation.getCurrentPosition CONSEGUE fazer a leitura
            function posicao(dados) {
 
                // Minhas coordenadas
                lat = dados.coords.latitude;
                lon = dados.coords.longitude;
 
                // Taxis
                taxis = new Array();
 
                taxi1 = new Array();
                taxi1[0] = 'Taxista Albino';
                taxi1[1] = '41.485503';
                taxi1[2] = '-7.178267';
                taxis[0] = taxi1;
				
				taxi2 = new Array();
				taxi2[0] = 'Taxista Belchior';
				taxi2[1] = '41.484266';
				taxi2[2] = '-7.183391';
				taxis[1] = taxi2;
				
				taxi3 = new Array();
				taxi3[0] = 'Taxista Bruninho';
				taxi3[1] = '41.481611';
				taxi3[2] = '-7.181915';
				taxis[2] = taxi3
 
               
 
                // cria uma lista descritiva para os taxis
                lista = document.createElement('dl');
 
				
                // Percorre os taxis
                for (a = 0; a < taxis.length; a++) {
 
                    // nome taxi na lista
                    dt = document.createElement('dt');
                    dt.appendChild(document.createTextNode(taxis[a][0]));
                    lista.appendChild(dt);
					
						
                    // tempo de demora
                    dd = document.createElement('dd');
                    dd.appendChild(document.createTextNode(distancia(lat, lon, taxis[a][1], taxis[a][2]) + ' minutos para chegar ao seu local'));
                    lista.appendChild(dd);
	
					
                }
				
                // Mostra a lista no ecra
                document.getElementsById('content').innerHtml=lista;
				
				
            }
			
			
            // Função chamada quando navigator.geolocation.getCurrentPosition NÃO consegue fazer a leitura
            function erro(dados) {
                switch (dados.code) {
                    case 1: 
                        alert('Você negou o acesso à sua localização!');
                        break;
                    case 2: 
                        alert('Não foi possível acessar sua posição!');
                        break;
                    case 3: 
                        alert('Timeout ao tentar pegar sua localização!');
                        break;
                }
            }
 
            // Calcula a distância em km entre dois pontos
            function distancia(latA, lonA, latB, lonB) {
                var tempo=(6371 * Math.acos(Math.cos(Math.PI * (90 - latB) / 180) * Math.cos(Math.PI * (90 - latA) / 180) + Math.sin(Math.PI * (90 - latB) / 180) * Math.sin(Math.PI * (90 - latA) / 180) * Math.cos(Math.PI * (lonA - lonB) / 180)))*(6/5);
				return tempo.toFixed(2);
			}
			
// ]]></script>
</div>
</div>
</div>



	
  
  </div>            
</div>
</div>
</div>

			
		
 <!--Footer geral-->
    <footer>
     	<div class="footer" style="static">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                
                    <p><br> copyright &copy; 2015 - iTáxi</p>
                    <p> project developed by: Bruno Ferreira - Henrique Sá - Pedro Belchior</p>
             </div>
		</div>
    </footer>
    
    
     
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
       <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>