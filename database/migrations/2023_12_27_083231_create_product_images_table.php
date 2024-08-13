<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('image_id');
            $table->string('filename', 255)->nullable();
            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });
        DB::table('product_images')->insert([
            ['image_id' => 8,'filename' => 'prod_img_6436977d7310f_test.jpg','product_id' => 2755641],
            ['image_id' => 9, 'filename' => 'prod_img_6436977d71f9b_test2.jpg', 'product_id' => 2755641],
            ['image_id' => 10, 'filename' => 'prod_img_6436a59a1e94c_rk.jpg', 'product_id' => 2755647],
            ['image_id' => 37, 'filename' => 'prod_img_646b7c1c261de_i9.jpg', 'product_id' => 2755720],
            ['image_id' => 38, 'filename' => 'prod_img_646b7c1c26fa1_i99.jpg', 'product_id' => 2755720],
            ['image_id' => 39, 'filename' => 'prod_img_646b7d21302e9_ryzen99.jpg', 'product_id' => 2755721],
            ['image_id' => 40, 'filename' => 'prod_img_646b7d2130cfa_ryzen9.jpg', 'product_id' => 2755721],
            ['image_id' => 43, 'filename' => 'prod_img_646b7e6ef3179_i7.jpg', 'product_id' => 2755723],
            ['image_id' => 44, 'filename' => 'prod_img_646b7e6ef3a99_i77.jpg', 'product_id' => 2755723],
            ['image_id' => 45, 'filename' => 'prod_img_646b7f28ac312_ryzen7.jpg', 'product_id' => 2755724],
            ['image_id' => 46, 'filename' => 'prod_img_646b7f28acc9b_ryzen77.jpg', 'product_id' => 2755724],
            ['image_id' => 47, 'filename' => 'prod_img_646b7ff518a62_i55.jpg', 'product_id' => 2755725],
            ['image_id' => 48, 'filename' => 'prod_img_646b7ff519391_i5.jpg', 'product_id' => 2755725],
            ['image_id' => 49, 'filename' => 'prod_img_646b814cbb2f4_strix5703.jpg', 'product_id' => 2755726],
            ['image_id' => 50, 'filename' => 'prod_img_646b814cbbc20_strix570.png', 'product_id' => 2755726],
            ['image_id' => 51, 'filename' => 'prod_img_646b821a842da_z5901.jpg', 'product_id' => 2755727],
            ['image_id' => 52, 'filename' => 'prod_img_646b821a85217_z590.png', 'product_id' => 2755727],
            ['image_id' => 53, 'filename' => 'prod_img_646b82dc5adb8_b550.png', 'product_id' => 2755728],
            ['image_id' => 54, 'filename' => 'prod_img_646b82dc5b60d_b551.png', 'product_id' => 2755728],
            ['image_id' => 55, 'filename' => 'prod_img_646b83d169f10_z590.jpg', 'product_id' => 2755729],
            ['image_id' => 56, 'filename' => 'prod_img_646b83d16abf4_z591.jpg', 'product_id' => 2755729],
            ['image_id' => 57, 'filename' => 'prod_img_646b846fd40bc_mortar.jpg', 'product_id' => 2755730],
            ['image_id' => 58, 'filename' => 'prod_img_646b846fd4c98_mortar1.png', 'product_id' => 2755730],
            ['image_id' => 59, 'filename' => 'prod_img_646b8814e8f37_corsair1.jpg', 'product_id' => 2755731],
            ['image_id' => 60, 'filename' => 'prod_img_646b8814e9915_corsair.jpg', 'product_id' => 2755731],
            ['image_id' => 61, 'filename' => 'prod_img_646b88c597343_trident1.png', 'product_id' => 2755732],
            ['image_id' => 62, 'filename' => 'prod_img_646b88c599e52_trident.jpg', 'product_id' => 2755732],
            ['image_id' => 63, 'filename' => 'prod_img_646b8a044be07_hyperx.png', 'product_id' => 2755733],
            ['image_id' => 64, 'filename' => 'prod_img_646b8a044c859_hyperx1.jpg', 'product_id' => 2755733],
            ['image_id' => 65, 'filename' => 'prod_img_646b8b8ca3c05_crusial.png', 'product_id' => 2755734],
            ['image_id' => 66, 'filename' => 'prod_img_646b8b8ca4a82_crusial1.png', 'product_id' => 2755734],
            ['image_id' => 67, 'filename' => 'prod_img_646b8c2bc59e4_tforce.jpg', 'product_id' => 2755735],
            ['image_id' => 68, 'filename' => 'prod_img_646b8c2bc6656_tforce1.jpg', 'product_id' => 2755735],
            ['image_id' => 69, 'filename' => 'prod_img_646b8d6c96ff8_3080.png', 'product_id' => 2755736],
            ['image_id' => 70, 'filename' => 'prod_img_646b8d6c97b08_3081.jpg', 'product_id' => 2755736],
            ['image_id' => 71, 'filename' => 'prod_img_646b8d6c99f08_3082.jpg', 'product_id' => 2755736],
            ['image_id' => 72, 'filename' => 'prod_img_646b8e27b73b6_rx6800.png', 'product_id' => 2755737],
            ['image_id' => 73, 'filename' => 'prod_img_646b8e27b819b_rx6801.png', 'product_id' => 2755737],
            ['image_id' => 74, 'filename' => 'prod_img_646b8ed32dd56_gtxsupper.jpg', 'product_id' => 2755738],
            ['image_id' => 75, 'filename' => 'prod_img_646b8ed32e936_gtxsupper1.jpg', 'product_id' => 2755738],
            ['image_id' => 76, 'filename' => 'prod_img_646b8f6fc55e1_6700.png', 'product_id' => 2755739],
            ['image_id' => 77, 'filename' => 'prod_img_646b8f6fc5cde_6701.png', 'product_id' => 2755739],
            ['image_id' => 78, 'filename' => 'prod_img_646b90a4c5790_970evo.png', 'product_id' => 2755740],
            ['image_id' => 79, 'filename' => 'prod_img_646b90a4c604c_970evo1.png', 'product_id' => 2755740],
            ['image_id' => 80, 'filename' => 'prod_img_646b913d5029a_wd_black.png', 'product_id' => 2755741],
            ['image_id' => 81, 'filename' => 'prod_img_646b913d50887_wd_black1.png', 'product_id' => 2755741],
            ['image_id' => 82, 'filename' => 'prod_img_646b920ceedae_2tbhdd.jpg', 'product_id' => 2755742],
            ['image_id' => 83, 'filename' => 'prod_img_646b920cef3f7_2tbhdd1.jpg', 'product_id' => 2755742],
            ['image_id' => 84, 'filename' => 'prod_img_646b92a8b20a9_mx500.jpg', 'product_id' => 2755743],
            ['image_id' => 85, 'filename' => 'prod_img_646b92a8b2743_mx501.jpg', 'product_id' => 2755743],
            ['image_id' => 86, 'filename' => 'prod_img_646b951fe3774_a2000.jpg', 'product_id' => 2755745],
            ['image_id' => 87, 'filename' => 'prod_img_646b951fe3d67_a2001.jpg', 'product_id' => 2755745],
            ['image_id' => 88, 'filename' => 'prod_img_646dfa3ea9f91_rm750.jpg', 'product_id' => 2755746],
            ['image_id' => 89, 'filename' => 'prod_img_646dfa3eaabd4_rm751.jpg', 'product_id' => 2755746],
            ['image_id' => 90, 'filename' => 'prod_img_646dfb15a536f_evga.png', 'product_id' => 2755747],
            ['image_id' => 91, 'filename' => 'prod_img_646dfb15a5914_evga1.jpg', 'product_id' => 2755747],
            ['image_id' => 92, 'filename' => 'prod_img_646dfbeca5e9d_seasonic.png', 'product_id' => 2755748],
            ['image_id' => 93, 'filename' => 'prod_img_646dfbeca64d3_seasonic1.jpg', 'product_id' => 2755748],
            ['image_id' => 94, 'filename' => 'prod_img_646dfcc850f91_thermal.jpg', 'product_id' => 2755749],
            ['image_id' => 95, 'filename' => 'prod_img_646dfcc851587_thermal1.jpg', 'product_id' => 2755749],
            ['image_id' => 96, 'filename' => 'prod_img_646dfdcef2465_straight.png', 'product_id' => 2755750],
            ['image_id' => 97, 'filename' => 'prod_img_646dfdcef2f1b_straight1.jpg', 'product_id' => 2755750],
            ['image_id' => 98, 'filename' => 'prod_img_646dfee9b01c1_nzxt.png', 'product_id' => 2755751],
            ['image_id' => 99, 'filename' => 'prod_img_646dfee9b0745_nzxt1.jpg', 'product_id' => 2755751],
            ['image_id' => 100, 'filename' => 'prod_img_646dffa42e55a_680x.png', 'product_id' => 2755752],
            ['image_id' => 101, 'filename' => 'prod_img_646dffa42eae9_680x1.png', 'product_id' => 2755752],
            ['image_id' => 102, 'filename' => 'prod_img_646e005c33a56_fractal.png', 'product_id' => 2755753],
            ['image_id' => 103, 'filename' => 'prod_img_646e005c34215_fractal1.png', 'product_id' => 2755753],
            ['image_id' => 104, 'filename' => 'prod_img_646e005c348fe_fractal2.png', 'product_id' => 2755753],
            ['image_id' => 105, 'filename' => 'prod_img_646e017a2fcf0_cooler.png', 'product_id' => 2755754],
            ['image_id' => 106, 'filename' => 'prod_img_646e017a303b2_cooler1.png', 'product_id' => 2755754],
            ['image_id' => 107, 'filename' => 'prod_img_646e023e97c3d_ph.jpg', 'product_id' => 2755755],
            ['image_id' => 108, 'filename' => 'prod_img_646e023e98582_ph1.jpg', 'product_id' => 2755755],
            ['image_id' => 109, 'filename' => 'prod_img_646e023e98e70_ph2.jpg', 'product_id' => 2755755],
            ['image_id' => 110, 'filename' => 'prod_img_646e0f254e838_noctua.jpg', 'product_id' => 2755756],
            ['image_id' => 111, 'filename' => 'prod_img_646e0f254ef69_noctua2.jpg', 'product_id' => 2755756],
            ['image_id' => 112, 'filename' => 'prod_img_646e0f254f5d9_noctua1.png', 'product_id' => 2755756],
            ['image_id' => 113, 'filename' => 'prod_img_646e0fbbcc492_hydro.jpg', 'product_id' => 2755757],
            ['image_id' => 114, 'filename' => 'prod_img_646e0fbbccc8b_hydro1.jpg', 'product_id' => 2755757],
            ['image_id' => 115, 'filename' => 'prod_img_646e0fbbcd4bc_hydro2.jpg', 'product_id' => 2755757],
            ['image_id' => 116, 'filename' => 'prod_img_646e10b7983c4_hyper2.jpg', 'product_id' => 2755758],
            ['image_id' => 117, 'filename' => 'prod_img_646e10b798da2_hyper.jpg', 'product_id' => 2755758],
            ['image_id' => 118, 'filename' => 'prod_img_646e10b799268_hyper1.jpg', 'product_id' => 2755758],
            ['image_id' => 119, 'filename' => 'prod_img_646e1163c5235_kranken.png', 'product_id' => 2755759],
            ['image_id' => 120, 'filename' => 'prod_img_646e1163c593b_kranken1.png', 'product_id' => 2755759],
            ['image_id' => 121, 'filename' => 'prod_img_646e1163c5fd4_kranken2.png', 'product_id' => 2755759],
            ['image_id' => 122, 'filename' => 'prod_img_646e1217274e3_gamma.png', 'product_id' => 2755760],
            ['image_id' => 123, 'filename' => 'prod_img_646e121727c2f_gamma1.png', 'product_id' => 2755760],
            ['image_id' => 124, 'filename' => 'prod_img_646e12172818f_gamma2.jpg', 'product_id' => 2755760],
            ['image_id' => 125, 'filename' => 'prod_img_646e12f8b771d_logi.png', 'product_id' => 2755761],
            ['image_id' => 126, 'filename' => 'prod_img_646e12f8b7bbd_logi1.png', 'product_id' => 2755761],
            ['image_id' => 127, 'filename' => 'prod_img_646e12f8b80b2_logi2.png', 'product_id' => 2755761],
            ['image_id' => 128, 'filename' => 'prod_img_646e13a8c5886_keyboard.png', 'product_id' => 2755762],
            ['image_id' => 129, 'filename' => 'prod_img_646e13a8c5efb_keyboard1.png', 'product_id' => 2755762],
            ['image_id' => 130, 'filename' => 'prod_img_646e13a8c667f_keyboard2.jpg', 'product_id' => 2755762],
            ['image_id' => 131, 'filename' => 'prod_img_646e14475df42_arctis.jpg', 'product_id' => 2755763],
            ['image_id' => 132, 'filename' => 'prod_img_646e14475e788_arctis1.png', 'product_id' => 2755763],
            ['image_id' => 133, 'filename' => 'prod_img_646e14475edb4_arctis2.png', 'product_id' => 2755763],
            ['image_id' => 134, 'filename' => 'prod_img_646e14d6e06d9_alloy.png', 'product_id' => 2755764],
            ['image_id' => 135, 'filename' => 'prod_img_646e14d6e0c44_alloy1.png', 'product_id' => 2755764],
            ['image_id' => 136, 'filename' => 'prod_img_646e14d6e1252_alloy2.jpg', 'product_id' => 2755764],
            ['image_id' => 137, 'filename' => 'prod_img_646e15d0ce741_arch.jpg', 'product_id' => 2755765],
            ['image_id' => 138, 'filename' => 'prod_img_646e15d0ced31_arch1.jpg', 'product_id' => 2755765],
            ['image_id' => 139, 'filename' => 'prod_img_646e15d0cf3ef_arch2.jpg', 'product_id' => 2755765],
            ['image_id' => 140, 'filename' => 'prod_img_646e1643b0a86_net1.png', 'product_id' => 2755766],
            ['image_id' => 141, 'filename' => 'prod_img_646e1643b1072_net.jpg', 'product_id' => 2755766],
            ['image_id' => 142, 'filename' => 'prod_img_646e1643b1610_net2.jpg', 'product_id' => 2755766],
            ['image_id' => 143, 'filename' => 'prod_img_646e170cb635f_asus.jpg', 'product_id' => 2755767],
            ['image_id' => 144, 'filename' => 'prod_img_646e170cb6977_asus1.jpg', 'product_id' => 2755767],
            ['image_id' => 145, 'filename' => 'prod_img_646e170cb6e9f_asus3.jpg', 'product_id' => 2755767],
            ['image_id' => 146, 'filename' => 'prod_img_646e170cb76b2_asus2.png', 'product_id' => 2755767],
            ['image_id' => 147, 'filename' => 'prod_img_646e17bb41f09_dbg.png', 'product_id' => 2755768],
            ['image_id' => 148, 'filename' => 'prod_img_646e17bb424b4_dbg1.jpg', 'product_id' => 2755768],
            ['image_id' => 149, 'filename' => 'prod_img_646e17bb42cee_dbg3.jpg', 'product_id' => 2755768],
            ['image_id' => 150, 'filename' => 'prod_img_646e17bb431f5_dbg2.jpg', 'product_id' => 2755768],
            ['image_id' => 151, 'filename' => 'prod_img_646e17bb437df_dbg4.png', 'product_id' => 2755768],
            ['image_id' => 152, 'filename' => 'prod_img_646e184b34899_dir.png', 'product_id' => 2755769],
            ['image_id' => 153, 'filename' => 'prod_img_646e184b34dd9_dir1.png', 'product_id' => 2755769],
            ['image_id' => 154, 'filename' => 'prod_img_646e184b35302_dir3.jpeg', 'product_id' => 2755769],
            ['image_id' => 155, 'filename' => 'prod_img_646e184b3589d_dir2.png', 'product_id' => 2755769],
        ]

        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};
