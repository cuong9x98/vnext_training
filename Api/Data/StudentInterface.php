<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AHT\Training\Api\Data;

/**
 * CMS block interface.
 * @api
 * @since 100.0.2
 */
interface StudentInterface
{
    
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getName();
    
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getGender();
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getDob();
    /**
     * Undocumented function
     *
     * @return int
     */
    public function getAddress();
    /**
     * Undocumented function
     *
     * @return int
     */
   
    public function getCreatedAt();
    /**
     * Undocumented function
     *
     * @return string
     */
    public function getUpdatedAt();
    /**
     * Undocumented function
     *
     * @return string
     */
  
   
    public function setName($name);
    /**
     * Undocumented function
     *
     * @param string $email
     * @return null
     */
    public function setGender($gender);
    /**
     * Undocumented function
     *
     * @param string $question
     * @return null
     */
    public function setDob($dob);
    /**
     * Undocumented function
     *
     * @param string $answer
     * @return null
     */
    public function setAddress($address);
    /**
     * Undocumented function
     *
     * @param int $productId
     * @return null
     */
    
}
