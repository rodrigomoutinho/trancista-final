<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $sername=$_POST['sername'];
  $cost=$_POST['cost'];

  $eid=$_SESSION['edid'];
  $query=mysqli_query($con, "update  tblservices set ServiceName='$sername',Cost='$cost' where ID='$eid' ");
  if ($query) {
    //$msg="Service has been Updated.";
    echo '<script>alert("Serviço foi atualizado")</script>';
  }
  else
  {
    echo '<script>alert("Algo está errado. Tente novamente")</script>';
    //$msg="Something Went Wrong. Please try again";
  }
}
?>
<h4 class="card-title">Atualizar Form de Serviços </h4>
<form role="form" method="post">
  <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
  $eid=$_POST['edit_id'];
  $ret=mysqli_query($con,"select * from  tblservices where ID='$eid'");
  $cnt=1;
  while ($row=mysqli_fetch_array($ret))
  {
    $_SESSION['edid']=$row['ID'];
    ?> 
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nome do Serviço</label>
        <input type="text" class="form-control" id="sername" name="sername" placeholder="Nome do Serviço" value="<?php  echo $row['ServiceName'];?>" required="true">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Custo</label>
        <input type="text" id="cost" name="cost" class="form-control" placeholder="Cost" value="<?php  echo $row['Cost'];?>" required="true">
      </div>
      <?php 
    } ?>
    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary">Enviar</button>
      <span style="float: right;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </span>
    </div>
  </div>
  <!-- /.card-body -->
</form>