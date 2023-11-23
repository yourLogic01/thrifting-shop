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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->default('RP')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->date('date');
            $table->enum('status', ['pending', 'ordered', 'completed']);
            $table->enum('payment_method', ['cash', 'transfer']);
            $table->integer('paid_amount');
            $table->text('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
