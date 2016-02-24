
<?php

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->delete();

        User::create(array(
            'first_name'    => 'Bappa',
            'last_name'     => 'Sarker',
            'username'      => 'admin',
            'email'         => 'admin@mds.com',
            'password'      => Hash::make('123456'),
            'profile_image' =>'Tulips.jpg',
            'address'       => 'Mirpur 10'
            ));
    }

}

