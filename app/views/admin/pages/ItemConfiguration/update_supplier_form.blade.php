@extends('admin.templates.default')
@section('content')
<section class="content">
    <div class="row">
        <!-- right column -->
        <div class="col-md-9">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Supplier</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <?php echo Form::open(array('route' => 'supplierUpdateSave', 'files' => true, 'class' => 'form-horizontal')) ?>
                <div class="box-body">
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Category Name <b class="mandetory_star">*</b></label>
                        <div class="col-sm-9">
                            <?php echo Form::hidden('Supplier_ID', $value = $supplier->Supplier_ID, ''); ?>
                            <?php echo Form::text('supplier_name', $value = $supplier->Supplier_Name, $attributes = array('class' => 'form-control', 'placeholder' => 'Supplier Name')); ?>
                            <span class="text-red"><?php echo $errors->first('supplier_name'); ?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label id="inputSuccess" class="col-sm-3 control-label">Brand Description <b class="mandetory_star">*</b> </label>
                        <div class="col-sm-9">
                            <?php echo Form::textarea('supplier_address', $value = $supplier->Supplier_Address, $attributes = array('class' => 'form-control', 'placeholder' => 'Supplier Address')); ?>
                            <span class="text-red"><?php echo $errors->first('supplier_address'); ?></span>
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

