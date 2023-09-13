<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->integer('user_id');
            $table->string('to');
            $table->string('attn');
            $table->string('phone');
            $table->string('shipper');
            $table->text('shipper_address');
            $table->string('consigne')->nullable()->default(null);
            $table->string('consigne_address')->nullable()->default(null);
            $table->date('stuffin_date');
            $table->time('stuffin_time');
            $table->string('destination')->nullable()->default(null);
            $table->string('port_loading')->nullable()->default(null);
            $table->string('qty')->nullable()->default(null);
            $table->string('gross_weight')->nullable()->default(null);
            $table->string('net_weight')->nullable()->default(null);
            $table->string('measurement')->nullable()->default(null);
            $table->string('volume')->nullable()->default(null);
            $table->string('notify')->nullable()->default(null);
            $table->string('freight')->nullable()->default(null);
            $table->string('vessel')->nullable()->default(null);
            $table->string('stuffing_palace')->nullable()->default(null);
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
        Schema::dropIfExists('shippings');
    }
}
