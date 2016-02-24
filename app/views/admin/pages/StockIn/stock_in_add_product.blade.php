@extends('admin.templates.default')
@section('content')
<section class="content">
    <?php if (Session::get('add_success_massege')) { ?>
        <div class="bs-example col-md-11">
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> <?php echo Session::get('add_success_massege'); ?>
            </div>
        </div>
    <?php } ?>
    <div class="row">
        <!-- right column -->
        <div class="col-md-11">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Products In Stock </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'ProductSaveInStock', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                              <?php
                            $select_Product_blank = array('' => 'Please Select');
                            $select_Product = array();
                            
                            foreach ($all_products as $single_product) {
                                // Make associative array from all category to create select option
                                $select_product[$single_product->Product_Id] = $single_product->Product_Name;
                            }
                            if(isset($select_product)){
                            $final_Product_select = $select_Product_blank + $select_product;
                            }else{
                              $final_Product_select = $select_Product_blank;  
                            };
                            echo Form::select('product_id', $final_Product_select, '', $attributes = array('class' => 'form-control'));
                              ?> 
                           <span class="text-red"><?php echo $errors->first('product_id'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product Count<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::number('product_count', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Product Count')); ?>
                            <span class="text-red"><?php echo $errors->first('product_count'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Order Number<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::number('order_number', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Order Number')); ?>
                            <span class="text-red"><?php echo $errors->first('order_number'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Supplier<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                              <?php
                            $select_supplier_blank = array('' => 'Please Select');
                            $select_supplier = array();
                            
                            foreach ($all_supplier as $single_supplier) {
                                // Make associative array from all category to create select option
                                $select_supplier[$single_supplier->Supplier_ID] = $single_supplier->Supplier_Name;
                            }
                            $final_supplier_select =  $select_supplier_blank+ $select_supplier;
                            echo Form::select('supplier_id', $final_supplier_select, '', $attributes = array('class' => 'form-control'));
                              ?> 
                           <span class="text-red"><?php echo $errors->first('supplier_id'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label" >Order Date <b class="mandetory_star">*</b></label>
                        <div class="col-sm-9">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="order_date"class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                             <span class="text-red"><?php echo $errors->first('order_date'); ?></span>
                        </div><!-- /.input group -->
                      </div>
                    </div><!-- /.form group -->
                    
                    
                    
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <?php echo Form::submit('Submit', array('class' => 'btn btn-info pull-right inside_body_submit')) ?>
                </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
            <?php echo Form::close(); ?>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      
      <!-- /////////////          Display  all products in stock         ////////////  -->
      
      <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Products</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Stock ID</th>
                                <th>Product Name </th>
                                <th>Product Count</th>
                                <th>Order Number</th>
                                <th>Supplier</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_products_stock as $single_product) {
                                ?>
                                <tr>
                                    <td> <?php  echo $single_product->stock_ID; ?> </td>
                                    <td> <?php  echo ItemConfiguration ::getProductById($single_product->Product_ID)->Product_Name ?> </td>
                                    <td> <?php  echo $single_product->Product_Count; ?> </td>
                                    <td> <?php  echo $single_product->Order_No; ?> </td>
                                    <td> <?php  echo ItemConfiguration ::getSupplierById($single_product->Supplier_ID)->Supplier_Name ?> </td>
                                    <td> <?php  echo $single_product->Order_date; ?> </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary ">Action</button>
                                            <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?php echo URL::action('StockInController@editStockIn',  [$single_product->stock_ID]) ?>">Edit</a></li>
                                                <li><a href="<?php echo URL::action('StockInController@deleteStockIn',[$single_product->stock_ID]) ?>">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                                
                        </tbody>
                        <tfoot>
                            
                            <tr>
                                <th>Stock ID</th>
                                <th>Product Name </th>
                                <th>Product Count</th>
                                <th>Order Number</th>
                                <th>Supplier</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div>
 </section><!-- /.content -->
@stop