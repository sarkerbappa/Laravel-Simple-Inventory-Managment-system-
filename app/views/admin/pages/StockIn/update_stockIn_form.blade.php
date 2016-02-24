
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
    <div class="row">
        <!-- right column -->
        <div class="col-md-9">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Products In Stock </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'ProductUpdateSaveInStock', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::hidden('stock_id', $value = $edit_product_data->stock_ID, ''); 
                            $select_Product_blank = array($edit_product_data->Product_ID => ItemConfiguration::getProductById($edit_product_data->Product_ID)->Product_Name);
                            $select_Product = array();
                            
                            foreach ($all_products as $single_product) {
                                // Make associative array from all category to create select option
                                $select_product[$single_product->Product_Id] = $single_product->Product_Name;
                            }
                            $final_Product_select = $select_Product_blank + $select_product;
                            echo Form::select('product_id', $final_Product_select, '', $attributes = array('class' => 'form-control'));
                              ?> 
                           <span class="text-red"><?php echo $errors->first('product_id'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product Count<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::number('product_count', $value = $edit_product_data->Product_Count, $attributes = array('class' => 'form-control', 'placeholder' => 'Product Count')); ?>
                            <span class="text-red"><?php echo $errors->first('product_count'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Order Number<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::number('order_number', $value = $edit_product_data->Order_No, $attributes = array('class' => 'form-control', 'placeholder' => 'Order Number')); ?>
                            <span class="text-red"><?php echo $errors->first('order_number'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Supplier<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                              <?php
                            $select_supplier_blank = array($edit_product_data->Supplier_ID=> ItemConfiguration::getSupplierById($edit_product_data->Supplier_ID)->Supplier_Name);
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
                            <input type="text" name="order_date"  value = <?php echo $edit_product_data->Order_date ?> class="form-control" data-inputmask="'alias': '<?php echo $edit_product_data->Order_date ?>'" data-mask>
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
 </section><!-- /.content -->
@stop
