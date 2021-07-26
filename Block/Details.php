<?php
namespace AHT\Training\Block;

use Magento\Framework\View\Element\Template\Context;

class Details extends \Magento\Framework\View\Element\Template
{
    protected $student_factory;

    protected $_studentResource;

    public function __construct(
        Context $context,
        \AHT\Training\Model\StudentFactory $student_factory,
        \AHT\Training\Model\ResourceModel\Student $studentResource
    )
    {
        $this->_studentResource = $studentResource;
        $this->student_factory = $student_factory;
        parent::__construct($context);
    }


    public function getDetails()
    {
        $student =$this->getRequest()->getParam('ids');
        $result = $this->student_factory->create()->load($student);
        return $result;
    }
}
