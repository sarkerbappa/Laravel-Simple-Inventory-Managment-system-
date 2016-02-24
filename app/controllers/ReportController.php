
<?php
class ReportController  extends BaseController{
    
    public function generalStockReport(){
        
         $data = array(
               'title' => 'General Stock report',
               'all_general_products'       => Report :: generalStockReport(),
                );
       return View::make('admin.pages.Report.general_stock_report')->with($data);
    }
    
     public function productWiseStockInReport(){
         $data = array(
               'title'=> 'Stock In report',
               'all_products'=> ItemConfiguration :: getAllProducts(),
                );
       return View::make('admin.pages.Report.product_wise_stock_in_report')->with($data);
    }
    
    public function productWiseStockInReportSearch() {
        $product_id = Input::get('product_id');
        $data = array(
               'title'            => 'Stock In report',
               'searched_product' => Report::searchProductInStock($product_id)
                );
        return Redirect::to('/productWiseStockInReport')->with($data);
    }

    public function productWiseStockOutReport(){
         $data = array(
               'title' => 'Stock Out report',
                );
       return View::make('admin.pages.Report.product_wise_stock_out_report')->with($data);
    }
    
}


