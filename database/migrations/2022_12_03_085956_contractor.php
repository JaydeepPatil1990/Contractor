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
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->integer('company_type_id');
            $table->string('contact_person_name');
            $table->integer('contact_number'); //
            $table->string('email')->unique();
            $table->integer('created_by')->nullable();
            $table->timestamps();
            $table->integer('status')->default(0)
                ->nullable()
                ->comment('0-Active | 1-inactive');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contractors');
    }
};
