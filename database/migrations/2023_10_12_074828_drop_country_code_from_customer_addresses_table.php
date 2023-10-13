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
        Schema::table('customer_addresses', function (Blueprint $table) {
            Schema::table('customer_addresses', function (Blueprint $table) {
                $table->dropForeign(['country_code']);
                $table->dropColumn('country_code');
                $table->dropColumn('zipcode');
                $table->dropColumn('state');

            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_addresses', function (Blueprint $table) {
            $table->dropForeign(['country_code']);
            $table->dropColumn('country_code');
            $table->dropColumn('zipcode');
            $table->dropColumn('state');
        });
    }
};
