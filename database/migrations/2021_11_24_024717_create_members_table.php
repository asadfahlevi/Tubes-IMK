<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->string('member_id', 16)->primary();
            $table->string('member_name');
            $table->string('pob');
            $table->date('dob');
            $table->string('address');
            $table->string('telp_no', 13);
            $table->decimal('balance_sw', 12, 3)->default(0);
            $table->decimal('balance_ss', 12, 3)->default(0);
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
        Schema::dropIfExists('members');
    }
}
