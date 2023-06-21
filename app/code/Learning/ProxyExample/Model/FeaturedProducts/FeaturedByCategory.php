<?php
declare(strict_types=1);

namespace Learning\ProxyExample\Model\FeaturedProducts;

class FeaturedByCategory implements FeaturedProductsInterface{

    protected array $featuredProducts = [];

    public function __construct()
    {
        $this->loadFeaturedProducts();   
    }

    public function getFeaturedProducts(): array
    {
       return $this->featuredProducts;
    }

    public function count(): int
    {
        return count($this->featuredProducts);
    }

    protected function loadFeaturedProducts() : void
    {
        $this->featuredProducts = [
            'Products_1',
            'Products_2',
            'Products_3',
            'Products_4',
            'Products_5',
           // 'Products_6',
        ];
    }
    
}