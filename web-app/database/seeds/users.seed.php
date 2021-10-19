<?php

//users::createNew()
Class Users{

	public function __construct(){
		
	}

	public function createNew(){

		insertat('tbl_user', [

			'name'=>'Zwave Admin',
			'company_name'=>'Zwave Foundation',
			'email' =>'admin@gmail.com',
			'mobile_no' => '9999999999',
			'landline' => '9999999999',
			'company_description' => 'Zwave Foundation.tech is official website',
			'bd_id' => '10',
			'status' => 'enable',
			'assigned_no_count' => '5',
			'max_no_count' => '5',

		]); //insert into tbl_user values(name,company_name,email...) 

		$user_id = last_inserted_id('tbl_user');

		insertat('tbl_login', [

			'auth_id'=>'admin@gmail.com',
			'auth_pass'=>pass_encrypt('zwave@admin'),
			'role_id' =>'1',
			'user_id' => $user_id,

		]);

		return "Record Inserted";

	}
}