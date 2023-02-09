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
        Schema::create('sales_person_customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sales_person_id')->constrained('sales_people')->onDelete('cascade');
            $table->foreignId('customer_company_id')->constrained('customer_companies')->onDelete('cascade');
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
        Schema::dropIfExists('sales_person_customers');
    }
};
