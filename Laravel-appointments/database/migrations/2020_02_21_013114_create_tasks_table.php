<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id', 10)->nullable()->unsigned()->autoIncrement();
            $table->string('title', 255);
            $table->string('description');
            $table->integer('created_by', 11);  
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
        Schema::dropIfExists('tasks');
    }
}
// table

// id int(10) unsigned not null auto increment
// title varchar(255)
// description text
// created_by int(11) users.id
// created_at timestamp
// updated_at timestamp