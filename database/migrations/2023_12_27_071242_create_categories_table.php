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
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id');
            $table->string('name', 50);
            $table->string('description', 255)->nullable();
            $table->date('creation_date');
            $table->timestamps();
        });

        // Insert data into the 'categories' table
        $this->insertCategories();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }

    /**
     * Seed data into the 'categories' table.
     *
     * @return void
     */
    private function insertCategories()
    {
        $categories = [
            [
                'id' => 12,
                'name' => 'CPUs',
                'description' => 'Central Processing Units (CPUs) are the brains of a computer and are responsible for carrying out strengths and weaknesses',
                'creation_date' => '2023-04-08',
            ],
            [
                'id' => 13,
                'name' => 'Motherboards',
                'description' => 'The motherboard is the main circuit board of a computer and connects all the other components togeth',
                'creation_date' => '2023-04-09',
            ],
            [
                'id' => 14,
                'name' => 'RAM',
                'description' => 'Random Access Memory (RAM) is used by the computer to temporarily store data while it\'s being proces',
                'creation_date' => '2023-04-10',
            ],
            [
                'id' => 15,
                'name' => 'Graphics Cards',
                'description' => 'Graphics Cards are specialized processors that handle the visual output of a computer. They\'re espec',
                'creation_date' => '2023-04-11',
            ],
            [
                'id' => 16,
                'name' => 'Storage',
                'description' => 'This category includes different types of storage devices like Hard Disk Drives (HDDs), Solid State ',
                'creation_date' => '2023-04-05',
            ],
            [
                'id' => 17,
                'name' => 'Power Supplies',
                'description' => 'Power Supplies convert AC power from an outlet into DC power that can be used by the components of a',
                'creation_date' => '2023-04-02',
            ],
            [
                'id' => 18,
                'name' => 'Computer Cases',
                'description' => 'Computer Cases hold all the components of a computer and come in different sizes and styles. They ca',
                'creation_date' => '2023-03-28',
            ],
            [
                'id' => 19,
                'name' => 'Cooling',
                'description' => ' Cooling systems are important to prevent components from overheating and to ensure stable performan',
                'creation_date' => '2023-03-30',
            ],
            [
                'id' => 20,
                'name' => 'Peripherals',
                'description' => 'Peripherals include devices like keyboards, mice, and monitors that connect to a computer and allow ',
                'creation_date' => '2023-04-26',
            ],
            [
                'id' => 21,
                'name' => 'Networking',
                'description' => 'Networking devices include routers, modems, and network adapters that allow computers to connect to ',
                'creation_date' => '2023-04-05',
            ],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
};
