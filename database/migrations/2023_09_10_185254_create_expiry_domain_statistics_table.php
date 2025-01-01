<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('expiry_domain_cronjob', function (Blueprint $table) {
            $table->id();
            $table->integer('total_domain');
            $table->integer('cronjob');
            $table->boolean('is_successful');
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
        Schema::dropIfExists('expiry_domain_statistics');
    }
};
