<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemParamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_params', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('SYS_APP_NAME')->nullable();            
            $table->string('SYS_APP_URL')->nullable();
            $table->string('SYS_APP_COMPANY')->nullable();
            $table->string('SYS_SMTP_SERVER')->nullable();
            $table->string('SYS_SMTP_USERNAME')->nullable();
            $table->string('SYS_SMTP_PASSWORD')->nullable();
            $table->integer('SYS_TTR_MIN')->nullable(); // Time to Resolution Min
            $table->integer('SYS_TTR_MAX')->nullable(); // Time to Resolution Max
            $table->integer('SYS_WEEK_START')->nullable(); // set the start day of the week when a user is allowed to access the sys­tem
            $table->integer('SYS_WEEK_END')->nullable(); // enables to set the last day of the week when a user can have access to the system
            $table->integer('SYS_DAY_START')->nullable(); // lower limit time in day for a user to be able to work in the System
            $table->integer('SYS_DAY_END')->nullable(); // upper limit time in day for a user to be able to work in the System
            $table->integer('SYS_PWD_LENGTH_MIN')->nullable(); // set the minimum length of pass­word string that is required.
            $table->string('SYS_PWD_NBR_REQ', 1)->default('Y'); // password with at least one numeric character
            $table->string('SYS_PWD_SPE­CIAL_CHAR_REQ', 1)->default('Y'); // allow special characters like ‘$’, ‘#’, ‘@’, in 
            $table->string('SYS_PWD_UP­PER_CHAR_REQ', 1)->default('Y'); // allow at least one upper case char­acter in password strings
            $table->string('SYS_PWD_LOWER_CHAR_REQ', 1)->default('Y'); // allow at least one lower case char­acter in password strings
            $table->integer('SYS_PWD_CHANGE_­DAYS_ACTUAL')->nullable(); // set the maximum number of days after which system will force a password change
            $table->integer('SYS_FAILED_LOGIN_TRI­ALS_MAX')->nullable(); // specify the maximum number of login trials allowed before disabling the User ID due to security reasons
            $table->integer('SYS_INACTIVITY_DAYS_­MAX')->nullable(); //used to specify the maximum number of days the User ID can be without utiliza­tion before disabling the User ID due to security reasons
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
        Schema::dropIfExists('system_params');
    }
}
