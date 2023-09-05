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
    Schema::create('employee_reg', function (Blueprint $table) {
        $table->id();
        $table->string('fname');
        $table->string('mname')->nullable();
        $table->string('lname');
        $table->string('adrs1');
        $table->string('adrs2')->nullable();
        $table->string('mobile');
        $table->string('city');
        $table->string('state');
        $table->string('zip');
        $table->string('gender');
        $table->string('usertype');
        $table->string('password');
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
        //
    }
};
