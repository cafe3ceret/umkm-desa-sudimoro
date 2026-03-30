<?php

namespace Database\Seeders;

use App\Models\Potensi;
use App\Models\Product;
use App\Models\SiteSetting;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user — primary account
        User::firstOrCreate(
            ['email' => 'admin@sudimoro.id'],
            [
                'name' => 'Admin Sudimoro',
                'password' => Hash::make('admin123'),
            ]
        );

        // Legacy admin (keep existing)
        User::firstOrCreate(
            ['email' => 'admin@umkm.desa.id'],
            [
                'name' => 'Admin UMKM',
                'password' => Hash::make('password'),
            ]
        );

        // Site settings — update or create
        $settings = SiteSetting::first();
        if (!$settings) {
            SiteSetting::create([
                'village_name' => 'UMKM Desa Sudimoro',
                'address'      => 'Desa Sudimoro, Kec. Teras, Kab. Boyolali, Jawa Tengah',
                'email'        => 'info@desasudimoro.desa.id',
                'phone'        => '+62 812-3456-7890',
            ]);
        } else {
            // Fix address to correct kecamatan
            $settings->update([
                'address' => 'Desa Sudimoro, Kec. Teras, Kab. Boyolali, Jawa Tengah',
            ]);
        }

        // Sliders
        $sliders = [
            ['title' => 'Selamat Datang di UMKM Desa Sudimoro', 'image' => null, 'order' => 1],
            ['title' => 'Produk Lokal Menuju Pasar Digital', 'image' => null, 'order' => 2],
            ['title' => 'Bersama Membangun Ekonomi Desa', 'image' => null, 'order' => 3],
        ];

        foreach ($sliders as $slider) {
            Slider::firstOrCreate(['title' => $slider['title']], $slider);
        }

        // Potensis
        $potensis = [
            [
                'title' => 'Kerajinan Tangan',
                'description' => 'Berbagai produk kerajinan tangan berkualitas tinggi dibuat oleh pengrajin lokal Desa Sudimoro dengan bahan alami pilihan.',
                'image' => null,
                'order' => 1,
            ],
            [
                'title' => 'Pertanian Organik',
                'description' => 'Hasil pertanian segar dan organik dari lahan subur Desa Sudimoro. Bebas pestisida, sehat untuk keluarga.',
                'image' => null,
                'order' => 2,
            ],
            [
                'title' => 'Kuliner Khas',
                'description' => 'Aneka kuliner tradisional dengan cita rasa autentik khas Desa Sudimoro yang wajib dicoba oleh setiap pengunjung.',
                'image' => null,
                'order' => 3,
            ],
            [
                'title' => 'Wisata Alam',
                'description' => 'Pemandangan alam yang indah dan sejuk di sekitar Desa Sudimoro menjadi daya tarik wisata yang terus berkembang.',
                'image' => null,
                'order' => 4,
            ],
            [
                'title' => 'Produk Olahan',
                'description' => 'Produk olahan makanan dan minuman hasil inovasi warga desa yang siap bersaing di pasar modern.',
                'image' => null,
                'order' => 5,
            ],
            [
                'title' => 'Batik Lokal',
                'description' => 'Batik khas desa dengan motif unik yang terinspirasi dari kekayaan budaya dan alam Desa Sudimoro.',
                'image' => null,
                'order' => 6,
            ],
        ];

        foreach ($potensis as $potensi) {
            Potensi::firstOrCreate(['title' => $potensi['title']], $potensi);
        }

        // Products
        $products = [
            [
                'name' => 'Keripik Singkong Original',
                'description' => 'Keripik singkong renyah dengan bumbu khas Desa Sudimoro. Dibuat dari singkong pilihan yang segar dan alami.',
                'image' => null,
                'whatsapp' => '6281234567890',
            ],
            [
                'name' => 'Batik Tulis Sudimoro',
                'description' => 'Batik tulis premium dengan motif eksklusif khas desa. Setiap lembar dibuat dengan penuh ketelatenan oleh pengrajin terampil.',
                'image' => null,
                'whatsapp' => '6281234567891',
            ],
            [
                'name' => 'Empon-Empon Herbal',
                'description' => 'Minuman herbal tradisional dari tanaman rempah pilihan. Menyehatkan dan menyegarkan tubuh secara alami.',
                'image' => null,
                'whatsapp' => '6281234567892',
            ],
            [
                'name' => 'Anyaman Bambu Premium',
                'description' => 'Produk anyaman bambu berkualitas tinggi untuk kebutuhan rumah tangga dan dekorasi interior modern.',
                'image' => null,
                'whatsapp' => '6281234567893',
            ],
            [
                'name' => 'Madu Hutan Murni',
                'description' => 'Madu hutan murni langsung dari lebah liar pegunungan. Kaya nutrisi dan bebas bahan pengawet.',
                'image' => null,
                'whatsapp' => '6281234567894',
            ],
            [
                'name' => 'Kopi Robusta Lokal',
                'description' => 'Kopi robusta single origin dari kebun Desa Sudimoro. Cita rasa kuat dan aroma khas yang memanjakan.',
                'image' => null,
                'whatsapp' => '6281234567895',
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(['name' => $product['name']], $product);
        }
    }
}
