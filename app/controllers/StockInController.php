<?php

class StockInController extends BaseController {
    
    public function addProductInStock() {
        $data = array(
               'title'              => 'Add products',
               'all_products'       => ItemConfiguration :: getAllProducts(),
               'all_brands'         => ItemConfiguration :: getAllBrands(),
               'all_category'       => ItemConfiguration :: getAllCategories(),
               'all_supplier'       => ItemConfiguration :: getAllSupplier(),
               'all_products_stock' => StockIn :: getAllProductsInStack(),
                );
        return View::make('admin.pages.StockIn.stock_in_add_product')->with($data);
    }
    
    // Save product in stock in
    public function ProductSaveInStock(){
        $validation_rule = array(
            'product_id'    => array('required', 'max:35'),
            'product_count' => array('required','integer', 'max:35'),
            'order_number'  => array('required','integer', 'max:35'),
            'supplier_id'   => array('required', 'max:300'),
            'order_date'    => array('required', 'max:300'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            return Redirect::to('/addProductInStock')->withErrors($validation);
        } else {
            $product_id       = Input::get('product_id');
            $product_count    = Input::get('product_count');
            $order_number     = Input::get('order_number');
            $supplier_id      = Input::get('supplier_id');
            $order_date       = Input::get('order_date');
            $token            = Input::get('_token');
            // Insert data into database      
            StockIn::addProductInStock($product_id,$product_count,$order_number,$supplier_id,$order_date,$token);
            return Redirect::to('/addProductInStock')->with('add_success_massege', 'Product Added into stock successfully.');
        }
    }
    
      //Category Edite Form
    public function editStockIn($id) {
        $stock_in_data = StockIn::getProductFromStockById($id);
//        var_dump($stock_in_data);exit;
        $data = array(
               'title'              => 'StockIn Edit',
               'all_products'       => ItemConfiguration :: getAllProducts(),
               'all_brands'         => ItemConfiguration :: getAllBrands(),
               'all_category'       => ItemConfiguration :: getAllCategories(),
               'all_supplier'       => ItemConfiguration :: getAllSupplier(),
               'all_products_stock' => StockIn :: getAllProductsInStack(),
               'edit_product_data'  => $stock_in_data,
                );
        
        return View::make('admin.pages.StockIn.update_stockIn_form')->with($data);
    }
    
    
    public function ProductUpdateSaveInStock($id){
        $stock_id = Input::get('stock_id');
        $validation_rule = array(
            'product_id'    => array('required', 'max:35'),
            'product_count' => array('required','integer', 'max:35'),
            'order_number'  => array('required','integer', 'max:35'),
            'supplier_id'   => array('required', 'max:300'),
            'order_date'    => array('required', 'max:300'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            return Redirect::to('/editStockIn/'.$stock_id)->withErrors($validation);
        } else {
            $stock_id         = Input::get('stock_id');
            $product_id       = Input::get('product_id');
            $product_count    = Input::get('product_count');
            $order_number     = Input::get('order_number');
            $supplier_id      = Input::get('supplier_id');
            $order_date       = Input::get('order_date');
            $token            = Input::get('_token');
            
            // Insert data into database      
            StockIn::updateProductInStock($stock_id,$product_id,$product_count,$order_number,$supplier_id,$order_date,$token);
            return Redirect::to('/addProductInStock')->with('add_success_massege', 'Product updated into stock successfully.');
        }
    }
    
    public function deleteStockIn($id){
        StockIn::deleteStockIn($id);
        return Redirect::to('/addProductInStock')->with('add_success_massege', 'Product Deleted successfully.');
    }
    
}
