<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->string('invoice', 30)->primary();
            $table->string('consignee');
            $table->text('address');
            $table->integer('user_id');
            $table->date('issued_date');
            $table->string('to');
            $table->string('mawb');
            $table->string('no')->nullable()->default(null);
            $table->string('mode')->nullable()->default(null);
            $table->string('vessel')->nullable()->default(null);
            $table->string('hbl')->nullable()->default(null);
            $table->string('gw')->nullable()->default(null);
            $table->string('etd_pol')->nullable()->default(null);
            $table->string('note')->nullable()->default(null);
            $table->string('grand_total')->nullable()->default(null);
            $table->string('validity')->nullable()->default(null);
            $table->timestamps();
            $table->index(["user_id"], 'user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
