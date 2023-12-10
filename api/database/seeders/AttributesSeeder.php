<?php

namespace Database\Seeders;


use App\Models\AttributeName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributesSeeder extends Seeder
{


    public function run(): void
    {

        $product_category_arr = [
              'Chipset' => 1,
            'GPU Boost Clock' => 1,
            'Overclocked' => 1,
            'Performance Level' => 1,
            'VRAM' => 1,
            'VRAM Type' => 1,
            'Bus Width' => 1,
            'Connector' => 1,
            'HDMI' => 1,
            'miniHDMI' => 1,
            'DVI' => 1,
            'VGA' => 1,
            'Display Port' => 1 ,
            'miniDisplayPort' => 1,
            'HDCP' => 1,
            'SLI' => 1,
            'Crossfire' => 1,
            'DirectX' => 1,
            'Cooling Type' => 1,
            'Cooler Width' => 1,
            'GPU Length' => 1,
            'Low Profile' => 1,
            'Illumination' => 1,
            'Power Connector' => 1,
            'Recommended power supply' => 1,

            'CPU Series' => 2,
            'Processor Socket' => 2,
            'CPU performance' => 2,
            'CPU Cores' => 2,
            'Threads' => 2,
            'Speed' => 2,
            'CPU Turbo Speed' => 2,
            'L3 Cache' => 2,
            'Graphics integrated' => 2,
            'Packaging' => 2,
            'TDP' => 2,
            'Unlocked multiplier' => 2,
        ];
        foreach ($product_category_arr as $name => $product_category_id) {
            AttributeName::create([
                'name' => $name, 'product_category_id' => $product_category_id]);
        }




    }
}
