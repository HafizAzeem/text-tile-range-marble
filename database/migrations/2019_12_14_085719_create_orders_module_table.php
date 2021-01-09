<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('vendor_id');
            $table->string('order_no')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('customer_po_no')->nullable();
            $table->date('order_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('shipment_date')->nullable();
            $table->integer('term')->nullable()->default(0);
            $table->string('status')->nullable();
            $table->longText('notes')->nullable();
            $table->string('currency')->nullable()->default('USD');
            $table->unsignedBigInteger('created_by');
            $table->string('maturity')->nullable();
            $table->double('sub_total', 8, 2)->nullable()->default(0);
            $table->double('com_total', 8, 2)->nullable()->default(0);
            $table->double('net_total', 8, 2)->nullable()->default(0);
            $table->longText('spcial_condition')->nullable();
            $table->timestamps();
        });
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('foreigner_id');
            $table->mediumText('description')->nullable();
            // $table->unsignedBigInteger('created_by');
            $table->integer('qty')->nullable()->default(0);
            $table->double('rate', 8, 2)->nullable()->default(0);
            $table->string('currency')->nullable()->default(0);
            $table->string('exchange_rate')->nullable()->default(0);
            $table->float('commission')->nullable()->default(0);
            $table->float('foreigner_commission')->nullable()->default(0);
            $table->double('sub_total', 8, 2)->nullable()->default(0);
            $table->double('com_total', 8, 2)->nullable()->default(0);
            $table->double('net_total', 8, 2)->nullable()->default(0);
            $table->string('packing')->nullable();
            $table->string('lc_days')->nullable();
            $table->string('piece_length')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
        Schema::create('order_timelines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->string('status')->nullable();
            $table->longText('notes')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
        Schema::create('order_revision', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('created_by');
            $table->longText('data');
            $table->string('action');
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
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('order_timelines');
        Schema::dropIfExists('order_revision');
    }
}
