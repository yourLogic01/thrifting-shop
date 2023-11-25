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
            $table->string('reference');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->nullOnDelete();
            $table->string('supplier_name');
            $table->date('date');
            $table->integer('sub_total');
            $table->integer('paid_amount');
            $table->integer('due_amount');
            $table->integer('discount')->default(0);
            $table->enum('status', ['pending', 'completed']);
            $table->string('payment_status');
            $table->enum('payment_method', ['cash', 'transfer']);
            $table->text('note')->nullable();
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
