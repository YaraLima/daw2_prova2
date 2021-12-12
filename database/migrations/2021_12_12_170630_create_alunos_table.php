<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->id();
			$table->string("nome", 100);
			$table->string("email", 100);
			$table->integer("matricula")->nullable();
			$table->foreignId("turma");
			$table->timestamps();
         
			$table->foreign("turma")->references("id")->on("turma");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno');
    }
}
