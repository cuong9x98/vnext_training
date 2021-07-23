<?php
namespace AHT\Training\Model;

use \AHT\Training\Api\Data\StudentInterface;

class Student extends \Magento\Framework\Model\AbstractModel implements \AHT\Training\Api\Data\StudentInterface
{

    /**
     * Undocumented function
     *
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource=null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection=null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
    /**
     * @return void
     */

	public function _construct()
	{
		$this->_init('AHT\Training\Model\ResourceModel\Student');
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getName() {
        return $this->getData("name");
    }
    /**
     * Undocumented function
     *
     * @return int
     */
    public function getGender() {
        return $this->getData("gender");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getDob() {
        return $this->getData("dob");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getAddress() {
        return $this->getData("address");
    }
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getSlug() {
        return $this->getData("slug");
    }
    /**
     * Undocumented function
     *
     * @return date
     */
    public function getCreatedAt() {
        return $this->getData("created_at");
    }
    /**
     * Undocumented function
     *
     * @return date
     */
    public function getUpdatedAt() {
        return $this->getData("updated_at");
    }

    public function setName($name) {
        return $this->setData("name", $name);
    }
    /**
     * Undocumented function
     *
     * @param int
     * @return null
     */
    public function setGender($gender){
        return $this->setData("gender", $gender);
    }
    /**
     * Undocumented function
     *
     * @param string dob
     * @return null
     */
    public function setDob($dob) {
        return $this->setData("dob", $dob);
    }

    /**
     * Undocumented function
     *
     * @param string $address
     * @return null
     */
    public function setAddress($address) {
        return $this->setData("address", $address);
    }

    public function setSlug($slug) {
        return $this->setData("slug", $slug);
    }
}
