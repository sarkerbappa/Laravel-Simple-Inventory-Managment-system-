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
                    <h3 class="box-title">Add products</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'ProductSave', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product Name <b class="mandetory_star">*</b></label>
                        <div class="col-sm-9">
                            <?php echo Form::text('product_name', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Product Name')); ?>
                            <span class="text-red"><?php echo $errors->first('product_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Product Description<b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::textarea('product_description', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Product Description')); ?>
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
      
      <!-----------------------------Product Display grid------------------------------------------------> 
      <div class="row">
        <div class="col-xs-11">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Products</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Description </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_products as $single_product) { ?>
                                <tr>
                                    <td style="max-width:100px;"> <?php echo $single_product->Product_Name; ?> </td>
                                    <td style="max-width:150px;"> <?php echo $single_product->Product_Description; ?> </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary ">Action</button>
                                            <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?php echo URL::action('ItemConfigurationController@editProduct',  [$single_product->Product_Id]) ?>">Edit</a></li>
                                                <li><a href="<?php echo URL::action('ItemConfigurationController@deleteProduct',[$single_product->Product_Id]) ?>">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Supplier Address</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
     </section><!-- /.content -->
@stop