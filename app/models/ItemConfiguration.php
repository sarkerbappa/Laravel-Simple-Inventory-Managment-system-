<?php

class ItemConfiguration extends \Eloquent {
	protected $fillable = [];
        
      /*=========================================== category ======================================*/  
       
        //Add new Category
        static function addCategory($category_name,$category_description){
             
            DB::table('category')->insert(
                array(
                      'Category_Name'       => $category_name, 
                      'Category_Description' => $category_description,
                    )
               ); 
            }
        
       // Retrive all $category
        static function getAllCategories(){
            $category = DB::table('category')->get();
            return $category;   
           }//End of the getAll$category
           
      //Retrive Category by CategoryID
        static function getCategoryById($id){
           $category = DB::table('category')->where('Category_ID', $id)->first();
            return $category;
      }
      
      //Update Category by id
        static function UpdateCategory($category_id,$category_name,$category_description) {
            DB::table('category')
                    ->where('Category_ID', $category_id)
                    ->update([
                        'category_name' => $category_name,
                        'category_description' => $category_description,
            ]);
        }
        
        //Delete Category by id
        static function deleteCategoryById($id){
            $delete_category = DB::table('category')->where('Category_ID', $id)->delete();
            return $delete_category;
        }
        
        
  /*============================================== Brand ======================================*/
        
        //Add new Brand 
        static function addBrand($brand_name,$brand_description){
             
            DB::table('brand')->insert(
                array(
                      'Brand_Name'       => $brand_name, 
                      'Brand_Description' => $brand_description,
                    )
               ); 
            }
            
            // Retrive all Brands
        static function getAllBrands(){
            $brand = DB::table('brand')->get();
            return $brand;   
           }//End of the getAll$category
           
      //Retrive Brand 
        static function getBrandById($id){
           $brand = DB::table('brand')->where('Brand_ID', $id)->first();
            return $brand;
      }
      //Update Brand by id
        static function UpdateBrand($brand_id,$brand_name,$brand_description) {
            DB::table('brand')
                    ->where('Brand_ID', $brand_id)
                    ->update([
                        'Brand_Name' => $brand_name,
                        'Brand_Description' => $brand_description,
            ]);
        }
    //Delete Brand by id
        static function deleteBrandById($id){
            $delete_brand = DB::table('brand')->where('Brand_ID', $id)->delete();
            return $delete_brand;
        }
        
    /*============================================== Supplier ======================================*/
         //Add new Spplier
        static function addSupplier($supplier_name,$supplier_address){
             
            DB::table('supplier')->insert(
                array(
                      'Supplier_Name'       => $supplier_name, 
                      'Supplier_Address'    => $supplier_address,
                    )
               ); 
            }
            
            // Retrive all Supplier
        static function getAllSupplier(){
            $supplier = DB::table('supplier')->get();
            return $supplier;   
           }//End of the getAll$category
        
        //Retrive Supplier by ServiceID
        static function getSupplierById($id){
           $supplier = DB::table('supplier')->where('Supplier_ID', $id)->first();
            return $supplier;
      }
      
      //Update Supplier by id
        static function UpdateSupplier($supplier_id,$supplier_name,$supplier_address) {
            DB::table('supplier')
                    ->where('Supplier_ID', $supplier_id)
                    ->update([
                        'Supplier_Name' => $supplier_name,
                        'Supplier_Address' => $supplier_address,
            ]);
        }
        
        //Delete Supplier by id
        static function deleteSupplierId($id){
            $delete_supplier = DB::table('supplier')->where('Supplier_ID', $id)->delete();
            return $delete_supplier;
        }
        
        
       /*============================================== Product ======================================*/ 
        
        //Add new Spplier
        static function addProduct($product_name, $product_description,$cat_id,$brand_id){
             
            DB::table('products')->insert(
                array(
                      'Product_Name'           => $product_name, 
                      'Product_Description'    => $product_description,
                      'Category_ID'            => $cat_id,
                      'Brand_ID'               => $brand_id
                    )
               ); 
            }
            // Retrive all Supplier
        static function getAllProducts(){
            $products = DB::table('products')->get();
            return $products;   
           }//End of the getAlProducts
           
            //Retrive Supplier by ServiceID
        static function getProductById($id){
           $products = DB::table('products')->where('Product_Id', $id)->first();
            return $products;
         }
         
        static function editProductSave($product_id,$product_name, $product_description,$cat_id,$brand_id){
             DB::table('products')
                    ->where('Product_Id', $product_id)
                    ->update([
                      'Product_Name'           => $product_name, 
                      'Product_Description'    => $product_description,
                      'Category_ID'            => $cat_id,
                      'Brand_ID'               => $brand_id,
            ]);
         }
         
          //Delete product by id
        static function deleteProduct($id){
            $delete_product = DB::table('products')->where('Product_Id', $id)->delete();
            return $delete_product;
        }
        

        
      }
        
        