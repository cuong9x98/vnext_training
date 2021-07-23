<?php
namespace AHT\Training\Model\ResourceModel;

class Student extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
    protected function _construct() 
    {
        $this->_init('students', 'entity_id');
    }
}
