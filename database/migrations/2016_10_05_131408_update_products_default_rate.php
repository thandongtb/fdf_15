<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProductsDefaultRate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('rate_total', 5, 2)->default(0)->change();
            $table->integer('rate_count')->default(0)->change();
            $table->integer('view_count')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('rate_total', 5, 2)->nullable()->change();
            $table->integer('rate_count')->nullable()->change();
            $table->integer('view_count')->nullable()->change();
        });
    }
}
