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
    Schema::create('roles', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->timestamps();
    });
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedBigInteger('role_id');
      $table->string('name');
      $table->string('dni')->unique();
      $table->string('email')->unique();
      $table->timestamp('email_verified_at')->nullable();
      $table->string('password');
      $table->tinyInteger('active')->default(0);
      $table->rememberToken();
      $table->timestamps();
    });
    Schema::create('campaing_types', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->timestamps();
    });
    Schema::create('campaings', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedBigInteger('campaing_type_id');
      $table->string('name');
      $table->string('callzi_id');
      $table->timestamps();
    });
    Schema::create('restaurants', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->timestamps();
    });
    Schema::create('services', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->timestamps();
    });
    Schema::create('point_sales', function (Blueprint $table) {
      $table->increments('id');
      $table->string('code');
      $table->string('name');
      $table->string('address');
      $table->string('city');
      $table->unsignedBigInteger('service_id')->nullable();
      $table->unsignedBigInteger('restaurant_id')->nullable();
      $table->tinyInteger('costumer_service');
      $table->tinyInteger('owner_delivery');
      $table->tinyInteger('platform_delivery');
      $table->tinyInteger('breakfast_sale');
      $table->timestamps();
    });
    Schema::create('point_sale_campaings', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedBigInteger('campaing_id')->nullable();
      $table->unsignedBigInteger('point_sale_id')->nullable();
      $table->unsignedBigInteger('campaing_type_id')->nullable();
      $table->tinyInteger('feedback');
      $table->timestamps();
    });
    Schema::create('orders', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedBigInteger('point_sale_id')->nullable();
      $table->unsignedBigInteger('user_id')->nullable();
      $table->string('ticket')->unique();
      $table->string('customer', 200)->nullable();
      $table->string('amount')->nullable();
      $table->string('phone')->nullable();
      $table->string('phone_2')->nullable();
      $table->dateTime('siesa_date')->nullable();
      $table->dateTime('schedule_date')->nullable();
      $table->dateTime('cooked_at')->nullable();
      $table->dateTime('delivered_at')->nullable();
      $table->dateTime('feedback_at')->nullable();
      $table->timestamps();
    });
    Schema::create('calls', function (Blueprint $table) {
      $table->increments('id');
      $table->unsignedBigInteger('order_id')->nullable();
      $table->unsignedBigInteger('campaing_id')->nullable();
      $table->string('phone');
      $table->string('callzi_id');
      $table->string('callzi_status');
      $table->integer('attempts');
      $table->integer('order');
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
    Schema::dropIfExists('roles');
    Schema::dropIfExists('users');
    Schema::dropIfExists('campaing_types');
    Schema::dropIfExists('campaings');
    Schema::dropIfExists('point_sales');
    Schema::dropIfExists('point_sale_campaings');
    Schema::dropIfExists('orders');
    Schema::dropIfExists('calls');
  }
}
