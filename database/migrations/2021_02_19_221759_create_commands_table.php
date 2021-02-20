<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("cmdDate");
            $table->float('toatlcmd', 8, 2);
            $table->string("cmdDescription");
            $table->bigInteger('etat_command_id', false, true)->unsigned()->index();
//            $table->foreign('etat_command_id')
//                ->references('id')
//                ->on('etat_commands')
//                ->onUpdate('cascade')
//                ->onDelete('cascade');
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
        Schema::dropIfExists('commands');
    }
}
