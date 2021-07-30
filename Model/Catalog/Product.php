<?php

namespace AHT\Training\Model\Catalog;

class Product extends \Magento\Catalog\Model\Product
{
    /**
     * Get product name
     *
     * @return string
     * @codeCoverageIgnoreStart
     */
    public function getName()
    {
        return $this->_getData(self::NAME).' '.$this->_getData(self::SKU);
    }
}
?>
