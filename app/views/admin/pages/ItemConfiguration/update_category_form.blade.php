@extends('admin.templates.default')
@section('content')
<section class="content">
    <div class="row">
        <!-- right column -->
        <div class="col-md-9">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'categoryUpdateSave', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Category Name <b class="mandetory_star">*</b></label>
                        <div class="col-sm-9">
                            <?php echo Form::hidden('category_id', $value = $category->Category_ID, ''); ?>
                            <?php echo Form::text('category_name', $value = $category->Category_Name, $attributes = array('class' => 'form-control', 'placeholder' => 'Category Name')); ?>
                            <span class="text-red"><?php echo $errors->first('category_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Category Description <b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::textarea('category_description', $value = $category->Category_Description, $attributes = array('class' => 'form-control', 'placeholder' => 'Category Description')); ?>
                            <span class="text-red"><?php echo $errors->first('category_description'); ?></span>
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

