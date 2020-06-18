<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticket_code')->unique();
            $table->string('description');
            $table->integer('ttr');
            $table->string('compliance', 1)->default('N');
            $table->string('escalate', 1)->default('N');
            $table->string('created_by');
            $table->string('deleted')->default('N');
            $table->string('system_defined')->default('N');
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
        Schema::dropIfExists('ticket_types');
    }
}
