
<?php
class UsersController extends BaseController {
    
    // Admin Dashboard Function Function
    public function adminDashboard() {
        $data = array(
               'title'                  => 'AdminDashboard',
               'dashboard_product_list' => Report::RestProductInStock()
                );
        return View::make('admin_dashboard')->with($data);
    }

    //Admin Login Form Function
    public function adminLoginForm() {
        return View::make('admin.pages.admin_login_form')->with('title', 'Login Form');
    }
    
    //Login Check Function
    public function adminLoginCheck() {
        $validation_rule = array(
            'username' => array('required', 'min:5', 'max:50'),
            'password' => array('required', 'min:6', 'max:50')
        );
        $validation = Validator::make(Input::all(), $validation_rule);
        // Validation Check
        if ($validation->fails()) {
            return Redirect::to('/')->withErrors($validation);
        } // After Validation Authentication start
        else {
            $athentication = Auth::attempt(array('username' => Input :: get('username'), 'password' => Input :: get('password')));
            // When Authentication True
            if ($athentication) { 
                $rememberme = Input::get('remember');
                if(!empty($rememberme)){
                    //Remember Login data
                   Auth::loginUsingId(Auth::user()->id,true);
                }
                //Redrict to the Target page
                return Redirect::intended('adminDashboard');
            } else {
                //Redrict Login Form with Authentication error massege.
                return Redirect::to('/')->with('authentication_error', 'Username or Password is not valid!');
            }
        }
    }// End adminLogin Check
    
    
   // Admin Log out Function
    public function getLogOut() {
          Auth::logout();
          return Redirect::route('admin');
    }
  
    //User Profile Edite Form
    public function updateUserProfileForm() {
        return View::make('admin.pages.update_user_profile_form')->with('title', 'Update User Profile');
    }

    //Submit User Data into database
    public function updateUserProfile() {
        $validation_rule = array(
            'first_name' => array('required', 'max:32'),
            'last_name'  => array('required', 'max:32'),
            'email'      => array('required', 'email', 'max:32'),
            'password'   => array('min:6', 'max:64'),
            'address'    => array('required', 'max:50')
        );
        $validation = Validator::make(Input::all(), $validation_rule);

        if ($validation->fails()) {
            // if validation failed then returned to the update form with error massege
            return Redirect::to('/updateUserProfileForm')->withErrors($validation);
        } else { 
                 //When validation Passed 
                 //Start Image validation 
                 if(Input::hasFile('image')){
                        $input = array('image' => Input::file('image'));
                        $rules = array(
                            'image' => 'image'
                         );
                        $validator = Validator::make($input, $rules);
                             if ($validator->fails()){
                                 return Redirect::to('/updateUserProfileForm')->with('image_validation_error', 'Image file is not valid !');
                                }else{
                                    //Upload the image and get the image file name. 
                                    $image = Input::file('image');
	                            $destinationPath = 'public/uploads/profile';
                                    $filename = $image->getClientOriginalName();
                                    Input::file('image')->move($destinationPath, $filename);
                                }
                }else {
                    // Get the old image name
                    $filename = Auth::user()->profile_image;
                    
                } //End of the Image validation else
     // Input Form Data into database
                
                
                if (Input :: get('password') != '') {
                DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->update([
                            'first_name' => Input :: get('first_name'),
                            'last_name' => Input :: get('last_name'),
                            'email' => Input :: get('email'),
                            'password' => Hash :: make(Input :: get('password')),
                            'profile_image' => $filename,
                            'address' => Input :: get('address')
                ]);
                }  else {
                     DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->update([
                            'first_name' => Input :: get('first_name'),
                            'last_name' => Input :: get('last_name'),
                            'email' => Input :: get('email'),
                            'profile_image' => $filename,
                            'address' => Input :: get('address')
                ]);
                }

            //Redrict to the update form with success massege.  
   return Redirect::to('/updateUserProfileForm')->with('update_success_massege', 'User profile has been updated successfully.');
        }//End of the Validation else
   }//End of the Update User Profile Function
  
}