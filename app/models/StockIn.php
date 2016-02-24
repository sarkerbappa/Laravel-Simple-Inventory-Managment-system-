<?php
class StockIn extends \Eloquent {
	protected $fillable = [];
        
        static function addProductInStock($product_id, $product_count, $order_number, $supplier_id, $order_date,$token) {
        DB::table('stock_in')->insert(
                array(
                    'Product_ID'    => $product_id,
                    'Product_Count' => $product_count,
                    'Order_No'      => $order_number,
                    'Supplier_ID'   => $supplier_id,
                    'Order_date'    => $order_date,
                    'remember_token'=> $token,
                )
        );
    }

    static function getAllProductsInStack() {
        $all_products_in_stock = DB::table('stock_in')->get();
        return $all_products_in_stock;
    }
    
    static function getProductFromStockById($id) {
        $stockin_product_by_id = DB::table('stock_in')->where('stock_ID', $id)->first();
        return $stockin_product_by_id;
    }
    
    static function getProductNumberfromStockinByProductId($product_id){
        $number_of_product_in_stock  =  DB::select("SELECT SUM(Product_Count) AS TotalProduct FROM stock_in WHERE Product_ID='$product_id'");
        $number_of_product_out_stock =  DB::select("SELECT SUM(Product_Count) AS TotalProduct FROM stock_out WHERE Product_ID='$product_id'");
        $available_products = intval($number_of_product_in_stock['0']->TotalProduct, $base =10)- intval($number_of_product_out_stock['0']->TotalProduct, $base =10);   
        return $available_products;
    }

        static function updateProductInStock($stock_id,$product_id,$product_count,$order_number,$supplier_id,$order_date,$token){
        DB::table('stock_in')
                ->where('stock_ID', $stock_id)
                ->update([
                    'Product_ID'     => $product_id,
                    'Product_Count'  => $product_count,
                    'Order_No'       => $order_number,
                    'Supplier_ID'    => $supplier_id,
                    'Order_date'     => $order_date,
                    'remember_token' => $token,
        ]);
    }
    static function deleteStockIn($id){
        $delete_product = DB::table('stock_in')->where('stock_ID', $id)->delete();
       return $delete_product;
    }
    

}