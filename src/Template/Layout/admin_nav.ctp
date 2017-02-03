<!-- nav -->    
<?php 
    $nav_selected = $this->NavigationSelector->selectedMainNavigation($nav_selected[0]);
    if (!empty($sub_nav_selected)) {
        $sub_nav_selected = $this->NavigationSelector->selectedSubNavigation($sub_nav_selected['parent'],$sub_nav_selected['child']);
    }else{
        $sub_nav_selected = array();
    }
    
?>             
<nav class="nav-primary hidden-xs">

  <ul class="nav nav-main" data-ride="collapse">
    <?php if($hdr_user_data->user->group_id ==  1) { ?>
        <li class="<?= $nav_selected["dashboard"] ?>">
            <?= $this->Html->link('<i class="glyphicon glyphicon-dashboard icon icon-big"></i> <span class="font-bold font-size-r">' . __('Dashboard') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "users", "action" => "dashboard"],["class" => "auto", "escape" => false]) ?>

        </li>             
        <li class="<?= $nav_selected["shipments"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Shipments') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "shipments", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>                
        <li class="<?= $nav_selected["shipping_carriers"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Shipping Carriers') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "shipping_carriers", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>   
        <li class="<?= $nav_selected["shipping_services"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Shipping Services') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "shipping_services", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>                             
        <li class="<?= $nav_selected["shipping_purposes"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Shipping Purposes') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "shipping_purposes", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>                             
        <li class="<?= $nav_selected["clients"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-user icon icon-big"></i> <span class="font-bold font-size-r">' . __('Clients') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "clients", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>  
        <li class="<?= $nav_selected["users"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-user icon icon-big"></i> <span class="font-bold font-size-r">' . __('Users') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "user_entities", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>  
        <li class="<?= $nav_selected["groups"] ?>">
            <?= $this->Html->link('<i class="fa fa-list-alt icon icon-big"></i> <span class="font-bold font-size-r">' . __('Groups') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "groups", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>      
    <?php }elseif($hdr_user_data->user->group_id == 2) { ?>
        <li class="<?= $nav_selected["dashboard"] ?>">
            <?= $this->Html->link('<i class="glyphicon glyphicon-dashboard icon icon-big"></i> <span class="font-bold font-size-r">' . __('Dashboard') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "users", "action" => "user_dashboard"],["class" => "auto", "escape" => false]) ?>
        </li>   
        <li class="<?= $nav_selected["shipments"] ?>">
            <?= $this->Html->link('<i class="fa fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Shipments') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "shipments", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>   
        <li class="<?= $nav_selected["inventory"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Inventory') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "inventory", "action" => "admin"],["class" => "auto", "escape" => false]) ?>
        </li>            
        <li class="<?= $nav_selected["invoice"] ?>">
            <?= $this->Html->link('<i class="fa fa-money icon icon-big"></i> <span class="font-bold font-size-r">' . __('Billing') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "invoice", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>
        <li class="<?= $nav_selected["users"] ?>">
            <?= $this->Html->link('<i class="fa fa-user icon icon-big"></i> <span class="font-bold font-size-r">' . __('Employees') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "user_entities", "action" => "employees"],["class" => "auto", "escape" => false]) ?>
        </li>               
        <li class="<?= $nav_selected["clients"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-user icon icon-big"></i> <span class="font-bold font-size-r">' . __('Clients') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "clients", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>
    <?php }elseif($hdr_user_data->user->group_id == 3) { ?>
        <li class="<?= $nav_selected["dashboard"] ?>">
            <?= $this->Html->link('<i class="glyphicon glyphicon-dashboard icon icon-big"></i> <span class="font-bold font-size-r">' . __('Dashboard') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "users", "action" => "user_dashboard"],["class" => "auto", "escape" => false]) ?>
        </li>   
        <li class="<?= $nav_selected["shipments"] ?>">
            <?= $this->Html->link('<i class="fa fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Shipments') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "shipments", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>  
        <li class="<?= $nav_selected["inventory"] ?>">
            <?php if($hdr_user_data->user->group_id == 4) { ?>
             <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Inventory') . ' </span> </span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "inventory", "action" => "employee"],["class" => "auto", "escape" => false]) ?>
            <?php }else{?>
             <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Inventory') . ' </span>  <span  class="label label-danger" >' .  $shipmentsOrder . ' </span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "inventory", "action" => "employee"],["class" => "auto", "escape" => false]) ?>
            <?php } ?>

        </li>                 
    <?php }elseif($hdr_user_data->user->group_id == 4) { ?>                                       
        <li class="<?= $nav_selected["dashboard"] ?>">
            <?= $this->Html->link('<i class="glyphicon glyphicon-dashboard icon icon-big"></i> <span class="font-bold font-size-r">' . __('Dashboard') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "users", "action" => "dashboard"],["class" => "auto", "escape" => false]) ?>
        </li>
        <li class="<?= $nav_selected["shipments"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Shipments') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "shipments", "action" => "client"],["class" => "auto", "escape" => false]) ?>
        </li> 
        <li class="<?= $nav_selected["invoice"] ?>">
            <?= $this->Html->link('<i class="fa fa-money icon icon-big"></i> <span class="font-bold font-size-r">' . __('Billing') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "invoice", "action" => "client"],["class" => "auto", "escape" => false]) ?>
        </li>
       <!-- <li class="<?= $nav_selected["end_user_order"] ?>">
            <?= $this->Html->link('<i class="fa fa-money icon icon-big"></i> <span class="font-bold font-size-r">' . __('End User Order') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "end_user_order", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li> -->

        <li class="<?= $nav_selected["inventory"] ?>">
            <?= $this->Html->link('<i class="fa fa-fw fa-truck icon icon-big"></i> <span class="font-bold font-size-r">' . __('Inventory') . '</span> <i class="glyphicon glyphicon-chevron-right icon f-right"></i>',["controller" => "inventory", "action" => "index"],["class" => "auto", "escape" => false]) ?>
        </li>

    <?php } ?>
  </ul>
</nav>
<!-- / nav -->