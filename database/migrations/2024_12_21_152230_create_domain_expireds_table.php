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
        /* "Domain", "Length", "Backlinks", "Domain Pop", "Creation Date",
         "First Seen", "Crawl Results", "Global Rank", "TLD Registered",
         ".com", ".net", ".org", ".biz", ".info", ".de", "Date Scraping", "Add Date", "End Date",
         "Status" */
        Schema::create('domain_expireds', function (Blueprint $table) {
            $table->id();
            $table->string('domain_name');
            $table->integer('DA');
            $table->integer('PA');
            $table->integer('DR')->default(0);
            $table->integer('TF');
            $table->integer('CF');
            $table->integer('spam_rating');
            $table->integer('total_backlinks');
            $table->integer('referring_domains');
            $table->integer('external_links');
            $table->integer('internal_links');
            $table->string('add_date');
            $table->string('end_date');
            $table->integer('domain_age');
            $table->string('status');
            $table->string('tld_registered');   
            $table->string('crawl_results');
            $table->string('global_rank');
            $table->string('length');
            $table->string('com_tld');  
            $table->string('net_tld');  
            $table->string('org_tld'); 
            $table->string('biz_tld');  
            $table->string('info_tld'); 
            $table->string('de_tld');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domain_expireds');
    }
};
