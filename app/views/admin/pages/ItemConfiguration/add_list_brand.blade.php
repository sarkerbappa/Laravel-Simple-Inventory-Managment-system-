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
                    <h3 class="box-title">Add Brand</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'brandSave', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Brand Name <b class="mandetory_star">*</b></label>
                        <div class="col-sm-9">
                            <?php echo Form::text('brand_name', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Brand Name')); ?>
                            <span class="text-red"><?php echo $errors->first('brand_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Brand Description <b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::textarea('brand_description', '', $attributes = array('class' => 'form-control', 'placeholder' => 'Brand Description')); ?>
                            <span class="text-red"><?php echo $errors->first('brand_description'); ?></span>
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
    <!-----------------------------Brand Display grid------------------------------------------------> 
    <div class="row">
        <div class="col-xs-11">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">All Brands</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Brand Title</th>
                                <th>Brand Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allbrand as $single_brand) { ?>
                                <tr>
                                    <td style="max-width:150px;"> <?php echo $single_brand->Brand_Name;?> </td>
                                    <td style="max-width:150px;"> <?php echo $single_brand->Brand_Description; ?> </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary ">Action</button>
                                            <button type="button" class="btn btn-primary  dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="<?php echo URL::action('ItemConfigurationController@editBrand', [$single_brand->Brand_ID]) ?>">Edit</a></li>
                                                <li><a href="<?php echo URL::action('ItemConfigurationController@deleteBrand', [$single_brand->Brand_ID]) ?>">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                             <tr>
                                <th>Brand Title</th>
                                <th>Brand Description</th>
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