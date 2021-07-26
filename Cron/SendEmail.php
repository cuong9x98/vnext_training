<?php
namespace AHT\Training\Cron;

use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Store\Model\StoreManagerInterface;

class SendEmail
{
    /**
     * @var DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var BlockFactory
     */
    private $questionFactory;

    /**
     * @var BlockRepositoryInterface
     */
    private $blockRepository;
    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;
    /**
     * @var TransportBuilder
     */
    protected $transportBuilder;

    protected $studentCollection;


    /**
     * @param Context $context
     * @param Registry $coreRegistry
     * @param DataPersistorInterface $dataPersistor
     * @param BlockFactory|null $blockFactory
     * @param BlockRepositoryInterface|null $blockRepository ,
     *
     */


    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        TransportBuilder $transportBuilder,
        StoreManagerInterface $storeManager,
        \AHT\Training\Model\ResourceModel\Student\CollectionFactory $studentCollection
    )
    {
        $this->transportBuilder = $transportBuilder;
        $this->studentCollection = $studentCollection;
        $this->storeManager = $storeManager;

    }

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
