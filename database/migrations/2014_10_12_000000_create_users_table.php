<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login', 20);
            $table->string('email')->unique();
            $table->string('uSexe', 15);
            $table->string('uPrenom', 20);
            $table->string('uNom', 20);
            $table->string('uTel', 15);
            $table->string('uAdresse', 150);
            $table->string('uAvatar', 200);
            $table->string('uCodePostal', 15);
            $table->string('uId', 20);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('privillege_id', false, true)->unsigned()->index();
            $table->foreign('privillege_id')
                ->references('id')
                ->on('privileges')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
