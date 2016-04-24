<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('offer_id');
            $table->integer('bulletin_id')
                ->unsigned()
                ->index();
            $table->integer('user_id')
                ->unsigned()
                ->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('status_id')
                ->unsigned()
                ->default(1)
                ->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->foreign('bulletin_id')
                ->references('bulletin_id')
                ->on('bulletins')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('offers', function (Blueprint $table) {
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('offers');
    }
}
