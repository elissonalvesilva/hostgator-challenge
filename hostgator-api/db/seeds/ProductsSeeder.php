<?php


use Phinx\Seed\AbstractSeed;

class ProductsSeeder extends AbstractSeed
{

    public function run()
    {
        $productsList = [
            [
                "id" => 5,
                "name" => "Plano P"
            ],
            [
                "id" => 6,
                "name" => "Plano M"
            ],
            [
                "id" => 335,
                "name" => "Plano Turbo"
            ]
        ];

        $cyclesList = [
            // plan p
            [
                "product_id" => 5,
                "type" => "monthly",
                "priceRenew" => "24.19",
                "priceOrder" => "24.19",
                "months" => 1,
            ],
            [
                "product_id" => 5,
                "type" => "semiannually",
                "priceRenew" => "128.34",
                "priceOrder" => "128.34",
                "months" => 6,
            ],
            [
                "product_id" => 5,
                "type" => "biennially",
                "priceRenew" => "393.36",
                "priceOrder" => "393.36",
                "months" => 24,
            ],
            [
                "product_id" => 5,
                "type" => "triennially",
                "priceRenew" => "561.13",
                "priceOrder" => "561.13",
                "months" => 36,
            ],
            [
                "product_id" => 5,
                "type" => "quarterly",
                "priceRenew" => "67.17",
                "priceOrder" => "67.17",
                "months" => 3,
            ],
            [
                "product_id" => 5,
                "type" => "annually",
                "priceRenew" => "220.66",
                "priceOrder" => "220.66",
                "months" => 12,
            ],
            // plan m
            [
                "product_id" => 6,
                "type" => "monthly",
                "priceRenew" => "29.69",
                "priceOrder" => "29.69",
                "months" => 1,
            ],
            [
                "product_id" => 6,
                "type" => "semiannually",
                "priceRenew" => "159.54",
                "priceOrder" => "159.54",
                "months" => 6,
            ],
            [
                "product_id" => 6,
                "type" => "biennially",
                "priceRenew" => "532.56",
                "priceOrder" => "532.56",
                "months" => 24,
            ],
            [
                "product_id" => 6,
                "type" => "triennially",
                "priceRenew" => "764.22",
                "priceOrder" => "764.22",
                "months" => 36,
            ],
            [
                "product_id" => 6,
                "type" => "quarterly",
                "priceRenew" => "82.77",
                "priceOrder" => "82.77",
                "months" => 3,
            ],
            [
                "product_id" => 6,
                "type" => "annually",
                "priceRenew" => "286.66",
                "priceOrder" => "286.66",
                "months" => 12,
            ],
            // plan turbo
            [
                "product_id" => 335,
                "type" => "monthly",
                "priceRenew" => "44.99",
                "priceOrder" => "44.99",
                "months" => 1,
            ],
            [
                "product_id" => 335,
                "type" => "semiannually",
                "priceRenew" => "257.94",
                "priceOrder" => "257.94",
                "months" => 6,
            ],
            [
                "product_id" => 335,
                "type" => "biennially",
                "priceRenew" => "983.76",
                "priceOrder" => "983.76",
                "months" => 24,
            ],
            [
                "product_id" => 335,
                "type" => "triennially",
                "priceRenew" => "1439.64",
                "priceOrder" => "1439.64",
                "months" => 36,
            ],
            [
                "product_id" => 335,
                "type" => "quarterly",
                "priceRenew" => "131.97",
                "priceOrder" => "131.97",
                "months" => 3,
            ],
            [
                "product_id" => 335,
                "type" => "annually",
                "priceRenew" => "503.88",
                "priceOrder" => "503.88",
                "months" => 12,
            ],

        ];

        $products = $this->table("products");
        $products->insert($productsList)
              ->saveData();

        $cycles = $this->table('cycles');
        $cycles->insert($cyclesList)
                 ->saveData();
        
    }
}
