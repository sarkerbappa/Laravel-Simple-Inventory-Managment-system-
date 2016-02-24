
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
        <div class="col-md-11">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"> Edit Products Stock Out </h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'ProductUpdateSaveStockOut', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                              <?php
                             echo Form::hidden('stock_out_id', $value = $edit_product_data->stock_out_id, ''); 
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
                        <label id="inputSuccess" class="col-sm-3 control-label">Requisition Number<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::number('requisition_number', $value = $edit_product_data->Requisition_No, $attributes = array('class' => 'form-control', 'placeholder' => 'Requisition Number')); ?>
                            <span class="text-red"><?php echo $errors->first('requisition_number'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label"> Requisition By <b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::text('requisition_by', $value = $edit_product_data->Requisition_By, $attributes = array('class' => 'form-control', 'placeholder' => 'Requisition By')); ?>
                            <span class="text-red"><?php echo $errors->first('requisition_by'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label"> Recipient <b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::text('recipient', $value = $edit_product_data->Recipient, $attributes = array('class' => 'form-control', 'placeholder' => 'Recipient')); ?>
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
 </section><!-- /.content -->
@stop
