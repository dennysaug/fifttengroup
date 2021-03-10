<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('company_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('company_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('contact_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('company_type_id')->unsigned();
            $table->foreign('company_type_id')
                ->references('id')
                ->on('company_types');
            $table->integer('company_status_id')->unsigned();
            $table->foreign('company_status_id')
                ->references('id')
                ->on('company_statuses');
            $table->timestamps();
        });


        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');

            $table->integer('contact_role_id')->unsigned();
            $table->foreign('contact_role_id')
                ->references('id')
                ->on('contact_roles');

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
        Schema::drop('contacts');
        Schema::drop('companies');
        Schema::drop('company_types');
        Schema::drop('company_statuses');
        Schema::drop('contact_roles');
    }
}
