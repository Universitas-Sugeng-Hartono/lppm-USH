<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Proposals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->foreignid('admin_id')->references('id')->on('users');
            $table->foreignId('reviewer_id')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->string('judul')->nullable();
            $table->string('progdi')->nullable();
            $table->string('file_proposal')->nullable();
            $table->string('file_review1')->nullable();
            $table->text('catatan_review1')->nullable();
            $table->string('file_review2')->nullable();
            $table->text('catatan_review2')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
