<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $password1=($_POST['password']); 
  $password2=($_POST['password1']); 

  if($password1 != $password2) {
    echo "<script>alert('Sua senha e a senha de confirmação não conferem!!');</script>";
  }else
  {
    $name=$_POST['name'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $permission=$_POST['permission'];
    $sex=$_POST['sex'];
    $mobile=$_POST['mobile'];
    $password=md5($_POST['password']);
    $status=1; 
    $sql="INSERT INTO  tblusers(name,username,email,password,status,mobile,sex,lastname,permission) VALUES(:name,:username,:email,:password,:status,:mobile,:sex,:lastname,:permission)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':name',$name,PDO::PARAM_STR);
    $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
    $query->bindParam(':sex',$sex,PDO::PARAM_STR);
    $query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':permission',$permission,PDO::PARAM_STR);
    $query->bindParam(':password',$password,PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
      echo "<script>alert('Registrado com sucesso');</script>";
       echo "<script>window.location.href ='userregister.php'</script>";
      
    }
    else 
    {
      echo "<script>alert('Algo está errado, tente novamente');</script>";
    }
  }
}
?>

<form role="form" id=""  method="post" enctype="multipart/form-data" class="form-horizontal"  >
  <div class="card-body">
    <div class="row">
      <div class="form-group col-md-4">
        <label for="feFirstName">Primeiro Nome</label>
        <input type="text" name="name" class="form-control"  placeholder="Primeiro Nome" value="" required>
      </div>
      <div class="form-group col-md-4">
        <label for="feLastName">Último Nome</label>
        <input type="text" name="lastname" class="form-control"  placeholder="Último Nome" value="" required>
      </div>
      <div class="form-group col-md-4">
        <label for="feLastName">Nome de usuário</label>
        <input type="text" name="username" class="form-control"  placeholder="Nome de Usuário" value="" required>
      </div>
    </div>
    <div class="row">
      <div class="form-group col-4">
        <label class="" for="register1-email">Permissões:</label>
        <select name="permission" class="form-control" required>
          <option value="Super User">Super User</option>
          <option value="Admin">Admin</option>
          <option value="User">User</option>
        </select>
      </div>
      <div class="form-group col-4">
        <label for="exampleInputEmail1">Endereço de e-mail</label>
        <input type="email" name="email" class="form-control"  placeholder="E-mail" value="" required>
      </div>
      <div class="form-group col-4">
        <label for="exampleInputEmail1">Telefone</label>
        <input type="text" name="mobile" class="form-control"  placeholder="Telefone" value="" required>
      </div>
    </div>
    
    <div class="row">
      <div class="form-group col-md-4">
        <label for="feFirstName">Senha</label>
        <input type="password" name="password" class="form-control" placeholder="Senha" value="" required>
      </div>
      <div class="form-group col-md-4">
        <label for="feLastName">Confirme sua senha</label>
        <input type="password" name="password1" class="form-control" placeholder="Confirme sua senha" value="" required>
      </div>
      <div class="form-group col-4">
        <label class="" for="register1-email">Genero:</label>
        <select name="sex" class="form-control" required>
          <option value="">Selecione o Genero</option>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
        </select>
      </div>
    </div>
   
  </div>  
  <!-- /.card-body -->
  <div class="modal-footer text-right">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
  </div>
</form>