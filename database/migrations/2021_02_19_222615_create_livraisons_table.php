<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livraisons', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("livdate");
            $table->string("livdescription");
            $table->bigInteger("command_id", false, true)->unsigned()->index();
            $table->bigInteger("modeliv_id", false, true)->unsigned()->index();
            $table->bigInteger("boutique_id", false, true)->unsigned()->index();
            $table->foreign('command_id')
                ->references('id')
                ->on('commands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('modeliv_id')
                ->references('id')
                ->on('modelivraisons')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('boutique_id')
                ->references('id')
                ->on('boutiques')
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
        Schema::dropIfExists('livraisons');
    }
}
