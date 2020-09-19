 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-fish"></i>
        </div>
        <div class="sidebar-brand-text mx-3">BKIPM Lampung</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- QUERY MENU -->
      <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu="SELECT `user_menu`.`id`,`menu`
                      FROM `user_menu` JOIN `user_accessmenu` 
                        ON `user_menu`.`id` = `user_accessmenu`.`menu_id`
                     WHERE `user_accessmenu`.`role_id` = $role_id
                  ORDER BY `user_accessmenu`.`menu_id` ASC
                     ";
        $menu = $this->db->query($queryMenu)->result_array();
        
      ?>


       
      <!-- LOOPING MENU -->

     <?PHP Foreach($menu as $m): ?>
        <div class="sidebar-heading">
          <?= $m['menu'];?>
        </div>

             <!-- SIAPKAN MENU SESUAI SUB MENU -->
             <?PHP
                  $menuid=$m['id'];
                  $querySubMenu="SELECT *
                                   FROM `user_submenu` JOIN `user_menu` 
                                     ON `user_submenu`.`menu_id` = `user_menu`.`id`
                                  WHERE `user_submenu`.`menu_id`= $menuid
                                  AND   `user_submenu`.`is_active` = 1
                  ";

                  $subMenu = $this->db->query($querySubMenu)->result_array();
             ?>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Nav Item - Dashboard -->

             <?PHP Foreach($subMenu as $sm): ?>
              <?php if($title == $sm['judul']) :?>
              <li class="nav-item active">

                <?php else :?>
                  <li class="nav-item">
                <?php endif; ?>
              
                <a class="nav-link" href="<?= base_url($sm['url']);?>">
                  <i class="<?= $sm['icon'];?>"></i>
                  <span><?= $sm['judul'];?></span></a>
              </li>


              <?php endforeach;?>

          

     <?php endforeach;?>

    
        

      
      
     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->