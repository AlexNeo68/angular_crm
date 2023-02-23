<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();

            $table->string('phone')->nullable();
            $table->string('link')->nullable();

            $table->integer('count_create')->default(1);

            $table->boolean('is_processed')->default(false);
            $table->boolean('isQualityLead')->default(false);
            $table->boolean('is_express_delivery')->default(false);
            $table->boolean('is_add_sale')->default(false);


            $table->bigInteger('source_id')->nullable()->unsigned();
            $table->foreign('source_id')->references('id')->on('sources');

            $table->bigInteger('unit_id')->nullable()->unsigned();
            $table->foreign('unit_id')->references('id')->on('units');

            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users');


            $table->bigInteger('status_id')->nullable()->unsigned();
            $table->foreign('status_id')->references('id')->on('statuses');


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
        Schema::dropIfExists('leads');
    }
};
