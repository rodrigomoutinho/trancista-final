 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="company/logopb.png" alt="AFROdite" class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">AFROdite</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <?php
      $eid=$_SESSION['sid'];
      $sql="SELECT * from tblusers   where id=:eid ";                                    
      $query = $dbh -> prepare($sql);
      $query-> bindParam(':eid', $eid, PDO::PARAM_STR);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);

      $cnt=1;
      if($query->rowCount() > 0)
      {
        foreach($results as $row)
        {    
          ?>
          <div class="image">
            <img class="img-circle"
            src="staff_images/<?php echo htmlentities($row->userimage);?>" width="90px" height="90px" class="user-image"
            alt="User profile picture">
          </div>
          <div class="info">
            <a href="profile.php" class="d-block"><?php echo ($row->name); ?> <?php echo ($row->lastname); ?></a>
          </div>
          <?php 
        }
      } ?>

    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item has-treeview menu-open">
          <a href="dashboard.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Serviços
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="add_service.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Adicionar Serviços</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="manage_service.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Editar Serviços</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Editar Clientes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
           <li class="nav-item">
            <a href="add_customer.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
               Adicionar Clientes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="customer_list.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
               Lista de Clientes
              </p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Agendamentos
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="all_appointments.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Todos os Agendamentos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="new_appointment.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Novo Agendamento</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="accepted_appointment.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Agendamentos Recebidos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="rejected_appointment.php" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Apontamentos Rejeitados</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="invoices.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Financeiro
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="search_appointment.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Procurar Agendamentos
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="search_invoice.php" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
           Procurar Finanças
          </p>
        </a>
      </li>
      <li class="nav-header">Painel de Usuários</li>
      <!-- User Menu -->
      <li class="nav-item">
        <a href="userregister.php" class="nav-link">
         <i class="far fa-user nav-icon"></i>
         <p>
          Registrar Usuário
        </p>
      </a>
    </li><!-- /.user menu -->
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
