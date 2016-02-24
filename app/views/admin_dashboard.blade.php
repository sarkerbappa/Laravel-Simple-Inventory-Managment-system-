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
                    <tfoot>
                      <tr>
                          <th>Product ID</th>
                          <th>Product Name</th>
                          <th>StockIN</th>
                          <th>StockOut</th>
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