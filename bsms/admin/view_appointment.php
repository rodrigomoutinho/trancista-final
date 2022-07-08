<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['save2']))
{
  $cid=$_SESSION['aid'];
  $remark=$_POST['remark'];
  $status=$_POST['status'];
  $query=mysqli_query($con, "update  tblappointment set Remark='$remark',Status='$status' where ID='$cid'");
  if ($query) {
    echo "<script>alert('Atualizado com Sucesso');</script>"; 
    echo "<script>window.location.href = 'new_appointment.php'</script>";
  }
  else
  {
    echo "<script>alert('Algo está errado, tente novamente..');</script>"; 
  }
}
?>
<div class="card-body">
  <div class="table-responsive bs-example widget-shadow">
    <?php
    $cid=$_POST['edit_id'];
    $ret=mysqli_query($con,"select * from tblappointment where ID='$cid'");
    $cnt=1;
    while ($row=mysqli_fetch_array($ret)) {
     $_SESSION['aid']=$row['ID'];

     ?>
     <table class="table table-bordered">
      <tr>
        <th>Numero de Agendamento</th>
        <td><?php  echo $row['AptNumber'];?></td>
      </tr>
      <tr>
        <th>Nome</th>
        <td><?php  echo $row['Name'];?></td>
      </tr>

      <tr>
        <th>Email</th>
        <td><?php  echo $row['Email'];?></td>
      </tr>
      <tr>
        <th>Numero de Telefone</th>
        <td><?php  echo $row['PhoneNumber'];?></td>
      </tr>
      <tr>
        <th>Data de Agendamento</th>
        <td><?php  echo $row['AptDate'];?></td>
      </tr>

      <tr>
        <th>Hora de Agendamento</th>
        <td><?php  echo $row['AptTime'];?></td>
      </tr>

      <tr>
        <th>Serviços</th>
        <td><?php  echo $row['Services'];?></td>
      </tr>
      <tr>
        <th>Data de Solicitação</th>
        <td><?php  echo $row['ApplyDate'];?></td>
      </tr>


      <tr>
        <th>Status</th>
        <td> <?php  
        if($row['Status']=="1")
        {
          echo "Confirmado";
        }

        if($row['Status']=="2")
        {
          echo "Rejected";
        }

        ;?></td>
      </tr>
    </table>
    <?php if($row['Remark']==""){ ?>
     <div class="container">
        <form name="update" method="post" enctype="multipart/form-data" >
        <div class="row">
          <label>Remarcações :</label>
          <textarea name="remark" placeholder="" rows="4" cols="6" class="form-control wd-450" required="true"></textarea>
        </div>

        <div class="row mb-3">
          <label>Status :</label>
          <select name="status" class="form-control wd-450" required="true" >
            <option value="1" selected="true">Aceitar</option>
            <option value="2">Rejeitar</option>
          </select>
        </div>
        <div class="row centered">
          <button type="submit" name="save2" class="btn btn-primary">Enviar</button>
        </div>
      </form>
     </div>
    <?php } else { ?>
      <table class="table table-bordered">
        <tr>
          <th>Remarcar</th>
          <td><?php echo $row['Remark']; ?></td>
        </tr>


        <tr>
          <th>Remarcar Data</th>
          <td><?php echo $row['RemarkDate']; ?>  </td></tr>

        </table>
      <?php }
    } ?>
  </div>
</div>