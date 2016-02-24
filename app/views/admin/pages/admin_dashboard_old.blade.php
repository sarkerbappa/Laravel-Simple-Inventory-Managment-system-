@extends('admin.templates.default')
@section('content')


<section class="content">
          <!-- Main row -->
          <div class="row">
              <div class="col-md-1"></div>
            <!-- Left col -->
            <div class="col-md-10">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Stock Report</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                          <?php // echo '<pre>'; print_r($dashboard_product_list);echo '</pre>';?>
                        <tr>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>StockIN</th>
                          <th>StockOut</th>
                          <th>Balance</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach ($dashboard_product_list as $dashboard_single_product) {
                              $balanch = $dashboard_single_product->Balance;
                              if ($balanch > '5') {
                                  $status = "success";
                              } elseif ($balanch > '0') {
                                  $status = "warning";
                              } else {
                                  $status = "danger";
                              }
                              ?>
                              <tr>
                                  <td><?php echo $dashboard_single_product->Product_ID ?></td>
                                  <td><?php echo $dashboard_single_product->Product_Name ?></td>
                                  <td><?php echo $dashboard_single_product->Count_StockIN ?></td>
                                  <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $dashboard_single_product->Count_StockOut ?></div></td>
                                  <td><span class="label label-<?php echo $status ?>"><?php echo $dashboard_single_product->Balance ?></span></td>
                              </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->

          </div><!-- /.row -->

        </section><!-- /.content -->
@stop