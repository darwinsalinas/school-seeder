<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hs_id');
            $table->unsignedBigInteger('director_id');
            $table->unsignedBigInteger('mec_id');
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('city_id');
            $table->string('name', 100);
            $table->string('postal', 10);
            $table->string('phone', 15);
            $table->string('password');
            $table->string('email')->unique();
            $table->string('email2')->unique();
            $table->string('website');
            $table->string('fax')->nullable();
            $table->string('address');
            $table->string('address_short', 100);
            $table->string('latitude', 30);
            $table->string('longitude', 30);
            $table->string('plan_preference', 30);
            $table->tinyInteger('leads');
            $table->string('business_status', 60);
            $table->tinyInteger('google_user_ratings_total');
            $table->string('google_rating', 3);
            $table->string('revisor', 100);
            $table->tinyInteger('active');
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
        Schema::dropIfExists('schools');
    }
};
