<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Location;
use App\Models\Category;
use App\Models\PriceRange;

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
            $table->string('address')->nullable();
            $table->string('price');
            $table->foreignIdFor(PriceRange::class);
            $table->foreignIdFor(Category::class);
            $table->string('property_type');
            $table->string('status');
            $table->string('landlord_name')->nullable();
            $table->string('landlord_phone')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('agent_phone')->nullable();
            $table->string('main_image');

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
