<?php
namespace AHT\Training\Controller\Student;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;

class Index extends \Magento\Framework\App\Action\Action
{
    /** @var  \Magento\UrlRewrite\Model\UrlRewriteFactory*/
    protected $_urlRewriteFactory;

    protected $resultRedirectFactory;

    /** @var \Magento\Framework\App\Config\ScopeConfigInterface */
    protected $scopeConfig;

    /** @var  \Magento\Framework\View\Result\PageFactory*/
    protected $resultPageFactory;

    /** @var  \AHT\Training\Model\ResourceModel\Student\CollectionFactory*/
    protected $studentCollection;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \AHT\Training\Model\ResourceModel\Student\CollectionFactory $studentCollection,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory
        )
    {

        $this->scopeConfig = $scopeConfig;
        $this->studentCollection = $studentCollection;
        $this->_urlRewriteFactory = $urlRewriteFactory;
        $this->resultPageFactory = $resultPageFactory;

        parent::__construct($context);
    }

    public function execute()
    {
        $student_index_url = $this->scopeConfig->getValue('training/seo_training/student_index_url',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);
        $postfix_url = $this->scopeConfig->getValue('training/seo_training/postfix_url',\Magento\Store\Model\ScopeInterface::SCOPE_STORE);

        $collection = $this->studentCollection->create();
        foreach ($collection as $coll) {
            $id = $coll->getId();
            $slug = $coll->getSlug();
//            $this->rewriteurl($slug,$id,$student_index_url,$postfix_url);
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
    function rewriteurl($slug,$id,$student_index_url,$postfix_url)
    {
        $urlRewriteModel = $this->_urlRewriteFactory->create();
        /* set current store id */
//        $urlRewriteModel->setStoreId(1);
        /* this url is not created by system so set as 0 */
        $urlRewriteModel->setIsSystem(0);
        /* unique identifier - set random unique value to id path */
        $urlRewriteModel->setIdPath(rand(1, 100000));
        /* set actual url path to target path field */
        $urlRewriteModel->setTargetPath("student/student/details/?ids=".$id);
        /* set requested path which you want to create */
        $urlRewriteModel->setRequestPath($student_index_url.'/'.$slug.''.$postfix_url);
        /* set current store id */
        $urlRewriteModel->save();
    }

}
