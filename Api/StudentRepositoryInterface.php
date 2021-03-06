<?php
/**
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AHT\Training\Api;

/**
 * @api
 * @since 100.0.2
 */
interface StudentRepositoryInterface
{
    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \AHT\Training\Api\Data\StudentSearchResultInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

   /**
     * Undocumented function
     *
     * @param string $qaId
     * @return null
     */
    public function get($qaId);

    /**
     * Undocumented function
     *
     *
     * @return \AHT\Training\Model\Student $qa
     */
    public function save(\AHT\Training\Api\Data\StudentInterface $qa);


    /**
     * Update post
     *
     * @param String $id
     * @param \AHT\Training\Api\Data\StudentInterface $post
     *
     * @return null
     */
    public function updatePost(String $qaId, \AHT\Training\Api\Data\StudentInterface $post);


      /**
     * Delete Student.
     *
     * @param \AHT\Training\Api\Data\CategoryInterface $delete
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */

     /**
     * Delete Post by ID.
     *
     * @param string $postId
     * @return \AHT\Training\Api\Data\StudentInterface
     */
    public function deleteById($postId);
}
