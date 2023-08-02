<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\HotSpotInput;
use App\Models\User;
use App\Models\Variables;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();
        Category::factory(4)->create();

        Variables::create([
            'name' =>'about',
            'value' => 'Fondée en 1994, la société habitat est le pionnier tunisien dans le domaine des portes de sécurité.Elle réalise des produits toujours innovants du point de vue technologique.Elle conjugue sécurité et design dans une vaste gamme de portes et de menuiseries. Cela lui a permis de s’affirmer en tant que société la plus innovante du secteur du point de vue technologique.'
        ]);
        Variables::create([
            'name' =>'about_img',
            'value' => 'images/Ah0lXBVYMzyTr3FFLR5WfVb5vgo5O8wNn2i5qWY5.png'
        ]);

        User::create([
            'name' => 'farah abdelkefi',
            'username' => 'farahabdelkefi',
            'email' => 'farah@gmail.com',
            'password' => 'farah123'
        ]);

        \App\Models\Product::factory(12)->create([
            'image' => 'images/YEK80IHWIaakqAzdABx7DOn0y67g5njAwcQoMsD8.png',
            'category_id'=>1
        ]);

        Variables::create([
            'name' => ' logo1',
            'value' =>'logos/cbm.png'
        ]);
        Variables::create([
            'name'=>'logo2',
            'value' => 'logos/dierre.png'
        ]);
        Variables::create([
            'name'=>'logo3',
            'value' => 'logos/energika.png'
        ]);
        Variables::create([
            'name' => 'logo4',
            'value' => 'logos/huet.png',
        ]);
        Variables::create([
            'name' => 'logo5',
            'value' => 'logos/maison-du-bois.png'
        ]);
        Variables::create([
            'name' => 'logo6',
            'value' => 'logos/mobitech.png'
        ]);
        Variables::create([
            'name' => 'logo7',
            'value' => 'logos/motorlline.png'
        ]);
        Variables::create([
            'name' => 'logo8',
            'value' => 'logos/mpbs.png'
        ]);
        Variables::create([
            'name' => 'logo9',
            'value' => 'logos/spectra.png'
        ]);
        Variables::create([
            'name'=> 'hotspot_img',
            'value' => 'images/bg-image-hotspo.jpg'
        ]);
        Variables::create([
            'name'=> 'insta_img1',
            'value' => 'images/follow1.png'
        ]);
        Variables::create([
        'name'=> 'insta_img2',
        'value' => 'images/follow2.png'
        ]) ;
        Variables::create([
        'name'=> 'insta_img3',
        'value' => 'images/follow3.png'
        ]);
        Variables::create([
            'name'=> 'insta_img4',
            'value' => 'images/follow4.png'
        ]);
        Variables::create([
            'name'=> 'collection_img',
            'value' => 'images/0lwZz0b2t81lsKqyW2p9kDrzi8x49KDPT7L7qbNj.jpg'
        ]);
        Variables::create([
            'name'=> 'collection_title',
            'value' => 'collection 2023'
        ]);
        HotSpotInput::create([
            'input_left' =>  35,
            'input_top'=> 35,
            'content_left' => 22,
            'content_top' => 12,
            'label_left' =>  20,
            'label_top' => 35,
            'product_id' => '4'
        ]);
        HotSpotInput::create([
            'input_left' =>  80,
            'input_top'=> 45,
            'content_left' => 67,
            'content_top' => 39 ,
            'label_left' =>  64,
            'label_top' => 60,
            'product_id' => '5'
        ]);
        HotSpotInput::create([
            'input_left' =>  35,
            'input_top'=> 75,
            'content_left' => 40,
            'content_top' => 43,
            'label_left' =>  38,
            'label_top' => 65,
            'product_id' => '6'
        ]);

    }
}
