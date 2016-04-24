<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBulletinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulletins', function (Blueprint $table) {
            $table->increments('bulletin_id');
            $table->integer('user_id')
                ->unsigned()
                ->index();
            $table->string('title');
            $table->text('description')->nullable();
            $table->char('picture');
            $table->decimal('price', 10, 2);
            $table->integer('status_id')
                ->unsigned()
                ->default(1)
                ->index();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('bulletins', function (Blueprint $table) {
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
        Schema::drop('bulletins');
    }
}
