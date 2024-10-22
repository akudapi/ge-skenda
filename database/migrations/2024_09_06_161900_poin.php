<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // table
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('jurusan');
            $table->timestamps();
        });

        // data jurusan
        DB::table('jurusans')->insert([
            ['gambar' => 'ps.png', 'jurusan' => 'Pekerjaan Sosial', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'tjkt.png', 'jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'dkv.png', 'jurusan' => 'Desain Komunikasi Visual', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'anm.png', 'jurusan' => 'Animasi', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'pplg.png', 'jurusan' => 'Pengembangan Perangkat Lunak dan Gim', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'bct.png', 'jurusan' => 'Broadcasting dan Perfilman', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'tki.png', 'jurusan' => 'Teknik Kimia Industri', 'created_at' => now(), 'updated_at' => now()],
            ['gambar' => 'tf.png', 'jurusan' => 'Teknik Furnitur', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // table poin
        Schema::create('poins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jurusans_id'); // Sesuaikan tipe datanya
            $table->integer('poin');
            $table->date('contributed_at');
            $table->timestamps();
        
            $table->foreign('jurusans_id')->references('id')->on('jurusans')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
        Schema::dropIfExists('poins');
    }
};
