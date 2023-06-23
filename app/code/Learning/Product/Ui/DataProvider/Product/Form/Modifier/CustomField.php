<?php

namespace Learning\Product\Ui\DataProvider\Product\Form\Modifier;
use Magento\Catalog\Model\Locator\LocatorInterface;
use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Ui\Component\Form\Element\DataType\Text;
use Magento\Ui\Component\Form\Element\Input;
class CustomField extends AbstractModifier
{
    private $locator;

    public function __construct(
        LocatorInterface $locator
    ) {
        $this->locator = $locator;
    }

    public function modifyData(array $data)
    {
        $product   = $this->locator->getProduct();
        $productId = $product->getId();
        $data = array_replace_recursive(
            $data, [
                $productId => [
                    'magenest' => [
                        'textField' => 'Magenest Welcome',
                        'status'=> 1
                    ]
                ]
            ]);
        return $data;
        //Note:- Array Depends on your datascrope string value which one you defined at product_form.xml UI component file...
        //in my case, I defined <item name="dataScope" xsi:type="string">data.product</item> like this in UI component .xml file that's why I use that array format, you have to change according to your case
        
    }

    public function modifyMeta(array $meta)
    {
        return $meta;
    }
}
