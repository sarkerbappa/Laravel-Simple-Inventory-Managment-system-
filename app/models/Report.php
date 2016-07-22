<?php

class Report extends \Eloquent
{
    protected $fillable = [];

    public static function RestProductInStock()
    {
        $rest_products = DB::select('SELECT X.Product_ID,X.Product_Name,X.Count_StockIN,IFNULL(Y.Count_StockOut,0) Count_StockOut,(X.Count_StockIN-IFNULL(Y.Count_StockOut,0)) Balance FROM ( SELECT M.product_ID,M.Product_Name, SUM(Product_Count) AS Count_StockIN from (SELECT A.*,B.Product_Name FROM `stock_in` A, `products` B where A.Product_ID=B.Product_ID )M group by Product_ID,Product_Name ) X LEFT JOIN ( SELECT product_ID, SUM(Product_Count) AS Count_StockOUT from `stock_out`group by Product_ID ) Y On X.Product_ID=Y.Product_ID');

        return $rest_products;
    }

    public static function generalStockReport()
    {
        $general_product_report = DB::select('SELECT X.Product_ID,X.Product_Name,X.Product_Description,X.Count_StockIN,IFNULL(Y.Count_StockOut,0) Count_StockOut,(X.Count_StockIN-IFNULL(Y.Count_StockOut,0)) Balance FROM ( SELECT M.product_ID,M.Product_Name,M.Product_Description, SUM(Product_Count) AS Count_StockIN from (SELECT A.*,B.Product_Name,B.Product_Description FROM `stock_in` A, `products` B where A.Product_ID=B.Product_ID )M group by Product_ID,Product_Name,M.Product_Description ) X LEFT JOIN ( SELECT product_ID, SUM(Product_Count) AS Count_StockOUT from `stock_out`group by Product_ID ) Y On X.Product_ID=Y.Product_ID');

        return $general_product_report;
    }

    public static function searchProductInStock($product_id)
    {
        $search_stock_in = DB::table('products')->where('Product_Id', '=', $product_id)->get();

        return $search_stock_in;
    }

    public static function productWiseStockInReport()
    {
    }
}
