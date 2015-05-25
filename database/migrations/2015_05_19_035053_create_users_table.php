<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	 public function up()
	{
		Schema::create('users',  function(Blueprint $t)
		{
			$t->increments('id');
			$t->string('status')->default('');
			$t->string('auth_provider')->default(''); //認証プロバイダ '':self, vietjonews,facebook,twitter...
			$t->string('role'); //権限(admin,user)
			$t->string('username'); //基本、メールアドレス
			$t->string('password')->nullable();
			$t->string('remember_token', 100)->nullable();
			$t->string('email');  //
			$t->string('name');
			$t->softDeletes();
			$t->timestamps();
			$t->unique('username');
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}