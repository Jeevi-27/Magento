<?php
declare(strict_types=1);

namespace Learning\ProxyExample\Model\FeaturedProducts;

interface FeaturedProductsInterface
{


    public function getFeaturedProducts(): array;
    
    public function count(): int;
}

?>