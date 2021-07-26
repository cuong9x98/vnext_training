<?php
namespace AHT\Training\Model;

use AHT\Training\Model\StudentFactory;
use AHT\Training\Model\ResourceModel\Student;
use AHT\Training\Api\Data\StudentInterface;
use AHT\Training\Model\ResourceModel\Student as Resource;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use AHT\Training\Api\Data\StudentSearchResultInterface;
use AHT\Training\Model\ResourceModel\Student\CollectionFactory;

class StudentRepository implements \AHT\Training\Api\StudentRepositoryInterface {

    protected $collectionProcessor;
    protected $resource;
    protected $_studentFactory;
    protected $_studentResource;
    protected $_request;
    protected $searchResultFactory;
    protected $studentCollection;

    public function __construct(
        Resource  $resource,
        StudentFactory $studentFactory,
        Student $studentResource,
        \Magento\Framework\App\RequestInterface $request,
        StudentSearchResultInterface $studentSearchResultInterface,
        CollectionProcessorInterface $collectionProcessor,
        CollectionFactory $studentCollection
    ) {
        $this->searchResultFactory = $studentSearchResultInterface;
        $this->collectionProcessor = $collectionProcessor;
        $this->resource = $resource;
        $this->studentCollection = $studentCollection;
        $this->_studentFactory = $studentFactory;
        $this->_studentResource = $studentResource;
        $this->_request = $request;
    }

    /**
     * Undocumented function
     *
     * @param [type] $qaId
     * @return void
     */
    public function get($qaId) {
        $id = (int) $qaId;
        $model = $this->_studentFactory->create();
        $this->_studentResource->load($model, $id);
        return $model->getData();
    }

    /**
     * Undocumented function
     *
     * @return null
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->studentCollection->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultFactory->create();
//        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        return $searchResults;
    }
    /**
     * Save Block data
     *
     *
     * @return \AHT\Training\Model\Student
     */
    public function save(StudentInterface $qa) {
        $this->_studentResource->save($qa);
        return $qa->getData();
    }


    public function updatePost(String $id, StudentInterface $post)
    {
            $student_id = (int) $id;
            $model = $this->_studentFactory->create();
            $this->_studentResource->load($model, $student_id);
            $model->setData($post->getData());
            $model->setId($student_id);
            $this->_studentResource->save($model);

            return $model->getData();
    }

    public function deleteById($postId)
    {
        $id = (int) $postId;
        $model = $this->_studentFactory->create();
        $this->resource->load($model, $id);
        $model->delete();
        return true;
    }
}
