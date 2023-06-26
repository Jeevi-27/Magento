<?php

declare(strict_types=1);

namespace Learning\Checkout\Block;
use Magento\Checkout\Block\Checkout\AttributeMerger;
use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Magento\Customer\Model\AttributeMetadataDataProvider;
use Magento\Eav\Api\Data\AttributeInterface;
use Magento\Ui\Component\Form\AttributeMapper;
use Magento\Framework\Exception\LocalizedException;

class LayoutProcessor implements LayoutProcessorInterface
{
    
    /**
     * @var AttributeMetadataDataProvider
     * 
     */
    private $merger;
    private $attributeMapper;
    private $attributeMetadataDataProvider;

    public function __construct(
        AttributeMetadataDataProvider $attributeMetadataDataProvider,
        AttributeMapper $attributeMapper,
        AttributeMerger $attributeMerger

    )
    {
        $this->attributeMetadataDataProvider = $attributeMetadataDataProvider;
        $this->attributeMapper = $attributeMapper;
        $this->merger = $attributeMerger;


    }

    public function process($jsLayout)
    {
       
        //load attributes from database
        $elements = $this->getAddressAttributes();
        //get field configuration of our steps
        $fields = &$jsLayout['components']['checkout']['children']['steps']['children']['contact-step']['children']['contact']['children']['contact-fieldset']['children'];

        $fieldCodes = array_keys($fields);
        $elements = array_filter($elements,function($key) use ($fieldCodes)
        {
            return in_array($key,$fieldCodes);
        }, ARRAY_FILTER_USE_KEY); 

        //merge attribute config and field config
        $fields = $this->merger->merge(
            $elements,
            'checkoutProvider',
            'contact',
            $fields
        );

        return $jsLayout;
    }

    public function getAddressAttributes() : array
    {
            $attributes = $this->attributeMetadataDataProvider->loadAttributesCollection(
                'customer_address',
                'customer_register_address'
            );
            $elements =[];
            foreach($attributes as $attribute)
            {
                $code = $attribute->getAttributeCode();
                $elements[$code] = $this->attributeMapper->map($attribute);
                if(isset($elements[$code]['label']))
                {
                    $label = $elements[$code]['label'];
                    $elements[$code]['label'] = __($label);
                }

            }
            return $elements;
    }


}

