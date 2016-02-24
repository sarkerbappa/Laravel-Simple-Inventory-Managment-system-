@extends('admin.templates.default')
@section('content')
<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">General Stock Report</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Count Stock In</th>
                        <th>Count Stock Out</th>
                        <th>Balance</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($all_general_products as $single_product) {?>
                      <tr>
                        <td><?php echo $single_product->Product_ID ?></td>
                        <td><?php echo $single_product->Product_Name ?></td>
                        <td><?php echo $single_product->Count_StockIN ?></td>
                        <td><?php echo $single_product->Count_StockOut ?></td>
                        <td><?php echo $single_product->Balance ?></td>
                      </tr>
                      <?php }?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Count Stock In</th>
                        <th>Count Stock Out</th>
                        <th>Balance</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
@stop
