<?php
declare(strict_types=1);

namespace Learning\ProxyExample\ViewModel;

use Learning\ProxyExample\Model\FeaturedProducts;
use Magento\Framework\View\Element\Block\ArgumentInterface;
Class Example implements ArgumentInterface
{
    protected FeaturedProducts $featuredProducts;

    public function __construct(FeaturedProducts $featuredProducts)
    {
        $this->featuredProducts = $featuredProducts;
    }

    public function getFeaturedProducts():array
    {
         return $this->featuredProducts->getFeaturedProducts();
    }
}