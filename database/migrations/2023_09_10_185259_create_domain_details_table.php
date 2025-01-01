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
        Schema::create('domain_details', function (Blueprint $table) {
            $table->id('domain_id');
            $table->string('domain_name');
            $table->integer('len')->nullable();
            $table->integer('domain_category')->nullable();
            $table->integer('age')->nullable();
            $table->integer('da')->nullable();
            $table->integer('pa')->nullable();
            $table->integer('dr')->nullable();
            $table->integer('cf')->nullable();
            $table->integer('tf')->nullable();
            $table->integer('rd')->nullable();
            $table->integer('total_backlinks')->nullable();
            $table->integer('referring_domains')->nullable();
            $table->boolean('is_expired')->nullable();
            $table->integer('global_rank')->nullable();
            $table->integer('domain_google_rank')->nullable();
            $table->integer('domain_bing_rank')->nullable();
            $table->integer('domain_authority')->nullable();
            $table->integer('domain_audit')->nullable();
            $table->integer('domain_backlinks')->nullable();
            $table->string('domain_owner_details')->nullable();
            $table->date('domain_expiry')->nullable();
            $table->integer('spam_score')->nullable();
            $table->text('whois_record')->nullable();
            $table->boolean('is_google_penalty')->nullable();
            $table->boolean('is_previous_spammy_contents')->nullable();
            $table->boolean('is_detected_chinese')->nullable();
            $table->boolean('is_detected_japanese')->nullable();
            $table->boolean('is_porn_detected')->nullable();
            $table->boolean('is_gambling_domains')->nullable();
            $table->string('smm')->nullable();
            $table->string('pbn')->nullable();
            $table->date('domain_added_date')->nullable();
            $table->date('domain_updated_date')->nullable();
            $table->unsignedBigInteger('expiry_domain_statistics_id')->foreign('expiry_domain_statistics_id')
            ->references('id')
            ->on('expiry_domain_statistics')
            ->onDelete('cascade');
                    $table->timestamps();
                    $table->unique('domain_name');
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain_details');
    }
};