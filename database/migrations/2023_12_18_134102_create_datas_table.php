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
        Schema::create('datas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('upload_id');
            $table->foreign('upload_id')->references('id')->on('uploads')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('variable_id');
            $table->foreign('variable_id')->references('id')->on('variables')->onDelete('restrict')->onUpdate('cascade');
            $table->unsignedBigInteger('region_id');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('restrict')->onUpdate('cascade');
            $table->float('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datas');
    }
};
