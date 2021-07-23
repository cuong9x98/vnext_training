<?php
namespace AHT\Training\Model;

use AHT\Training\Model\StudentFactory;
use AHT\Training\Model\ResourceModel\Student;
use AHT\Training\Api\Data\StudentInterface;
use AHT\Training\Model\ResourceModel\Student as Resource;

class StudentRepository implements \AHT\Training\Api\StudentRepositoryInterface {

    protected $resource;
    protected $_studentFactory;
    protected $_studentResource;
    protected $_request;
    public function __construct(
        Resource  $resource,
        StudentFactory $studentFactory,
        Student $studentResource,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->resource = $resource;
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
    public function getList() {
        $collection = $this->_studentFactory->create()->getCollection();
        return $collection->getData();
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