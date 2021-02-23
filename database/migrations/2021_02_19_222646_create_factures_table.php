<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("datefact");
            $table->float("baseht", 8, 2);
            $table->float("tva", 8, 2);
            $table->float("remise", 8, 2);
            $table->float("totalht", 10, 2);
            $table->float("totalttc", 10, 2);
            $table->bigInteger('command_id', false, true)->unsigned()->index();
            $table->foreign('command_id')
                ->references('id')
                ->on('commands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('factures');
    }
}
