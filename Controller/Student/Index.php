<?php
namespace AHT\Training\Controller\Student;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $resultRedirectFactory;

    protected $_forwardFactory;

    protected $scopeConfig;
    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;
    /**      * @param \Magento\Framework\App\Action\Context $context      */

    protected $storeManager;
    /**
     * @var TransportBuilder
     */
    protected $transportBuilder;

    protected $studentCollection;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\Framework\Controller\Result\ForwardFactory $forwardFactory,
        \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory,

        TransportBuilder $transportBuilder,
        StoreManagerInterface $storeManager,
        \AHT\Training\Model\ResourceModel\Student\CollectionFactory $studentCollection
        )
    {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->_forwardFactory = $forwardFactory;
        $this->scopeConfig = $scopeConfig;
        $this->resultPageFactory = $resultPageFactory;

        $this->transportBuilder = $transportBuilder;
        $this->studentCollection = $studentCollection;
        $this->storeManager = $storeManager;

        parent::__construct($context);
    }
    /**
     * Blog Index, shows a list of recent blog posts.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $currentDate = date('m-d');
        $collection = $this->studentCollection->create();
        foreach ($collection as $coll) {
            $time = $coll->getDob();
            $date =  substr($time,5,5);
            if ($currentDate==$date){
                $customerName = $coll->getName();
                $customerEmail = $coll->getEmail();
                $this->sendData($customerName,$customerEmail);
            }
        }

        $check = $this->scopeConfig->getValue('training/general_training/enable',\Magento\Store\Model\ScopeInterface::SCOPE_WEBSITE);
        if ($check==1) {
            $resultRedirect = $this->resultRedirectFactory->create();
            $resultRedirect->setPath('noRoute');
            return $resultRedirect;
        }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->prepend(__('All Students'));
        return $resultPage;


    }
    public function sendData($customerName,$customerEmail)
    {
        //-------------------------------------Send email
        $receiverInfo = [
            'name' => $customerName,
            'email' => $customerEmail,
        ];

        $store = $this->storeManager->getStore();

        $templateParams = ['store' => $store, 'administrator_name' => $receiverInfo['name']];

        $transport = $this->transportBuilder->setTemplateIdentifier(
            'question_pending_question_email_template'
        )->setTemplateOptions(
            ['area' => 'frontend', 'store' => $store->getId()]
        )->addTo(
            $receiverInfo['email'], $receiverInfo['name']
        )->setTemplateVars(
            $templateParams
        )->setFrom(
            'general'
        )->getTransport();
        $transport->sendMessage();
        //---------------------------------------End send email
    }

}
