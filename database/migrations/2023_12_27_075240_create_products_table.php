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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_code');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price', 11, 2);
            $table->decimal('old_price', 11, 2);
            $table->string('brand')->nullable();
            $table->integer('quantity');
            $table->integer('is_sold')->nullable();
            $table->enum('popularity_status', ['New', 'Hot', 'Limited Edition', 'Best seller'])->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('is_deleted')->default('not');

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        DB::table('products')->insert([
            [
                'product_id' => 2755641,
                'product_code' => 'aW1MyATkU4',
                'name' => 'GTX 1650 OC 4GB GDDR5 Graphics Card',
                'description' => 'WINDFORCE 2X cooling system features 2x 80mm unique blade fans, alternate spinning fan, and 3D active fan, together delivering an effective heat dissipation.',
                'price' => 10495.00,
                'old_price' => 12995.00,
                'brand' => 'Gigabytes',
                'quantity' => 20,
                'is_sold' => 5,
                'popularity_status' => 'Hot',
                'category_id' => 15,
            ],
            [
                'product_id' => 2755647,
                'product_code' => '5HmOJog01J',
                'name' => 'Royal Kludge RK61 RGB Mechanical Keyboards',
                'description' => 'Connect to the computer in wired mode, after opening the driver, you will be prompted to upgrade, and it will automatically download and upgrade automatically. After the upgrade is successful, you need to unplug and plug the keyboards',
                'price' => 2599.00,
                'old_price' => 4136.00,
                'brand' => 'Royal Kludge',
                'quantity' => 32,
                'is_sold' => 16,
                'popularity_status' => 'New',
                'category_id' => 20,
            ],
            [
                'product_id' => 2755720,
                'product_code' => 'jTOvgUFJKt',
                'name' => 'Intel Core i9-10900K',
                'description' => 'This high-end CPU from Intel features 10 cores and 20 threads, with a base clock speed of 3.7 GHz (up to 5.3 GHz with Turbo Boost). It provides excellent gaming performance and multitasking capabilities.',
                'price' => 30320.00,
                'old_price' => 35320.00,
                'brand' => 'Intel',
                'quantity' => 7,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 12,
            ],
            [
                'product_id' => 2755721,
                'product_code' => 'TICizJSfM8',
                'name' => 'AMD Ryzen 9 5950X',
                'description' => 'This top-tier CPU from AMD offers 16 cores and 32 threads, with a base clock speed of 3.4 GHz (up to 4.9 GHz with Max Boost). It delivers exceptional gaming performance and is known for its efficient multi-threaded performance!',
                'price' => 44900.00,
                'old_price' => 49990.00,
                'brand' => 'AMD',
                'quantity' => 6,
                'is_sold' => 1,
                'popularity_status' => 'Hot',
                'category_id' => 12,
            ],
            [
                'product_id' => 2755723,
                'product_code' => 'TwrgD95D0W',
                'name' => 'Intel Core i7-11700K',
                'description' => "This mid-range CPU from Intel features 8 cores and 16 threads, with a base clock speed of 3.6 GHz (up to 5.0 GHz with Turbo Boost). It offers strong gaming performance and is well-suited for demanding gaming setups.",
                'price' => 25999.00,
                'old_price' => 27999.00,
                'brand' => 'Intel',
                'quantity' => 16,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 12
            ],
            [
                'product_id' => 2755724,
                'product_code' => '8EJ4DOoyv2',
                'name' => 'AMD Ryzen 7 5800X',
                'description' => "This high-performance CPU from AMD provides 8 cores and 16 threads, with a base clock speed of 3.8 GHz (up to 4.7 GHz with Max Boost). It offers excellent gaming performance and is known for its strong single-threaded capabilities.",
                'price' => 15450.00,
                'old_price' => 15950.00,
                'brand' => 'AMD',
                'quantity' => 53,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 12
            ],
            [
                'product_id' => 2755725,
                'product_code' => 'Yo6rE6whRU',
                'name' => 'Intel Core i5-11600K',
                'description' => 'This budget-friendly CPU from Intel features 6 cores and 12 threads, with a base clock speed of 3.9 GHz (up to 4.9 GHz with Turbo Boost). It offers solid gaming performance and is a popular choice for gamers on a tighter budget.',
                'price' => 16100.00,
                'old_price' => 16999.00,
                'brand' => 'Intel',
                'quantity' => 21,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 12
            ],
            [
                'product_id' => 2755726,
                'product_code' => 'sp4gwk3E4X',
                'name' => 'ASUS ROG Strix X570-E Gaming',
                'description' => 'Strix X570-E Gaming: The ASUS ROG Strix X570-E Gaming motherboard offers high-performance gaming features with robust power delivery and extensive connectivity options.',
                'price' => 22600.00,
                'old_price' => 22900.00,
                'brand' => 'Asus',
                'quantity' => 7,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 13
            ],
            [
                'product_id' => 2755727,
                'product_code' => 'iOdp1MKcVU',
                'name' => 'MSI MPG Z590 Gaming Carbon WiFi',
                'description' => 'The MSI MPG Z590 Gaming Carbon WiFi motherboard combines advanced features, enhanced power delivery, and reliable networking capabilities for a premium gaming experience.',
                'price' => 17800.00,
                'old_price' => 17999.00,
                'brand' => 'MSI',
                'quantity' => 12,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 13
            ],
            [
                'product_id' => 2755728,
                'product_code' => 'MdcxZdRC98',
                'name' => 'Gigabyte B550 AORUS Elite',
                'description' => 'The Gigabyte B550 AORUS Elite motherboard offers a balance of performance and affordability, supporting the latest AMD Ryzen processors and featuring a comprehensive cooling solution.',
                'price' => 9699.00,
                'old_price' => 9999.00,
                'brand' => 'Gigabyte',
                'quantity' => 5,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 13
            ],
            [
                'product_id' => 2755729,
                'product_code' => 'ofuDDV2DZ9',
                'name' => 'ASRock Z590 Taichi',
                'description' => 'The ASRock Z590 Taichi motherboard is designed for enthusiasts, providing premium features, robust power delivery, and excellent overclocking capabilities for ultimate gaming performance.',
                'price' => 19200.00,
                'old_price' => 19800.00,
                'brand' => 'ASRock',
                'quantity' => 13,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 13
            ],
            [
                'product_id' => 2755730,
                'product_code' => '27L0YJQe0i',
                'name' => 'MSI MAG B550M Mortar',
                'description' => 'The MSI MAG B550M Mortar motherboard offers a compact micro-ATX form factor while delivering reliable performance and connectivity options for gaming enthusiasts with limited space.',
                'price' => 8550.00,
                'old_price' => 9999.00,
                'brand' => 'MSI',
                'quantity' => 3,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 13
            ],
            [
                'product_id' => 2755731,
                'product_code' => 'R6JKEXlJO7',
                'name' => 'Corsair Vengeance RGB Pro',
                'description' => 'The Corsair Vengeance RGB Pro RAM features stylish RGB lighting and delivers high-performance memory for smooth gaming experiences.',
                'price' => 3069.00,
                'old_price' => 4999.00,
                'brand' => 'Corsair',
                'quantity' => 26,
                'is_sold' => 3,
                'popularity_status' => 'New',
                'category_id' => 14
            ],
            [
                'product_id' => 2755732,
                'product_code' => 'J2Z8pAk2x9',
                'name' => 'G.Skill Trident Z Neo',
                'description' => 'The G.Skill Trident Z Neo RAM offers exceptional performance and stunning aesthetics with customizable RGB lighting, perfect for gaming enthusiasts.',
                'price' => 7950.00,
                'old_price' => 7999.00,
                'brand' => 'G.SKILL',
                'quantity' => 21,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 14
            ],
            [
                'product_id' => 2755733,
                'product_code' => 'dzBiWnw4uN',
                'name' => 'Kingston HyperX Predator',
                'description' => 'The Kingston HyperX Predator RAM delivers reliable and high-speed performance, designed for gamers seeking smooth multitasking and quick load times.',
                'price' => 6690.00,
                'old_price' => 6999.00,
                'brand' => 'Kingston',
                'quantity' => 21,
                'is_sold' => 0,
                'popularity_status' => 'Hot',
                'category_id' => 14
            ],
            [
                'product_id' => 2755734,
                'product_code' => '0W4QsNWK8v',
                'name' => 'Crucial Ballistix RGB',
                'description' => 'The Crucial Ballistix RGB RAM offers customizable RGB lighting and excellent gaming performance with enhanced heat dissipation for optimal stability.',
                'price' => 5500.00,
                'old_price' => 5999.00,
                'brand' => 'Micron',
                'quantity' => 6,
                'is_sold' => 0,
                'popularity_status' => 'Hot',
                'category_id' => 14
            ],
            [
                'product_id' => 2755735,
                'product_code' => 'uvCvnIZ2iy',
                'name' => 'Team T-Force Delta RGB',
                'description' => 'The Team T-Force Delta RGB RAM combines stunning RGB lighting effects with reliable performance, making it a great choice for gamers seeking style and functionality.',
                'price' => 2199.00,
                'old_price' => 2599.00,
                'brand' => 'T-Force',
                'quantity' => 3,
                'is_sold' => 2,
                'popularity_status' => 'New',
                'category_id' => 14
            ],
            [
                'product_id' => 2755736,
                'product_code' => '5BZkbB95WI',
                'name' => 'NVIDIA GeForce RTX 3080',
                'description' => 'The NVIDIA GeForce RTX 3080 offers exceptional gaming performance with real-time ray tracing and AI-enhanced graphics for immersive gaming experiences.',
                'price' => 37500.00,
                'old_price' => 39999.00,
                'brand' => 'NVIDIA',
                'quantity' => 5,
                'is_sold' => 1,
                'popularity_status' => 'Hot',
                'category_id' => 15
            ],
            [
                'product_id' => 2755737,
                'product_code' => 'bWmigp8jHj',
                'name' => 'AMD Radeon RX 6800 XT',
                'description' => 'The AMD Radeon RX 6800 XT delivers high-performance gaming with hardware-accelerated ray tracing and advanced features for smooth gameplay.',
                'price' => 33681.00,
                'old_price' => 35499.00,
                'brand' => 'AMD',
                'quantity' => 2,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 15
            ],
            [
                'product_id' => 2755738,
                'product_code' => 'UQyEfO8h2p',
                'name' => 'NVIDIA GeForce GTX 1660 Super',
                'description' => 'The NVIDIA GeForce GTX 1660 Super provides excellent 1080p gaming performance and is a great choice for budget-conscious gamers.',
                'price' => 12183.00,
                'old_price' => 12499.00,
                'brand' => 'NVIDIA',
                'quantity' => 6,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 15
            ],
            [
                'product_id' => 2755739,
                'product_code' => 'brI94V8TMJ',
                'name' => 'AMD Radeon RX 6700 XT',
                'description' => 'The AMD Radeon RX 6700 XT delivers high-refresh-rate gaming and smooth visuals, featuring advanced technologies for exceptional graphics performance.',
                'price' => 29500.00,
                'old_price' => 31259.00,
                'brand' => 'AMD',
                'quantity' => 3,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 15
            ],
            [
                'product_id' => 2755740,
                'product_code' => 'ortINK1kJ1',
                'name' => 'Samsung 970 EVO Plus NVMe M.2 SSD',
                'description' => 'The Samsung 970 EVO Plus NVMe M.2 SSD provides fast and reliable storage performance, ideal for quick game load times and smooth gameplay.',
                'price' => 7999.00,
                'old_price' => 9949.00,
                'brand' => 'Samsung',
                'quantity' => 5,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 16
            ],
            [
                'product_id' => 2755741,
                'product_code' => 'akUQ9ip7TQ',
                'name' => 'Western Digital WD Black SN750 NVMe M.2 SSD',
                'description' => 'The WD Black SN750 NVMe M.2 SSD offers high-speed storage with gaming-focused features, providing fast data access and optimal performance for gaming enthusiasts.',
                'price' => 10400.00,
                'old_price' => 11400.00,
                'brand' => 'Western Digital',
                'quantity' => 8,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 16
            ],
            [
                'product_id' => 2755742,
                'product_code' => 'hgNWFECqwC',
                'name' => 'Seagate Barracuda 2TB HDD',
                'description' => 'The Seagate Barracuda HDD offers a large storage capacity for games, providing ample space to store your game library and other files.',
                'price' => 849.00,
                'old_price' => 1059.00,
                'brand' => 'Seagate',
                'quantity' => 17,
                'is_sold' => 5,
                'popularity_status' => 'New',
                'category_id' => 16
            ],
            [
                'product_id' => 2755743,
                'product_code' => 'A851p6VGtE',
                'name' => 'Crucial MX500 SATA SSD',
                'description' => 'The Crucial MX500 SATA SSD delivers fast and reliable storage performance, enhancing game load times and system responsiveness.',
                'price' => 2849.00,
                'old_price' => 3549.00,
                'brand' => 'Crucial',
                'quantity' => 31,
                'is_sold' => 3,
                'popularity_status' => 'New',
                'category_id' => 16
            ],
            [
                'product_id' => 2755745,
                'product_code' => 'dTuhgDzVnH',
                'name' => 'Kingston A2000 NVMe PCIe M.2 SSD',
                'description' => 'The Kingston A2000 NVMe M.2 SSD provides high-speed storage with efficient power consumption, delivering fast performance for gaming and multitasking.',
                'price' => 1300.00,
                'old_price' => 1500.00,
                'brand' => 'Kingston',
                'quantity' => 5,
                'is_sold' => 5,
                'popularity_status' => 'New',
                'category_id' => 16
            ],
            [
                'product_id' => 2755746,
                'product_code' => '2uOyEZQ1sK',
                'name' => 'Corsair RM750x',
                'description' => 'The Corsair RM750x is a high-performance power supply designed for gaming enthusiasts. It delivers reliable and efficient power to your gaming PC, ensuring stable performance during intense gaming sessions.',
                'price' => 8295.00,
                'old_price' => 9999.00,
                'brand' => 'Corsair',
                'quantity' => 5,
                'is_sold' => 4,
                'popularity_status' => 'New',
                'category_id' => 17
            ],
            [
                'product_id' => 2755747,
                'product_code' => 'MNvbxOkBaD',
                'name' => 'EVGA SuperNOVA 850 G3',
                'description' => 'The EVGA SuperNOVA 850 G3 is a compact and powerful power supply that offers excellent efficiency and reliability. It features a fully modular design and is optimized for gaming performance.',
                'price' => 7500.00,
                'old_price' => 8500.00,
                'brand' => 'EVGA',
                'quantity' => 8,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 17
            ],
            [
                'product_id' => 2755748,
                'product_code' => 'Q6BSyZ6MDM',
                'name' => 'Seasonic Focus GX-650',
                'description' => 'The Seasonic Focus GX-650 is a reliable power supply with excellent voltage regulation and high efficiency. It is equipped with high-quality components to ensure stable power delivery to your gaming PC.',
                'price' => 5680.00,
                'old_price' => 5999.00,
                'brand' => 'Seasonic',
                'quantity' => 12,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 17
            ],
            [
                'product_id' => 2755749,
                'product_code' => '8JimZPAV2G',
                'name' => 'Thermaltake Toughpower Grand RGB 750W',
                'description' => 'The Thermaltake Toughpower Grand RGB 750W is a stylish power supply with customizable RGB lighting effects. It offers reliable power delivery and comes with a variety of connectors for easy installation.',
                'price' => 5163.00,
                'old_price' => 5499.00,
                'brand' => 'Thermaltake',
                'quantity' => 5,
                'is_sold' => 0,
                'popularity_status' => 'Hot',
                'category_id' => 17
            ],
            [
                'product_id' => 2755750,
                'product_code' => '1CbTM5aHzp',
                'name' => 'Be Quiet! Straight Power 11 850W',
                'description' => 'Be quiet! Straight Power 11 850W is a premium power supply known for its whisper-quiet operation and exceptional build quality. It provides stable and efficient power to meet the demands of gaming PCs.',
                'price' => 5426.00,
                'old_price' => 5999.00,
                'brand' => 'Straight',
                'quantity' => 2,
                'is_sold' => 0,
                'popularity_status' => 'Limited Edition',
                'category_id' => 17
            ],
            [
                'product_id' => 2755751,
                'product_code' => 'shOnojnf1H',
                'name' => 'NZXT H510 Elite',
                'description' => 'The NZXT H510 is a sleek and compact mid-tower computer case designed for gamers. It features a clean, minimalist design with a tempered glass side panel to showcase your gaming build.',
                'price' => 7320.00,
                'old_price' => 8599.00,
                'brand' => 'NZXT',
                'quantity' => 3,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 18
            ],
            [
                'product_id' => 2755752,
                'product_code' => '253sCrA6ic',
                'name' => 'Corsair Crystal Series 680X',
                'description' => 'The Corsair Crystal Series 680X is a high-performance full-tower computer case with a unique dual-chamber design for optimal airflow and aesthetics. It features tempered glass panels on three sides to showcase your components.',
                'price' => 16680.00,
                'old_price' => 19999.00,
                'brand' => 'Corsair',
                'quantity' => 6,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 18
            ],
            [
                'product_id' => 2755753,
                'product_code' => 'lkARqWUG9C',
                'name' => 'Fractal Design Meshify C',
                'description' => 'The Fractal Design Meshify C is a compact mid-tower computer case that combines a striking mesh front panel design with excellent airflow capabilities. It offers a balance between aesthetics and cooling performance.',
                'price' => 6350.00,
                'old_price' => 7199.00,
                'brand' => 'Fractal Design',
                'quantity' => 5,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 18
            ],
            [
                'product_id' => 2755754,
                'product_code' => 'I7a3hNoGpj',
                'name' => 'Cooler Master MasterBox TD500 Mesh',
                'description' => 'The Cooler Master MasterBox TD500 Mesh is a feature-rich mid-tower computer case that offers excellent airflow and a striking mesh front panel design. It provides ample space for high-performance components and effective cooling.',
                'price' => 6000.00,
                'old_price' => 6999.00,
                'brand' => 'Cooler Master',
                'quantity' => 4,
                'is_sold' => 0,
                'popularity_status' => 'Hot',
                'category_id' => 18
            ],
            [
                'product_id' => 2755755,
                'product_code' => 'GydonhKVcH',
                'name' => 'Phanteks Eclipse P400A',
                'description' => 'The Phanteks Eclipse P400A is a stylish mid-tower computer case with a focus on excellent airflow. It features a front mesh panel, a tempered glass side panel, and extensive cooling options for optimal performance.',
                'price' => 4500.00,
                'old_price' => 4699.00,
                'brand' => 'Phanteks',
                'quantity' => 9,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 18
            ],
            [
                'product_id' => 2755756,
                'product_code' => 'MDkEpmr5BU',
                'name' => 'Noctua NH-D15',
                'description' => 'The Noctua NH-D15 is a high-performance air cooler known for its exceptional cooling capabilities and near-silent operation. It features a dual-tower heatsink design and two premium-grade fans for efficient heat dissipation.',
                'price' => 2647.00,
                'old_price' => 2799.00,
                'brand' => 'Noctua',
                'quantity' => 18,
                'is_sold' => 1,
                'popularity_status' => 'New',
                'category_id' => 19
            ],
            [
                'product_id' => 2755757,
                'product_code' => 'G8P8fsfDhw',
                'name' => 'Corsair Hydro Series H100i RGB Platinum SE',
                'description' => 'The Corsair Hydro Series H100i RGB Platinum SE is an all-in-one liquid cooling solution that combines powerful cooling performance with vibrant RGB lighting. It features a 240mm radiator and two high-speed 120mm fans.',
                'price' => 10774.00,
                'old_price' => 11599.00,
                'brand' => 'Corsair',
                'quantity' => 30,
                'is_sold' => 0,
                'popularity_status' => 'Hot',
                'category_id' => 19
            ],
            [
                'product_id' => 2755758,
                'product_code' => '7O55Am2t31',
                'name' => 'Cooler Master Hyper 212 RGB Black Edition',
                'description' => 'The Cooler Master Hyper 212 RGB Black Edition is a popular air cooler known for its excellent price-to-performance ratio. It features a sleek black design, a single tower heatsink, and an RGB LED fan for added aesthetics.',
                'price' => 2999.00,
                'old_price' => 3145.00,
                'brand' => 'Hyper',
                'quantity' => 21,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 19
            ],
            [
                'product_id' => 2755759,
                'product_code' => 'tHfzXEroOQ',
                'name' => 'NZXT Kraken X63',
                'description' => 'The NZXT Kraken X63 is a premium all-in-one liquid cooler designed for high-end gaming systems. It features a 280mm radiator, two Aer P Series fans, and customizable RGB lighting effects.',
                'price' => 8999.00,
                'old_price' => 9937.00,
                'brand' => 'NZXT',
                'quantity' => 18,
                'is_sold' => 0,
                'popularity_status' => 'Limited Edition',
                'category_id' => 19
            ],
            [
                'product_id' => 2755760,
                'product_code' => 'z7xdvpad89',
                'name' => 'Deepcool GAMMAXX GT',
                'description' => 'The Deepcool GAMMAXX GT is an affordable air cooler with a unique RGB lighting system. It offers solid cooling performance, a black top cover, and a 120mm PWM fan for efficient heat dissipation.',
                'price' => 1935.00,
                'old_price' => 2435.00,
                'brand' => 'Deepcool',
                'quantity' => 63,
                'is_sold' => 3,
                'popularity_status' => 'New',
                'category_id' => 19
            ],
            [
                'product_id' => 2755761,
                'product_code' => '7uUFXJ7N5W',
                'name' => 'Logitech G502 HERO Gaming Mouse',
                'description' => 'The Logitech G502 HERO is a high-performance gaming mouse designed for precision and customization. It features a HERO 25K sensor for accurate tracking, adjustable weights, and customizable RGB lighting.',
                'price' => 2050.00,
                'old_price' => 2399.00,
                'brand' => 'Logitech',
                'quantity' => 26,
                'is_sold' => 2,
                'popularity_status' => 'New',
                'category_id' => 20
            ],
            [
                'product_id' => 2755762,
                'product_code' => 'TMZQaX9Ah9',
                'name' => 'Razer BlackWidow Elite Mechanical Gaming Keyboard',
                'description' => 'The Razer BlackWidow Elite is a mechanical gaming keyboard that offers a satisfying typing experience and responsive gaming performance. It features Razer Chroma RGB lighting, programmable macros, and dedicated media controls.',
                'price' => 8950.00,
                'old_price' => 8999.00,
                'brand' => 'Razer',
                'quantity' => 25,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 20
            ],
            [
                'product_id' => 2755763,
                'product_code' => 'uz2K2bBNod',
                'name' => 'SteelSeries Arctis 7 Wireless Gaming Headset',
                'description' => 'The SteelSeries Arctis 7 is a wireless gaming headset that delivers immersive audio and comfort for long gaming sessions. It features a ClearCast microphone, DTS Headphone:X 2.0 surround sound, and a lightweight design.',
                'price' => 4488.00,
                'old_price' => 4699.00,
                'brand' => 'SteelSeries',
                'quantity' => 24,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 20
            ],
            [
                'product_id' => 2755764,
                'product_code' => 'UBmMWNcB0O',
                'name' => 'HyperX Alloy Origins Mechanical Gaming Keyboard',
                'description' => 'The HyperX Alloy Origins is a compact mechanical gaming keyboard that offers precise key presses and customizable RGB lighting. It features HyperX Red mechanical switches, durable aluminum construction, and software.',
                'price' => 4259.00,
                'old_price' => 4599.00,
                'brand' => 'HyperX',
                'quantity' => 23,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 20
            ],
            [
                'product_id' => 2755765,
                'product_code' => 'oSyMZ3E96U',
                'name' => 'TP-Link Archer AX6000 Wi-Fi 6 Router',
                'description' => 'The TP-Link Archer AX6000 is a high-performance Wi-Fi 6 router that offers fast and reliable wireless connectivity. It features advanced technologies, such as OFDMA and MU-MIMO, for efficient data transmission and supports multiple devices simultaneously.',
                'price' => 19500.00,
                'old_price' => 23568.00,
                'brand' => 'TP-Link',
                'quantity' => 5,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 21
            ],
            [
                'product_id' => 2755766,
                'product_code' => 'mYZVORGWQC',
                'name' => 'NETGEAR Nighthawk AC1900 Dual Band Wi-Fi Router',
                'description' => 'The NETGEAR Nighthawk AC1900 is a powerful dual-band Wi-Fi router designed for high-performance gaming and streaming. It provides reliable connectivity with advanced QoS and beamforming technologies for optimized network.',
                'price' => 3630.00,
                'old_price' => 4699.00,
                'brand' => 'NETGEAR',
                'quantity' => 69,
                'is_sold' => 1,
                'popularity_status' => 'New',
                'category_id' => 21
            ],
            [
                'product_id' => 2755767,
                'product_code' => 'INjz5dgTdI',
                'name' => 'ASUS RT-AX88U AX6000 Dual Band Wi-Fi Router',
                'description' => 'The ASUS RT-AX88U is a high-speed dual-band Wi-Fi router that supports the latest Wi-Fi 6 technology. It offers ultrafast wireless speeds, advanced security features, and a user-friendly interface for seamless networking.',
                'price' => 17050.00,
                'old_price' => 18969.00,
                'brand' => 'ASUS',
                'quantity' => 8,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 21
            ],
            [
                'product_id' => 2755768,
                'product_code' => '0d2E9BWQq0',
                'name' => 'Linksys WRT3200ACM Dual-Band Wi-Fi Router',
                'description' => 'The Linksys WRT3200ACM is a high-performance dual-band Wi-Fi router that delivers fast and reliable wireless connectivity. It features a powerful 1.8GHz dual-core processor, advanced security features, and OpenWrt firmware compatibility for enhanced customization.',
                'price' => 5299.00,
                'old_price' => 5445.00,
                'brand' => 'Linksys',
                'quantity' => 9,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 21
            ],
            [
                'product_id' => 2755769,
                'product_code' => 'xZqPXxu7xf',
                'name' => 'D-Link DIR-882 AC2600 Dual Band Wi-Fi Router',
                'description' => 'The D-Link DIR-882 is a feature-rich dual-band Wi-Fi router that delivers high-speed wireless connectivity. It offers advanced QoS, MU-MIMO technology, and a user-friendly interface for seamless network management.',
                'price' => 11000.00,
                'old_price' => 12399.00,
                'brand' => 'D-Link',
                'quantity' => 11,
                'is_sold' => 0,
                'popularity_status' => 'New',
                'category_id' => 21
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
