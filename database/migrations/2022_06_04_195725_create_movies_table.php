<?php

use App\Models\Distributor;
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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->enum('status_id', [0, 1, 2, 3]);
            $table->foreignIdFor(Distributor::class);
            $table->string('roe');
            $table->string('national_title');
            $table->string('original_title');
            $table->string('url_trailer');
            $table->string('synopsis');
            $table->string('release_date');
            $table->integer('age_group');
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
        Schema::dropIfExists('movies');
    }
};
