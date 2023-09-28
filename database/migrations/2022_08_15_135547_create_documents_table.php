<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('job');
            $table->string('customer');
            $table->string('shipper');
            $table->string('consignee');
            $table->string('pod');
            $table->string('country')->nullable()->default(null);
            $table->string('freight')->nullable()->default(null);
            $table->dateTime('stuffin')->nullable()->default(null);
            $table->dateTime('etd')->nullable()->default(null);
            $table->dateTime('emk')->nullable()->default(null);
            $table->dateTime('carrier')->nullable()->default(null);
            $table->dateTime('no_bl')->nullable()->default(null);
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
        Schema::dropIfExists('documents');
    }
}
