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
        Schema::create('peringkats', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('jurusan');
            $table->integer('point');
            $table->timestamps();
        });

        // data jurusan
        DB::table('peringkats')->insert([
            'gambar' => 'ps.png',
            'jurusan' => 'Pekerjaan Sosial',
            'point' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peringkats')->insert([
            'gambar' => 'tjkt.png',
            'jurusan' => 'Teknik Jaringan Komputer dan Telekomunikasi',
            'point' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peringkats')->insert([
            'gambar' => 'dkv.png',
            'jurusan' => 'Desain Komunikasi Visual',
            'point' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peringkats')->insert([
            'gambar' => 'anm.png',
            'jurusan' => 'Animasi',
            'point' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peringkats')->insert([
            'gambar' => 'pplg.png',
            'jurusan' => 'Pengembangan Perangkat Lunak Dan Gim',
            'point' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peringkats')->insert([
            'gambar' => 'bct.png',
            'jurusan' => 'Broadcasting dan Perfilman',
            'point' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peringkats')->insert([
            'gambar' => 'tki.png',
            'jurusan' => 'Teknik Kimia Industri',
            'point' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('peringkats')->insert([
            'gambar' => 'tf.png',
            'jurusan' => 'Teknik Furnitur',
            'point' => '0',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peringkats');
    }
};
