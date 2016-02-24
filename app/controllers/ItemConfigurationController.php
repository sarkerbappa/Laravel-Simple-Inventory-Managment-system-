<?php

class ItemConfigurationController extends BaseController {
    /* ======================================== Category  ============================================ */

    public function addCategory() {
        $all_category = ItemConfiguration ::getAllCategories();
        return View::make('admin.pages.ItemConfiguration.add_list_category')->with(array('title' => 'Category List', 'allcategory' => $all_category));
    }

    public function categorySave() {
        $validation_rule = array(
            'category_name' => array('required', 'max:100'),
            'category_description' => array('required', 'max:500'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            return Redirect::to('/addCategory')->withErrors($validation);
        } else {
            $category_name = Input::get('category_name');
            $category_description = Input::get('category_description');
            // Insert data into database      
            ItemConfiguration::addCategory($category_name, $category_description);
            return Redirect::to('/addCategory')->with('add_success_massege', 'New Category Added successfully.');
        }
    }

    //Category Edite Form
    public function editCategory($id) {
        $categoryData = ItemConfiguration::getCategoryById($id);
        return View::make('admin.pages.ItemConfiguration.update_category_form')->with(array('title' => 'Category', 'category' => $categoryData));
    }

    //Save category Update  data
    public function categoryUpdateSave() {

        $validation_rule = array(
            'category_name' => array('required', 'max:100'),
            'category_description' => array('required', 'max:500'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            $cat_id = Input::get('category_id');
            return Redirect::to('/editCategory/' . $cat_id)->withErrors($validation);
        } else {
            $category_name = Input::get('category_name');
            $category_description = Input::get('category_description');
            $category_id = Input::get('category_id');
            // Insert data into database      
            ItemConfiguration::UpdateCategory($category_id, $category_name, $category_description);
            return Redirect::to('/addCategory')->with('add_success_massege', 'Category Updated successfully.');
        }
    }

    // Function for delete category

    public function deleteCategory($id = '') {
        ItemConfiguration:: deleteCategoryById($id);
        return Redirect::to('/addCategory')->with('add_success_massege', 'Category Deleted successfully.');
    }

    /* ===================================================== Brand ====================================== */

    public function addBrand() {
        $all_brands = ItemConfiguration ::getAllBrands();
        return View::make('admin.pages.ItemConfiguration.add_list_brand')->with(array('title' => 'Brand List', 'allbrand' => $all_brands));
    }

//Save Brand data
    public function brandSave() {
        $validation_rule = array(
            'brand_name' => array('required', 'max:100'),
            'brand_description' => array('required', 'max:500'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            return Redirect::to('/addBrand')->withErrors($validation);
        } else {
            $brand_name = Input::get('brand_name');
            $brand_description = Input::get('brand_description');
            // Insert data into database      
            ItemConfiguration::addBrand($brand_name, $brand_description);
            return Redirect::to('/addBrand')->with('add_success_massege', 'New Brand Added successfully.');
        }
    }

    //Brand Edite Form
    public function editBrand($id) {
        $brandData = ItemConfiguration::getBrandById($id);
        return View::make('admin.pages.ItemConfiguration.update_brand_form')->with(array('title' => 'Brand', 'brand' => $brandData));
    }

    //Save Brand Update  data
    public function brandUpdateSave() {

        $validation_rule = array(
            'brand_name' => array('required', 'max:100'),
            'brand_description' => array('required', 'max:500'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            $brand_id = Input::get('brand_id');
            return Redirect::to('/editBrand/' . $brand_id)->withErrors($validation);
        } else {
            $brand_name = Input::get('brand_name');
            $brand_description = Input::get('brand_description');
            $brand_id = Input::get('brand_id');
            // Insert data into database      
            ItemConfiguration::UpdateBrand($brand_id, $brand_name, $brand_description);
            return Redirect::to('/addBrand')->with('add_success_massege', 'Brand Updated successfully.');
        }
    }

    // Function for delete Brand
    public function deleteBrand($id = '') {
        ItemConfiguration:: deleteBrandById($id);
        return Redirect::to('/addBrand')->with('add_success_massege', 'Brand Deleted successfully.');
    }

    /* ============================================= Supplier ======================================== */

    public function addSupplier() {
        $all_supplier = ItemConfiguration ::getAllSupplier();
        return View::make('admin.pages.ItemConfiguration.add_list_supplier')->with(array('title' => 'Supplier List', 'allsupplier' => $all_supplier));
    }

    //Save  Supplier
    public function supplierSave() {
        $validation_rule = array(
            'supplier_name' => array('required', 'max:100'),
            'supplier_address' => array('required', 'max:500'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            return Redirect::to('/addSupplier')->withErrors($validation);
        } else {
            $supplier_name = Input::get('supplier_name');
            $supplier_address = Input::get('supplier_address');
            // Insert data into database      
            ItemConfiguration::addSupplier($supplier_name, $supplier_address);
            return Redirect::to('/addSupplier')->with('add_success_massege', 'New Supplier Added successfully.');
        }
    }

    //Supplier Edite Form
    public function editSupplier($id) {
        $supplierData = ItemConfiguration::getSupplierById($id);
        return View::make('admin.pages.ItemConfiguration.update_supplier_form')->with(array('title' => 'Supplier', 'supplier' => $supplierData));
    }

    //Save Supplier Update  data
    public function supplierUpdateSave() {

        $validation_rule = array(
            'supplier_name'    => array('required', 'max:100'),
            'supplier_address' => array('required', 'max:500'),
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            $supplier_id = Input::get('Supplier_ID');
            return Redirect::to('/editSupplier/' . $supplier_id)->withErrors($validation);
        } else {
            $supplier_id      = Input::get('Supplier_ID');
            $supplier_name    = Input::get('supplier_name');
            $supplier_address = Input::get('supplier_address');
            // Insert data into database      
            ItemConfiguration::UpdateSupplier($supplier_id, $supplier_name, $supplier_address);
            return Redirect::to('/addSupplier')->with('add_success_massege', 'Supplier  Updated successfully.');
        }
    }
    
    // Function for delete Brand
    public function deleteSupplier($id=''){
        ItemConfiguration:: deleteSupplierId($id);
        return Redirect::to('/addSupplier')->with('add_success_massege', 'Supplier Deleted successfully.');        
    }
    
    /* ============================================= Products ======================================== */

   //Add New Product 
    public function addProducts() {
        $data = array(
               'title'        => 'Add products',
               'all_products' => ItemConfiguration :: getAllProducts(),
               'all_brands'   => ItemConfiguration :: getAllBrands(),
               'all_category' => ItemConfiguration :: getAllCategories(),
                );
        return View::make('admin.pages.ItemConfiguration.add_list_products')->with($data);
    }
    
      //Save  Supplier
    public function ProductSave() {
        $validation_rule = array(
            'product_name'        => array('required', 'max:100'),
            'product_description' => array('required', 'max:500'),
            'cat_id'              => array('required'),
            'brand_id'            => array('required')
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            return Redirect::to('/addProducts')->withErrors($validation);
        } else {
            $product_name        = Input::get('product_name');
            $product_description = Input::get('product_description');
            $cat_id              = Input::get('cat_id');
            $brand_id            = Input::get('brand_id');
            
            // Insert data into database      
            ItemConfiguration::addProduct($product_name, $product_description,$cat_id,$brand_id);
            return Redirect::to('/addProducts')->with('add_success_massege', 'New Product Added successfully.');
        }  
    }
    
    
      //Product Edite Form
    public function  editProduct($id) {
        $data = array(
               'title'        => 'Edit products',
               'all_products' => ItemConfiguration :: getAllProducts(),
               'all_brands'   => ItemConfiguration :: getAllBrands(),
               'all_category' => ItemConfiguration :: getAllCategories(),
               'productData'  => ItemConfiguration::getProductById($id)
                );
        return View::make('admin.pages.ItemConfiguration.update_ products_form')->with($data);
    }
    
    // Product update save
    public function ProductUpdateSave(){
        $validation_rule = array(
            'product_name'        => array('required', 'max:100'),
            'product_description' => array('required', 'max:500'),
            'cat_id'              => array('required'),
            'brand_id'            => array('required')
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        if ($validation->fails()) {
            // If validation failed then returned to the serviseForm with error massege
            $product_id = Input::get('Product_id');
            return Redirect::to('/editProduct/'.$product_id)->withErrors($validation);
        } else {
            $product_name        = Input::get('product_name');
            $product_description = Input::get('product_description');
            $cat_id              = Input::get('cat_id');
            $brand_id            = Input::get('brand_id');
            
            // Insert data into database  
            $product_id = Input::get('Product_id');
            ItemConfiguration::editProductSave($product_id,$product_name, $product_description,$cat_id,$brand_id);
            return Redirect::to('/addProducts')->with('add_success_massege', 'Product Edited successfully.');
        }  
    }
    
     // Function for delete Product
    public function deleteProduct($id=''){
        ItemConfiguration:: deleteProduct($id);
        return Redirect::to('/addProducts')->with('add_success_massege', 'Product Deleted successfully.');        
    }
    
}
