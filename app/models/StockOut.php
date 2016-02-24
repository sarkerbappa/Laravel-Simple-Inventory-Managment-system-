<?php
class StockOut extends \Eloquent {
	protected $fillable = [];
        
        static function addProductStockOut($product_id,$product_count,$requisition_number,$requisition_by,$recipient,$token,$c_date) {
        DB::table('stock_out')->insert(
                array(
                    'Product_ID'          => $product_id,
                    'Product_Count'       => $product_count,
                    'Requisition_No'      => $requisition_number,
                    'Requisition_By'      => $requisition_by,
                    'Recipient'           => $recipient,
                    'remember_token'      => $token,
                    'created_at'          => $c_date,
                )
        );
    }
    
    static function getAllProductsStockIn(){
      $products = DB::select('SELECT Product_ID,Product_Name from ( SELECT X.Product_ID,X.Product_Name,X.Count_StockIN,IFNULL(Y.Count_StockOut,0) Count_StockOut,(X.Count_StockIN-IFNULL(Y.Count_StockOut,0)) Balance FROM ( SELECT M.product_ID,M.Product_Name, SUM(Product_Count) AS Count_StockIN from (SELECT A.*,B.Product_Name FROM `stock_in` A, `products` B where A.Product_ID=B.Product_ID )M group by Product_ID,Product_Name ) X LEFT JOIN ( SELECT product_ID, SUM(Product_Count) AS Count_StockOUT from `stock_out`group by Product_ID ) Y On X.Product_ID=Y.Product_ID )Z WHERE Balance<>0');
            return $products;   
           }//End of the getAlProducts
    
    static function getAllProductsStackOutExl() {
        $all_products_from_stock_out = DB::table('stock_out')->select('Product_ID', 'Product_Count as Number_of_Products','Requisition_No','Requisition_By','Recipient')->get();
        return $all_products_from_stock_out;
    }
    
    static function getAllProductsStackOut() {
        $all_products_from_stock_out = DB::table('stock_out')->get();
        return $all_products_from_stock_out;
    }
    
    static function getProductFromStockOutById($id) {
        $stock_out_product_by_id = DB::table('stock_out')->where('stock_out_id', $id)->first();
        return $stock_out_product_by_id;
    }
    
    static function updateProductStockOut($product_id,$product_count,$requisition_number,$requisition_by,$recipient,$token,$c_date,$stock_out_id){
        DB::table('stock_out')
                ->where('stock_out_id', $stock_out_id)
                ->update([
                    'Product_ID'          => $product_id,
                    'Product_Count'       => $product_count,
                    'Requisition_No'      => $requisition_number,
                    'Requisition_By'      => $requisition_by,
                    'Recipient'           => $recipient,
                    'remember_token'      => $token,
                    'updated_at'          => $c_date,
        ]);
    }
    static function deleteStockIn($id){
        $delete_product = DB::table('stock_out')->where('stock_out_id', $id)->delete();
       return $delete_product;
    }

}