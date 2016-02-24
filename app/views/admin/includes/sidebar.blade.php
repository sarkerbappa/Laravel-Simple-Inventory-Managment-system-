<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{URL::to('public/uploads/profile/'.Auth::user()->profile_image)}}" class="img-circle" alt="User Image">
            </div>
          </div>
          <!-- search form -->
        
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="<?php echo URL::route('adminDashboard')?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cog"></i>
                <span>Item Configuration</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo URL::route('addCategory') ?>"><i class="fa fa-circle-o"></i> Category</a></li>
                    <li><a href="<?php echo URL::route('addBrand') ?>"><i class="fa fa-circle-o"></i> Brand </a></li>
                    <li><a href="<?php echo URL::route('addSupplier') ?>"><i class="fa fa-circle-o"></i> Supplier </a></li>
                    <li><a href="<?php echo URL::route('addProducts') ?>"><i class="fa fa-circle-o"></i> Products </a></li>
                </ul>
            </li>
            <li><a href="<?php echo URL::route('addProductInStock') ?>"><i class="fa fa-circle-o text-yellow"></i> <span>Stock In </span></a></li>
            <li><a href="<?php echo URL::route('addProductStockOut') ?>"><i class="fa fa-circle-o text-red"></i> <span>Stock Out </span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Report</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo URL::route('generalStockReport') ?>"><i class="fa fa-circle-o"></i> General Stock Report</a></li>
                <!--<li><a href="<?php // echo URL::route('productWiseStockInReport') ?>"><i class="fa fa-circle-o"></i>Product Wise Stock In Report</a></li>-->
                 <!--<li><a href="<?php // echo URL::route('productWiseStockOutReport') ?>"><i class="fa fa-circle-o"></i>Product Wise Stock Out Report</a></li>-->
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->