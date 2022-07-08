<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['submit']))
{

	$name=$_POST['name'];
	$email=$_POST['email'];
	$services=$_POST['services'];
	$adate=$_POST['adate'];
	$atime=$_POST['atime'];
	$phone=$_POST['phone'];
	$aptnumber = mt_rand(100000000, 999999999);

	$query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
	if ($query) 
	{
		echo "<script>alert('Obrigado por reservar seu agendamento $aptnumber, nós entraremos em contato em breve.');</script>";  		
		echo "<script>window.location.href='index.php'</script>";	
	}
	else
	{
		echo "<script>alert('Algo de errado aconteceu, Por favor tente novamente.');</script>";  	 	
	}

}

  //Variáveis
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $telefone = $_POST['telefone'];
  $data_agendamento = $_POST['adate'];
  $hora_agendamento = $_POST['atime'];
  $servico = $_POST['trancas'];

  //Compo E-mail
  $arquivo = "
    <html>
      <p><b>Nome: </b>$nome</p>
      <p><b>E-mail: </b>$email</p>
      <p><b>Telefone: </b>$telefone</p>
      <p>O agendamento foi solicitado para o dia<b>$data_agendamento</b> às <b>$hora_agendamento</b></p>
    </html>
  ";
  
  //Emails para quem será enviado o formulário
  $destino = "lucy.silva@ba.estudante.senai.br";
  $assunto = "Agendamento de Horário Trancista";

  //Este sempre deverá existir para garantir a exibição correta dos caracteres
  $headers  = "MIME-Version: 1.0\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\n";
  $headers .= "From: $nome <$email>";

  //Enviar
  mail($destino, $assunto, $arquivo, $headers);
  
  echo "<meta http-equiv='refresh' content='10;URL=../contato.html'>";
?>