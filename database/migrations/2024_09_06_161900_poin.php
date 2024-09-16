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

        // data poin
        DB::table('poins')->insert([
            ['jurusans_id' => 1, 'poin' => 100, 'contributed_at' => '2024-09-17', 'created_at' => now(), 'updated_at' => now()],
            ['jurusans_id' => 2, 'poin' => 80, 'contributed_at' => '2024-09-17', 'created_at' => now(), 'updated_at' => now()],
            ['jurusans_id' => 3, 'poin' => 95, 'contributed_at' => '2024-09-17', 'created_at' => now(), 'updated_at' => now()],
            ['jurusans_id' => 4, 'poin' => 60, 'contributed_at' => '2024-09-17', 'created_at' => now(), 'updated_at' => now()],
            ['jurusans_id' => 5, 'poin' => 10, 'contributed_at' => '2024-09-17', 'created_at' => now(), 'updated_at' => now()],
            ['jurusans_id' => 6, 'poin' => 8, 'contributed_at' => '2024-09-17', 'created_at' => now(), 'updated_at' => now()],
            ['jurusans_id' => 7, 'poin' => 9, 'contributed_at' => '2024-09-17', 'created_at' => now(), 'updated_at' => now()],
            ['jurusans_id' => 8, 'poin' => 6, 'contributed_at' => '2024-09-17', 'created_at' => now(), 'updated_at' => now()],
        ]);

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
