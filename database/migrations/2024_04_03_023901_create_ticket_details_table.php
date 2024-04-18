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
        Schema::create('ticket_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ticket_header_id');
            // $table->foreign('ticket_header_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->bigInteger('tiket_category');
            // $table->foreign('tiket_category')->references('id')->on('ticket_categories')->onDelete('cascade');
            $table->integer('total_ticket');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_details');
    }
};
