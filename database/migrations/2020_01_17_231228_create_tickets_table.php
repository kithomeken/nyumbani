<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('summary');
            $table->string('type');
            $table->string('status');
            $table->string('sla_status');
            $table->string('priority');
            $table->string('region_id');
            $table->string('created_by');
            $table->string('assigned_to')->nullable();
            $table->string('serial_no')->nullable();
            $table->date('scheduled_to')->nullable();
            $table->string('delete_by')->nullable();
            $table->date('delete_at')->nullable();
            $table->text('content');
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
        Schema::dropIfExists('tickets');
    }
}
