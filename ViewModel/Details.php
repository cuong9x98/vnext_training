<?php
namespace AHT\Training\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\Url\Helper\Data as UrlHelper;

class Details implements ArgumentInterface
{
    /**
     * @var UrlHelper
     */
    private $urlHelper;

    public function __construct(
        UrlHelper $urlHelper,
        \AHT\Training\Model\StudentFactory $student_factory
    )
    {
        $this->student_factory = $student_factory;
        $this->urlHelper = $urlHelper;
    }

    public function getDetails()
    {
//        $student =$this->getRequest()->getParam('ids');
        $result = $this->student_factory->create()->load(2);
        return $result;
    }
}
