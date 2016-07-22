<?php

class StockOutController extends BaseController
{
    public function addProductStockOut()
    {
        $data = [
               'title'                  => 'Add products',
               'all_products'           => StockOut :: getAllProductsStockIn(),
               'all_products_stock_out' => StockOut :: getAllProductsStackOut(),
                ];

        return View::make('admin.pages.StockOut.stock_out_add_product')->with($data);
    }

    public function ProductSaveStockOut()
    {
        $validation_rule = [
            'product_id'          => ['required', 'max:35'],
            'product_count'       => ['required', 'integer'],
            'requisition_number'  => ['required', 'integer'],
            'requisition_by'      => ['required', 'max:300'],
            'recipient'           => ['required', 'max:300'],
        ];
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            return Redirect::to('/addProductStockOut')->withErrors($validation);
        } else {
            $product_id = Input::get('product_id');
            $product_count = Input::get('product_count');
            $requisition_number = Input::get('requisition_number');
            $requisition_by = Input::get('requisition_by');
            $recipient = Input::get('recipient');
            $token = Input::get('_token');
            $c_date = date('Y-m-d H:i:s');
            // Insert data into database
            $number_of_product_in_stock = StockIn::getProductNumberfromStockinByProductId($product_id);
            if ($number_of_product_in_stock < $product_count) {
                return Redirect::to('/addProductStockOut')->with('product_unavailable_error', $number_of_product_in_stock);
            } else {
                StockOut::addProductStockOut($product_id, $product_count, $requisition_number, $requisition_by, $recipient, $token, $c_date);

                return Redirect::to('/addProductStockOut')->with('add_success_massege', 'Product Added into stock out successfully.');
            }
        }
    }

    public function editStockOut($id)
    {
        $stock_out_data = StockOut::getProductFromStockOutById($id);
        $data = [
               'title'                  => 'Stock Out Edit',
               'all_products'           => ItemConfiguration :: getAllProducts(),
               'all_products_stock_out' => StockOut :: getAllProductsStackOut(),
               'edit_product_data'      => $stock_out_data,
                ];

        return View::make('admin.pages.StockOut.update_stock_out_form')->with($data);
    }

    public function ProductUpdateSaveStockOut($id)
    {
        $stock_out_id = Input::get('stock_out_id');
        $validation_rule = [
            'product_id'          => ['required', 'max:35'],
            'product_count'       => ['required', 'integer'],
            'requisition_number'  => ['required', 'integer'],
            'requisition_by'      => ['required', 'max:300'],
            'recipient'           => ['required', 'max:300'],
        ];
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            return Redirect::to('/editStockOut/'.$stock_out_id)->withErrors($validation);
        } else {
            $stock_out_id = Input::get('stock_out_id');
            $product_id = Input::get('product_id');
            $product_count = Input::get('product_count');
            $requisition_number = Input::get('requisition_number');
            $requisition_by = Input::get('requisition_by');
            $recipient = Input::get('recipient');
            $token = Input::get('_token');
            $c_date = date('Y-m-d H:i:s');
            // Insert data into database
            StockOut::updateProductStockOut($product_id, $product_count, $requisition_number, $requisition_by, $recipient, $token, $c_date, $stock_out_id);

            return Redirect::to('/addProductStockOut')->with('add_success_massege', 'Product Edited into stock out successfully.');
        }
    }

    public function deleteStockOut($id)
    {
        StockOut::deleteStockIn($id);

        return Redirect::to('/addProductStockOut')->with('add_success_massege', 'Product Deleted successfully.');
    }

    public function xlStockOut()
    {
        $data = StockOut :: getAllProductsStackOutExl();
        $data = array_map(function ($data) {
            return json_decode(json_encode($data), true);
        }, $data);
        Excel::create('Stock_Out_Product_List', function ($excel) use ($data) {
            $excel->sheet('Sheetname', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');
    }
}
