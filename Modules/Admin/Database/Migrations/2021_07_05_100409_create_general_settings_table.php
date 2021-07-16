<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable()->default('Maplandi');
            $table->longText('site_logo')->nullable()->default('vendor/images/logo/logo2.png');
            $table->text('site_motto')->nullable()->default('At Maplandi we pride ourselves in having everything you could possibly need for life and living at the best prices than anywhere else.');
            $table->string('site_cac')->nullable()->default('1023230');
            $table->longText('site_description')->nullable();
            $table->string('site_email')->nullable()->default('support@maplandi.com')->comment('only to be used for backend operations');
            $table->string('contact_number')->nullable()->default('+(123) 1800-567-8990');
            $table->longText('site_address')->nullable()->default('17, Freedom way, Ikate Lekki phase 1, Lagos, Nigeria.');
            $table->longText('opening_hours')->nullable();
            $table->string('facebook_handler')->nullable()->default('https://facebook.com/maplandi');
            $table->string('twitter_handler')->nullable()->default('https://twitter.com/maplandi');
            $table->string('linkedin_handler')->nullable()->default('https://linkedin.com/maplandi');
            $table->string('instagram_handler')->nullable()->default('https://instagram.com/maplandi');
            $table->string('default_currency')->nullable()->default(1);
            $table->string('tax')->comment('Tax in Percentage')->nullable()->default(0);
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
        Schema::dropIfExists('general_settings');
    }
}
