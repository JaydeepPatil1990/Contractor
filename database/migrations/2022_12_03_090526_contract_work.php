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
        Schema::create('contract_works', function (Blueprint $table) {
            $table->id();
            $table->integer('contractor_id');
            $table->integer('road_type_id');
            $table->string('contract_no')->unique();
            $table->string('short_description', 100);
            $table->longText('long_description', 1000);
            $table->date('start_date')->format('Y-m-d');
            $table->date('end_date')->format('Y-m-d');
            $table->double('contract_amount',10,3);
            $table->decimal('penalty',4,2)->default('2.0');
            $table->decimal('warranty',4,2)->default('2.0') ->comment('warranty in yeras');
            $table->string('location');
            $table->string('address_line_1');
            $table->string('address_line_2');
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->timestamps();
            $table->integer('status')->default(0)->comment('0-Not Deleted | 1-Deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_works');
    }
};
