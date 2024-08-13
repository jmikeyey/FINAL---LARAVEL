<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('SKU', 100);
            $table->unsignedBigInteger('product_id');
            $table->date('date_added');
            $table->enum('status', ['Selling', 'Out of Stock']);

            $table->foreign('product_id')->references('product_id')->on('products');
        });

        
// Previous migration code...

    DB::table('inventories')->insert([
        ['SKU' => '11KU7HG', 'product_id' => 2755647, 'date_added' => '2023-05-03', 'status' => 'Selling'],
        ['SKU' => '18L0VU77', 'product_id' => 2755641, 'date_added' => '2023-05-03', 'status' => 'Selling'],
        ['SKU' => '96L6J8V', 'product_id' => 2755720, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'RZ1662', 'product_id' => 2755721, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'CK2114', 'product_id' => 2755723, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'RZ1945', 'product_id' => 2755724, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'CK1783', 'product_id' => 2755725, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'MB3872', 'product_id' => 2755726, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'MB5529', 'product_id' => 2755727, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'MB9361', 'product_id' => 2755728, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'MB7840', 'product_id' => 2755729, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'MB2915', 'product_id' => 2755730, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'RM4712', 'product_id' => 2755731, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'RM5998', 'product_id' => 2755732, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'RM2134', 'product_id' => 2755733, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'RM7519', 'product_id' => 2755734, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'RM6302', 'product_id' => 2755735, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'GC9632', 'product_id' => 2755736, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'GC7451', 'product_id' => 2755737, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'GC5298', 'product_id' => 2755738, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'GC8176', 'product_id' => 2755739, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'ST5556', 'product_id' => 2755740, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'ST7234', 'product_id' => 2755741, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'ST1638', 'product_id' => 2755742, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'Read Speed:', 'product_id' => 2755743, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'ST4085', 'product_id' => 2755745, 'date_added' => '2023-05-22', 'status' => 'Selling'],
        ['SKU' => 'CRM750X', 'product_id' => 2755746, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'EVG850G3', 'product_id' => 2755747, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'SSFGX650', 'product_id' => 2755748, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'TTG750RGB', 'product_id' => 2755749, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'BQSP11', 'product_id' => 2755750, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'H51078945', 'product_id' => 2755751, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => '680X63210', 'product_id' => 2755752, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'MESHIFYC47825', 'product_id' => 2755753, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'TD500M913', 'product_id' => 2755754, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'P400A74', 'product_id' => 2755755, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'NHD1521', 'product_id' => 2755756, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'H100I52', 'product_id' => 2755757, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'H21261', 'product_id' => 2755758, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'X63669', 'product_id' => 2755759, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'GT13825', 'product_id' => 2755760, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'G50269', 'product_id' => 2755761, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'BW6969', 'product_id' => 2755762, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'A7W723', 'product_id' => 2755763, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'HAO7696', 'product_id' => 2755764, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'AX6000', 'product_id' => 2755765, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'AC1900', 'product_id' => 2755766, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'RTAX88U', 'product_id' => 2755767, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'WRT3200', 'product_id' => 2755768, 'date_added' => '2023-05-24', 'status' => 'Selling'],
        ['SKU' => 'DIR882', 'product_id' => 2755769, 'date_added' => '2023-05-24', 'status' => 'Selling'],

        // Add more entries here if needed
    ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
