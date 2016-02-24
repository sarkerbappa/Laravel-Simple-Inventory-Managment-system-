@extends('admin.templates.default')
@section('content')
<section class="content">
    <?php if (Session::get('add_success_massege')) { ?>
        <div class="bs-example col-md-9">
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Success!</strong> <?php echo Session::get('add_success_massege'); ?>
            </div>
        </div>
    <?php } ?>
    <?php if(Session::get('product_unavailable_error') !== null){?>
         <div class="bs-example col-md-9">
            <div class="alert alert-warning fade in">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Alert!</strong> <?php echo 'You have only'.'  '.'<b>'. Session::get('product_unavailable_error').'</b>'.'  '.'products available!'; ?>
            </div>
        </div>
         <?php }?>
    <div class="row">
        <!-- right column -->
        <div class="col-md-11">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Products Stock Out </h3>
                </div><!-- /.box-header -->
                <!-- form start --><?php ?>
                <?php echo Form::open(array('route' => 'ProductSaveStockOut', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                              <?php
                            $select_Product_blank = array('' => 'Please Select');
                            $select_Product = array();
                            
                            foreach ($all_products as $single_product) { 
                                // Make associative array from all category to create select option
                                $select_product[$single_product->Product_ID] = $single_product->Product_Name;
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
                        <label id="inputSuccess" class="col-sm-3 control-label">Requisition Number<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::number('requisition_number', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Requisition Number')); ?>
                            <span class="text-red"><?php echo $errors->first('requisition_number'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label"> Requisition By <b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::text('requisition_by', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Requisition By')); ?>
                            <span class="text-red"><?php echo $errors->first('requisition_by'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label"> Recipient <b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::text('recipient', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Recipient')); ?>
                            <span class="text-red"><?php echo $errors->first('recipient'); ?></span>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <?php echo Form::submit('Submit', array('class' => 'btn btn-info pull-right inside_body_submit')) ?>
                </div><!-- /.box-footer -->
                </form>
            </div><!-- /.box -->
            <?php echo Form::close(); ?>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
      
      <!-- /////////////          Display  all products in stock out         ////////////  -->
      <div class="row">
        <div class="col-xs-11">
            <div class="box">
                <div class="box-header">
                    <div class="row">
                        <div class="col-md-4"><h3 class="box-title">All Products</h3></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4 btn-group">
                            <a href="<?php echo URL::action('StockOutController@xlStockOut') ?>"><button type="button" class="btn btn-primary pull-right">Export Excel</button></a>                          
                        </div>
                    </div>
                   
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Stock ID</th>
                                <th>Product Name </th>
                                <th>Product Count</th>
                                <th>Requisition Number</th>
                                <th>Requisition By </th>
                                <th>Recipient</th>
                                <th>Stock Out Date</th>
                                <th>Action</th>
<!--                                <th><div class="btn-group">
                                            
                                        </div>
                                </th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_products_stock_out as $single_product) {
                                ?>
                                <tr>
                                    <td> <?php  echo $single_product->stock_out_id; ?> </td>
                                    <td> <?php  echo ItemConfiguration ::getProductById($single_product->Product_ID)->Product_Name ?> </td>
                                    <td> <?php  echo $single_product->Product_Count; ?> </td>
                                    <td> <?php  echo $single_product->Requisition_No; ?> </td>
                                    <td> <?php  echo $single_product->Requisition_By; ?> </td>
                                    <td> <?php  echo $single_product->Recipient; ?> </td>
                                    <td> <?php if(isset($single_product->updated_at)){echo $single_product->updated_at;}else{ echo $single_product->created_at; }?> </td>
                                    <td style="min-width:90px;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary ">Action</button>
                                            <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?php echo URL::action('StockOutController@editStockOut',  [$single_product->stock_out_id]) ?>">Edit</a></li>
                                                <li><a href="<?php echo URL::action('StockOutController@deleteStockOut',[$single_product->stock_out_id]) ?>">Delete</a></li>
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
                                <th>Requisition Number</th>
                                <th>Requisition By </th>
                                <th>Recipient</th>
                                <th>Stock Out Date</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
<!--    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6"><?php // echo $all_products_stock_out->links(); ?></div>
        <div class="col-md-3"></div>
    </div>-->
 </section><!-- /.content -->
@stop