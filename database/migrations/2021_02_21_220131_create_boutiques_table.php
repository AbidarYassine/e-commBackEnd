<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoutiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        protected $fillable = ['id', 'boutLib', 'botAdresse', 'boutTel', 'boutFax', 'boutMail', 'boutDescription'];
        Schema::create('boutiques', function (Blueprint $table) {
            $table->id();
            $table->string("boutLib", 50);
            $table->string("botAdresse", 100);
            $table->string("boutTel", 15);
            $table->string("boutFax", 15);
            $table->string("boutMail", 50);
            $table->string("boutDescription", 200);
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
        Schema::dropIfExists('boutiques');
    }
}
