<!-- nav -->    
<?php 
    $nav_selected = $this->NavigationSelector->selectedMainNavigation($nav_selected[0]);
    if (!empty($sub_nav_selected)) {
        $sub_nav_selected = $this->NavigationSelector->selectedSubNavigation($sub_nav_selected['parent'],$sub_nav_selected['child']);
    }else{
        $sub_nav_selected = array();
    }
    
?>             


    <ul class="sidebar-menu" data-ride="collapse">

    <?php if($hdr_user_data->user->group_id ==  1) { ?>
        <li class="treeview <?= $nav_selected["dashboard"] ?>">    
          <?= $this->Html->link('<i class="glyphicon glyphicon-dashboard icon icon-big white"></i><span class="sptr">Dashboard</span>',["controller" => "users", "action" => "dashboard"],["class" => "auto", "escape" => false]) ?>
        <!--    <a href="#"><i class="glyphicon glyphicon-dashboard icon icon-big" style="color:white !important;"></i> <span style="background-color: #111111;margin-left: 0px;height: 49px;z-index: 10;">Dashboard</span></a> -->
        </li>             
        <li class="treeview <?= $nav_selected["shipments"] ?>">
            <?= $this->Html->link('<i class="fa fa-truck icon-big white"></i><span class="sptrsub">Shipments</span>',["controller" => "shipments", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>                
        <li class="treeview <?= $nav_selected["shipping_carriers"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i><span class="sptrsub">Shipping Carriers</span>',["controller" => "shipping_carriers", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>   
        <li class="treeview <?= $nav_selected["shipping_services"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i><span class="sptrsub">Shipping Services</span>',["controller" => "shipping_services", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>                             
        <li class="treeview <?= $nav_selected["shipping_purposes"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i><span class="sptrsub">Shipping Purposes</span>',["controller" => "shipping_purposes", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>                             
        <li class="treeview <?= $nav_selected["clients"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-user icon icon-big white"></i><span class="sptrsub">Clients</span>',["controller" => "clients", "action" => "index"],["class" => "auto", "escape" => false]) ?>
    
        </li>  
        <li class="treeview <?= $nav_selected["users"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-user icon icon-big white"></i><span class="sptrsub">Users</span>',["controller" => "user_entities", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>  
        <li class="treeview <?= $nav_selected["groups"] ?>">
            <?= $this->Html->link('<i class="fa fa-list-alt icon icon-big white"></i><span class="sptrsub">Groups</span>',["controller" => "groups", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>      
    <?php }elseif($hdr_user_data->user->group_id == 2) { ?>
        <li class="treeview <?= $nav_selected["dashboard"] ?>">
       
            <?= $this->Html->link('<i class="glyphicon glyphicon-dashboard icon icon-big white"></i><span class="sptrsub">Dashboard</span>',["controller" => "users", "action" => "user_dashboard"],["class" => "auto", "escape" => false]) ?>
     
        </li>   
        <li class="treeview <?= $nav_selected["shipments"] ?>">
      
            <?= $this->Html->link('<i class="fa fa-truck icon icon-big white"></i><span class="sptrsub">Shipments</span>',["controller" => "shipments", "action" => "index"],["class" => "auto", "escape" => false]) ?>
      
        </li>   
        <li class="treeview <?= $nav_selected["inventory"] ?>">
    
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i><span class="sptrsub">Inventory</span>',["controller" => "inventory", "action" => "admin"],["class" => "auto", "escape" => false]) ?>
       
        </li>            
        <li class="treeview <?= $nav_selected["invoice"] ?>">
       
            <?= $this->Html->link('<i class="fa fa-money icon icon-big white"></i><span class="sptrsub">Billing</span>',["controller" => "invoice", "action" => "index"],["class" => "auto", "escape" => false]) ?>
      
        </li>
        <li class="treeview <?= $nav_selected["users"] ?>">
   
            <?= $this->Html->link('<i class="fa fa-user icon icon-big white"></i><span class="sptrsub">Employees</span>',["controller" => "user_entities", "action" => "employees"],["class" => "auto", "escape" => false]) ?>
   
        </li>               
        <li class="treeview <?= $nav_selected["clients"] ?>">
      
            <?= $this->Html->link('<i class="fa fa-fw fa-user icon icon-big white"></i><span class="sptrsub">Clients</span>',["controller" => "clients", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        
        </li>

         <li class="treeview <?= $nav_selected["message"] ?>">

            <?= $this->Html->link('<i class="fa fa-fw fa-inbox icon icon-big white"></i> <span class="sptr">Messages</span>',["controller" => "message", "action" => "index"],["class" => "auto", "escape" => false]) ?>

        </li>
        
    <?php }elseif($hdr_user_data->user->group_id == 3) { ?>
        <li class="treeview <?= $nav_selected["dashboard"] ?>">
     
            <?= $this->Html->link('<i class="glyphicon glyphicon-dashboard icon icon-big white"></i><span class="sptrsub">Dashboard</span>',["controller" => "users", "action" => "user_dashboard"],["class" => "auto", "escape" => false]) ?>
        
        </li>   
        <li class="treeview <?= $nav_selected["shipments"] ?>">
       
            <?= $this->Html->link('<i class="fa fa-truck icon icon-big white"></i><span class="sptrsub">Shipment</span>',["controller" => "shipments", "action" => "index"],["class" => "auto", "escape" => false]) ?>
       
        </li>  
        <li class="treeview <?= $nav_selected["inventory"] ?>">
       
            <?php if($hdr_user_data->user->group_id == 4) { ?>
             <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i><span class="sptrsub">Inventory</span>',["controller" => "inventory", "action" => "employee"],["class" => "auto", "escape" => false]) ?>
            <?php }else{?>
             <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i><span class="sptrsub">Inventory</span><span  class="label label-danger" >' .  $shipmentsOrder . ' </span>',["controller" => "inventory", "action" => "employee"],["class" => "auto", "escape" => false]) ?>
            <?php } ?>
            <!--    

                <?php if($hdr_user_data->user->group_id == 4) { ?>
             <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i> <span class="font-bold font-size-r">' . __('Inventory') . ' </span>',["controller" => "inventory", "action" => "employee"],["class" => "auto", "escape" => false]) ?>
            <?php }else{?>
             <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i> <span class="font-bold font-size-r">' . __('Inventory') . ' </span>  <span  class="label label-danger" >' .  $shipmentsOrder . ' </span>',["controller" => "inventory", "action" => "employee"],["class" => "auto", "escape" => false]) ?>
            <?php } ?>

            --> 
        </li>                 
    <?php }elseif($hdr_user_data->user->group_id == 4) { ?>                                       
        <li class="treeview <?= $nav_selected["dashboard"] ?>">
 
          <?= $this->Html->link('<i class="glyphicon glyphicon-dashboard icon icon-big white"></i><span class="sptr">Dashboard</span>',["controller" => "users", "action" => "client_dashboard"],["class" => "auto", "escape" => false]) ?>
    
        </li>
        <li class="treeview <?= $nav_selected["shipments"] ?>">
  
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i><span class="sptr">Shipments</span>',["controller" => "shipments", "action" => "client"],["class" => "auto", "escape" => false]) ?>
   
        </li> 
        <li class="treeview <?= $nav_selected["invoice"] ?>">
   
            <?= $this->Html->link('<i class="fa fa-money icon icon-big white"></i> <span class="sptr">Billing</span>',["controller" => "invoice", "action" => "client"],["class" => "auto", "escape" => false]) ?>
 
        </li>
       <!-- <li class="<?= $nav_selected["end_user_order"] ?>">
            <?= $this->Html->link('<i class="fa fa-money icon icon-big white"></i> <span class="sptr">End User Order</span>',["controller" => "end_user_order", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li> -->

        <li class="treeview <?= $nav_selected["inventory"] ?>">

            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big white"></i> <span class="sptr">Inventory</span>',["controller" => "inventory", "action" => "index"],["class" => "auto", "escape" => false]) ?>

        </li>

        <li class="treeview <?= $nav_selected["message"] ?>">

            <?= $this->Html->link('<i class="fa fa-fw fa-inbox icon icon-big white"></i> <span class="sptr">Messages</span>',["controller" => "message", "action" => "index"],["class" => "auto", "escape" => false]) ?>

        </li>


    <?php } ?>
  </ul>
