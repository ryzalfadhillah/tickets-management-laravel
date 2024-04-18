<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Ekonomi',
                'detail' => 'Kelas ekonomi menawarkan pengalaman perjalanan yang ekonomis tanpa mengorbankan kenyamanan. Ideal bagi pelancong yang mencari nilai terbaik dan fleksibilitas dalam anggaran perjalanan mereka.',
            ],
            [
                'name' => 'Bisnis',
                'detail' => 'Kelas bisnis menyajikan kombinasi sempurna antara kemewahan dan produktivitas di udara. Dengan fasilitas premium, ruang yang lebih luas, dan layanan pribadi, kelas ini cocok untuk pelancong bisnis yang menghargai kenyamanan dan efisiensi.',
            ],
            [
                'name' => 'Eksekutive',
                'detail' => 'Kelas eksekutif menghadirkan tingkat kemewahan dan eksklusivitas yang tak tertandingi. Dengan akses ke fasilitas premium, layanan berkualitas tinggi, dan ruang pribadi yang luas, kelas ini dirancang untuk memenuhi kebutuhan pelancong elit yang menghargai pengalaman penerbangan tanpa kompromi.',
            ],
        ];

        DB::beginTransaction();

        foreach ($category as $category) {
            Category::firstOrCreate($category);
        }

        DB::commit();
    }
}
