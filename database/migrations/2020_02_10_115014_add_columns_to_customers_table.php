<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('identity_card')->nullable()->after('status');
            $table->string('commerical_register')->nullable()->after('identity_card');
            $table->string('undertaking')->nullable()->after('commerical_register');
            $table->integer('company')->default(0)->nullable()->after('undertaking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['identity_card', 'commerical_register', 'undertaking', 'company']);
        });
    }
}
