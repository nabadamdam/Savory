<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableKorisniciAddColumnsAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('korisnici', function (Blueprint $table) {
            $table->string('broj_telefona')->after('prezime')->nullable();
            $table->string('adresa')->after('broj_telefona')->nullable();
            $table->string('grad')->after('adresa')->nullable();
            $table->string('drzava')->after('grad')->nullable();
            $table->string('postanski_broj')->after('drzava')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
