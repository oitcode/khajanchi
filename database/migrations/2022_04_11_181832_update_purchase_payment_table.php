<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePurchasePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_payment', function (Blueprint $table) {
            $table->softDeletes();
            $table->string('delete_reason')->after('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_payment', function (Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropColumn('delete_reason');
        });
    }
}