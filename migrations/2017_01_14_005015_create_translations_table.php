<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyager_translations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('table_name');
            $table->string('column_name');
            $table->integer('foreign_key')->unsigned();
            $table->string('locale');

            $table->text('value');

            $table->unique(['table_name', 'column_name', 'foreign_key', 'locale'], 'table_column_foreign_locale_unique');

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
        Schema::dropIfExists('voyager_translations');
    }
}
