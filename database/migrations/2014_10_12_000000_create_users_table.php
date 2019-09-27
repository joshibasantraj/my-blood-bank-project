<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->enum('role',['admin','donor'])->default('donor');
            $table->enum('gender',['male','female'])->default('male');
            $table->enum('blood_group',['a+','a-','ab+','ab-','b+','b-','o+','o-']);
            $table->string('address')->nullable();
            $table->string('mobile');
            $table->integer('age')->length(3)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
            $table->string('password');
            $table->string('image')->default('default.jpg');
            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('SET NULL');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
