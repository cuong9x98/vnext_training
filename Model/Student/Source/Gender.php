<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AHT\Training\Model\Student\Source;

use Magento\Framework\Data\OptionSourceInterface;

/**
 * Class IsActive
 */
class Gender implements OptionSourceInterface
{
    /**
     * @var \Magento\Cms\Model\Block
     */
    protected $cmsBlock;

    /**
     * Constructor
     *
     * @param \Magento\Cms\Model\Block $cmsBlock
     */
    // public function __construct(\Magento\Cms\Model\Block $cmsBlock)
    // {
    //     $this->cmsBlock = $cmsBlock;
    // }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $availableOptions = [1 =>__('Male'), 0 =>__('Female')];
        $options = [];
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
