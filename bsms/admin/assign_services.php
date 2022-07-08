<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['save'])){
  $uid=$_SESSION['gid'];
  $invoiceid=mt_rand(100000000, 999999999);
  $sid=$_POST['sids'];
  for($i=0;$i<count($sid);$i++){
   $svid=$sid[$i];
   $ret=mysqli_query($con,"insert into tblinvoice(Userid,ServiceId,BillingId) values('$uid','$svid','$invoiceid');");
   echo '<script>alert("Fatura foi criada com sucesso. Faturamento de numero "+"'.$invoiceid.'")</script>';
   echo "<script>window.location.href ='invoices.php'</script>";
 }
}
?>
<div class="card-body">
  <h4>Serviços Ass:</h4>
  <form method="post">
    <table class="table table-bordered"> 
      <thead>
       <tr>
        <th>#</th> <th>Nome do Serviço</th> <th>Valor do Serviço</th> <th>Ação</th> 
      </tr> 
    </thead> 
    <tbody>
      <?php
      $eid=$_POST['edit_id'];
      $ret=mysqli_query($con,"select * from  tblcustomers where ID='$eid'");
      $cnt=1;
      while ($row=mysqli_fetch_array($ret)) 
      {
        $_SESSION['gid']=$row['ID'];
      }
      $ret=mysqli_query($con,"select *from  tblservices");
      $cnt=1;
      while ($row=mysqli_fetch_array($ret)) {
        ?>
        <tr> 
          <th scope="row"><?php echo $cnt;?></th> 
          <td><?php  echo $row['ServiceName'];?></td> 
          <td><?php  echo $row['Cost'];?></td> 
          <td><input type="checkbox" name="sids[]" value="<?php  echo $row['ID'];?>" ></td> 
        </tr>   
        <?php 
        $cnt=$cnt+1;
      }?>
      <tr>
        <td colspan="4" align="center">
          <button type="submit" name="save" class="btn btn-success">Enviar</button>   
        </td>
      </tr>
    </tbody> 
  </table> 
</form>
</div>
  <!-- /.card-body -->