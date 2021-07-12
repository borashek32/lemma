<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->enum('status', ['processing','completed'])->default('processing');
            $table->float('total', 10, 2);
            $table->integer('product_count');
            $table->boolean('is_paid')->default(false);
            $table->foreignId('payment_id')->unsigned();
            $table->foreignId('contact_id')->unsigned();
            $table->string('notes')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // shipment
            $table->enum('shipment_method')
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
        Schema::dropIfExists('orders');
    }
}
