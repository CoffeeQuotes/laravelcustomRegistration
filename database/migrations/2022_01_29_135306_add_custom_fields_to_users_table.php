<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCustomFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->renameColumn('name', 'first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->bigInteger('contact_number');
            $table->enum('martial_status',['Single','Married','Widowed','Divorced']);
            $table->date('date_of_birth');
            $table->date('date_of_anniversary')->nullable();
            $table->date('date_of_joining');
            $table->string('personal_email_address');
            $table->enum('role', ['Admin','Customers','Account Manager']);
            $table->enum('department', ['Information Techonology','Finance','Marketing','Human Resource','Legal Department']);
            $table->enum('designation', ['Director','CEO','COO','CFO','CTO','CMO','CLO','Manager', 'Employee']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->renameColumn('first_name','name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('contact_number');
            $table->dropColumn('martial_status');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('date_of_anniversary');
            $table->dropColumn('date_of_joining');
            $table->dropColumn('personal_email_address');
            $table->dropColumn('role');
            $table->dropColumn('department');
            $table->dropColumn('designation');

        });
    }
}
