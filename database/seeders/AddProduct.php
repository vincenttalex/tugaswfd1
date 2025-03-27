<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddProduct extends Seeder
{                                                               
    public function run(): void
    {
        DB::table('product')->insert([
            [
                'name' => 'Cappuccino',
                'price' => 25000,
                'photo_link' => 'storage/fotoProduk/Cappuccino.jpg', 
                'description' => 'Cappuccino adalah minuman kopi berbasis espresso yang dicampur dengan susu steamed dan busa susu dalam perbandingan yang seimbang. Biasanya disajikan dalam cangkir kecil (150–180 ml) dengan tekstur yang lembut dan rasa yang kaya. Minuman ini berasal dari Italia dan sering dihiasi dengan latte art di bagian atasnya.',
            ],
            [
                'name' => 'Caramel Macchiato',
                'price' => 30000,
                'photo_link' => 'storage/fotoProduk/Caramel-macchiato.jpg',
                'description' => 'Caramel Macchiato adalah minuman kopi berbasis espresso yang dicampur dengan susu steamed dan diberi sirup vanila, lalu diberi topping saus karamel. "Macchiato" berarti "ditandai" dalam bahasa Italia, mengacu pada espresso yang dituangkan di atas susu, menciptakan lapisan khas. Minuman ini memiliki rasa manis, creamy, dan sedikit pahit dari espresso, menjadikannya favorit bagi pecinta kopi yang menyukai sentuhan karamel.',
            ],
            [
                'name' => 'Matcha',
                'price' => 27000,
                'photo_link' => 'storage/fotoProduk/Matcha.jpg',
                'description' => 'Matcha adalah bubuk teh hijau khas Jepang yang dibuat dari daun teh berkualitas tinggi yang digiling halus. Berbeda dengan teh hijau biasa, matcha dikonsumsi dengan mencampurkan bubuknya langsung ke dalam air atau susu, menghasilkan tekstur yang lebih creamy dan kaya antioksidan. Matcha memiliki rasa umami yang khas dengan sedikit rasa pahit dan manis alami. Biasanya digunakan dalam minuman seperti matcha latte atau upacara minum teh tradisional Jepang.',
            ],
            [
                'name' => 'Mineral Water',
                'price' => 20000,
                'photo_link' => 'storage/fotoProduk/Mineral-water.jpg',
                'description' => 'Air alami yang mengandung mineral penting seperti kalsium dan magnesium, berasal dari mata air bawah tanah. Membantu hidrasi dan keseimbangan elektrolit dalam tubuh, tersedia dalam varian berkarbonasi atau tidak.',
            ],
            [
                'name' => 'Sandwich',
                'price' => 30000,
                'photo_link' => 'storage/fotoProduk/Sandwich.jpg',
                'description' => 'Sandwich adalah hidangan yang terdiri dari dua atau lebih potongan roti yang diisi dengan berbagai bahan seperti daging, keju, sayuran, dan saus. Hidangan ini praktis dan fleksibel, dapat disajikan dalam berbagai variasi, mulai dari sandwich klasik dengan ham dan keju hingga sandwich sehat dengan alpukat dan ayam panggang. Sandwich bisa dinikmati dalam keadaan dingin atau dipanggang untuk menciptakan tekstur renyah dan rasa yang lebih kaya. Cocok sebagai sarapan, makan siang, atau camilan.',
            ],
            [
                'name' => 'Cheesecake',
                'price' => 27000,
                'photo_link' => 'storage/fotoProduk/Cheesecake.jpg',
                'description' => 'Cheesecake adalah kue bertekstur lembut dan creamy yang dibuat dari campuran keju krim, telur, dan gula di atas dasar biskuit atau pastry. Kue ini memiliki rasa manis dengan sedikit sentuhan asam dari keju, memberikan keseimbangan rasa yang lezat. Cheesecake dapat disajikan dalam berbagai varian, seperti original, cokelat, matcha, atau dengan topping buah seperti stroberi dan blueberry. Bisa dinikmati dalam versi panggang atau tanpa panggang.',
            ],
            [
                'name' => 'Cookie',
                'price' => 20000,
                'photo_link' => 'storage/fotoProduk/Cookie.jpg',
                'description' => 'Cookie adalah kue kecil yang biasanya berbentuk bundar dan memiliki tekstur renyah di luar namun bisa lembut di dalam. Terbuat dari bahan dasar seperti tepung, gula, mentega, dan telur, cookie sering kali diperkaya dengan tambahan seperti cokelat chip, kacang, atau kismis. Kue ini populer sebagai camilan dan sering disajikan dengan susu atau teh.',
            ],
            [
                'name' => 'Croissant',
                'price' => 25000,
                'photo_link' => 'storage/fotoProduk/Croissant.jpg',
                'description' => 'Croissant adalah kue pastry asal Prancis yang terkenal dengan lapisan-lapisan renyahnya dan tekstur yang lembut di dalam. Terbuat dari adonan berlapis yang diolesi mentega, kemudian digulung dan dipanggang hingga keemasan. Croissant memiliki rasa yang kaya dan buttery, sering dinikmati sebagai sarapan atau camilan, baik dalam bentuk polos maupun dengan isian seperti cokelat, keju, atau almond.',
            ],
        ]);
    }
}
