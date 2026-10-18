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
        Schema::create('user_couriers', function (Blueprint $table) {
            $table->id();
            $table->integer('Tracking_id');
            $table->unsignedBigInteger('Agent_Id');
            $table->foreign('Agent_Id')->references('id')->on('agent_infos')->onDelete('cascade');
            $table->string('Sender_name');
            $table->string('Receiver_name');
            $table->string('Email')->unique();
            $table->bigInteger('Contact');
            $table->string('Product_images');
            $table->string('Weight_KG');
            $table->integer('Price');
            $table->string('Receiver_city');
            $table->integer('Delivery_charges');
            $table->string('Sender_address');
            $table->string('Receiver_address');
            $table->string('Order_date');
            $table->string('Total_price');
            $table->string('Status')->default('Pending');
            //$table->integer('Agent_Info_Id');
            //$table->string('Added_by');
            // $table->integer('Agent_Id');
            // $table->foreign('Agent_Id')->on('AgentInfo')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_couriers');
    }
};
