<?php
declare(strict_types=1);

namespace Learning\ProxyExample\Model;
use Learning\ProxyExample\Model\FeaturedProducts\FeaturedBySales;
use Learning\ProxyExample\Model\FeaturedProducts\FeaturedByCategory;
class FeaturedProducts 
{

    protected FeaturedBySales $featuredBySales;

    protected FeaturedByCategory $featuredByCategory;

    public function __construct(FeaturedBySales $featuredBySales,FeaturedByCategory $featuredByCategory){

        $this->featuredBySales = $featuredBySales;

        $this->featuredByCategory = $featuredByCategory;


    }

    public function getFeaturedProducts():array
    {

        if($this->featuredByCategory->count() < 6)
        {
            return $this->featuredBySales->getFeaturedProducts();
        }

        return $this->featuredByCategory->getFeaturedProducts();
    }

}

?>