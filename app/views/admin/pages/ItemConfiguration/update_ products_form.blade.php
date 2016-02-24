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
                    <h3 class="box-title">Add products</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'ProductUpdateSave', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product Name <b class="mandetory_star">*</b></label>
                        <div class="col-sm-9">
                            <?php echo Form::hidden('Product_id', $value = $productData->Product_Id, ''); ?>
                            <?php echo Form::text('product_name', $value = $productData->Product_Name, $attributes = array('class' => 'form-control', 'placeholder' => 'Product Name')); ?>
                            <span class="text-red"><?php echo $errors->first('product_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product Description<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::textarea('product_description', $value = $productData->Product_Description, $attributes = array('class' => 'form-control', 'placeholder' => 'Product Description')); ?>
                            <span class="text-red"><?php echo $errors->first('product_description'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product Category<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                              <?php
                            $select_category_blank = array('' => 'Please Select');
                            $select_category = array();
                            
                            foreach ($all_category as $single_category) {
                                // Make associative array from all category to create select option
                                $select_category[$single_category->Category_ID] = $single_category->Category_Name;
                            }
                            $final_category_select = $select_category_blank + $select_category;
                            echo Form::select('cat_id', $final_category_select, '', $attributes = array('class' => 'form-control'));
                              ?> 
                           <span class="text-red"><?php echo $errors->first('cat_id'); ?></span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product Brand<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                          <?php
                            $select_brand_blank = array('' => 'Please Select');
                            $select_brand = array();
                            foreach ($all_brands as $single_brand) {
                                // Make associative array from all brand to create select option
                                $select_brand[$single_brand->Brand_ID] = $single_brand->Brand_Name;
                            }
                            $final_brand_select = $select_brand + $select_brand_blank;
                            echo Form::select('brand_id', $final_brand_select,'', $attributes = array('class' => 'form-control'));
                            ?>
                             <span class="text-red"><?php echo $errors->first('brand_id'); ?></span>
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