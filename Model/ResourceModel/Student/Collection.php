<?php
namespace AHT\Training\Model\ResourceModel\Student;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';
	protected $_eventPrefix = 'students_collection';
	protected $_eventObject = 'Student_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('AHT\Training\Model\Student', 'AHT\Training\Model\ResourceModel\Student');
	}

}