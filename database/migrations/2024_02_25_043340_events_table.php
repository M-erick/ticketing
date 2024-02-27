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
        Schema::create('events',function(Blueprint $table){
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->decimal('vip_ticket_price', 8, 2);
            $table->decimal('regular_ticket_price', 8, 2);
            $table->integer('max_attendees');

            // adding image 
            $table->string('image_path')->nullable(); 
            $table->timestamps();


        });
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
