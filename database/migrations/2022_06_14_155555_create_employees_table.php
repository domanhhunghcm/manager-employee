<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("last_name");
            $table->string("first_name");
            $table->string("middle_name")->nullable();
            $table->string("address");
            $table->foreignId('department_id')->nullable()->constrained('departments')->onDelete('set null');
            // $table->bigInteger('department_id'); // 追加部分
            // $table->foreign('department_id')->references('id')->on('departments'); // 追加部分
            // $table->bigInteger('user_id'); // 追加部分
            // $table->foreign('user_id')->references('id')->on('users'); // 追加部分
            // $table->bigInteger('country_id'); // 追加部分
            // $table->foreign('country_id')->references('id')->on('countries'); // 追加部分
            // $table->bigInteger('state_id'); // 追加部分
            // $table->foreign('state_id')->references('id')->on('states'); // 追加部分
            // $table->bigInteger('city_id'); // 追加部分
            // $table->foreign('city_id')->references('id')->on('cities');

            $table->char("zip_code");
            $table->date("birthdate")->nullable();
            $table->date("date_hired")->nullable();
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
        Schema::dropIfExists('employees');
    }
};
