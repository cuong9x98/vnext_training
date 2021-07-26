<?php
namespace AHT\Training\Api\Data;

/**
 * Factory class for @see \AHT\Training\Api\Data\StudentSearchResultInterface
 */
interface StudentSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \AHT\Training\Api\Data\StudentInterface[]
     */
    public function getItems();

    /**
     * @param \\AHT\Training\Api\Data\StudentInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
