<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Location;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('description');
            $table->foreignIdFor(Location::class);
            $table->string('address');
            $table->string('price');
            $table->foreignIdFor(Category::class);
            $table->string('property_type');
            $table->string('bed_room')->nullable();
            $table->string('bath_room')->nullable();
            $table->string('kitchen')->nullable();
            $table->enum('status', ['instock','outofstock']);
            $table->string('landlord_name')->nullable();
            $table->string('landlord_phone')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('agent_phone')->nullable();
            $table->string('main_image')->nullable();

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
        Schema::dropIfExists('properties');
    }
};
