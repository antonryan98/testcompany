<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    
    protected $table = 'users';
    public function getData()
    {
    	return [ 
        ['name'=>'Admin','email'=>'admin@admin.com','password'=>Hash::make('password')]
    	];	
    }
    


    public function run()
    {
    	if(!isset($this->table)){
			throw new Exception('No table specified');
		}

		if(!method_exists(get_class(),'getData')) {
			throw new Exception('No data specified');
		}


		DB::table($this->table)->truncate();
		DB::table($this->table)->insert($this->getData());
            
    }

    
}
