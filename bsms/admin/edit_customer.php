<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
} 
if(isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $mobilenum=$_POST['mobilenum'];
  $gender=$_POST['gender'];
  $details=$_POST['details'];
  $cid=$_SESSION['edid'];
  $query=mysqli_query($con, "update  tblcustomers set Name='$name',Email='$email',MobileNumber='$mobilenum',Gender='$gender',Details='$details' where ID='$cid' ");
  if ($query) {
    echo '<script>alert("Detalhes do Cliente foram atualizados.")</script>';
    echo "<script>window.location.href = 'customer_list.php'</script>"; 
  }
  else
  {
    echo '<script>alert("Algo está errado, por favor tente tnovamente")</script>';
  }
}
?>
<h4 class="card-title">Atualizar Detalhes de Clientes </h4>
<form method="post">
  <p style="font-size:16px; color:red" align="center">
    <?php 
    if($msg){
      echo $msg;
    }  ?>
  </p>
  <?php
  $eid=$_POST['edit_id'];
  $ret=mysqli_query($con,"select * from  tblcustomers where ID='$eid'");
  $cnt=1;
  while ($row=mysqli_fetch_array($ret)) 
  {
    $_SESSION['edid']=$row['ID'];
    ?> 
    <div class="card-body">
      <div class="form-group"> 
        <label for="exampleInputEmail1">Nome</label> 
        <input type="text" class="form-control" id="name" name="name"  value="<?php  echo $row['Name'];?>" required="true"> 
      </div> 
      <div class="form-group"> 
        <label for="exampleInputPassword1">Email</label> 
        <input type="text" id="email" name="email" class="form-control"  value="<?php  echo $row['Email'];?>" required="true"> 
      </div>
      <div class="form-group"> 
        <label for="exampleInputPassword1">Numero de Telefone</label> 
        <input type="text" id="mobilenum" name="mobilenum" class="form-control"  value="<?php  echo $row['MobileNumber'];?>" required="true"> 
      </div>
      <div class="form-group"> 
        <label for="exampleInputPassword1">Genero</label> 
        <?php 
        if($row['Gender']=="Masculino")
        {
          ?>
          <input type="radio" id="gender" name="gender" value="Masculino" checked="true">Masculino
          <input type="radio" name="gender" value="Feminino">Feminino
          <?php
        } ?>
        <?php 
        if($row['Gender']=="Feminino")
        {
          ?>
          <input type="radio" id="gender" name="gender" value="Masculino" >Masculino
          <input type="radio" name="gender" value="Feminino" checked="true">Feminino
          <?php 
        }?>
      </div>
      <div class="form-group"> 
        <label for="exampleInputEmail1">Detalhes</label> 
        <textarea type="text" class="form-control" id="details" name="details" placeholder="Detalhes" required="true" rows="4" cols="4"><?php  echo $row['Details'];?></textarea> 
      </div>
      <div class="form-group"> 
        <label for="exampleInputPassword1">Data de Criação</label> 
        <input type="text" id="" name="" class="form-control"  value="<?php  echo $row['CreationDate'];?>" readonly='true'> 
      </div>
      <?php
    } ?>
    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Atualizar</button>
      <span style="float: right;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </span>
    </div>
  </div>
</form>
