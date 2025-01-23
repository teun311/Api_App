<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('tracking_no')->unique();
            $table->date('order_date');
            $table->date('due_date');
            $table->string('reference')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('discount')->default(0);
            $table->double('total');
            $table->tinyInteger('order_status')->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
