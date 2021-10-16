<?php
/**
*
* Developer: Hemant Singh Magento Certified Developer
* Category:  Wishusucess_ShippingAddress
* Website:   http://www.wishusucess.com/
*/
namespace Wishusucess\ShippingAddress\Api;

interface CustomInterface
{
    /**
     * GET for Post api
     * @param string $customerId Customer id.
     * @return boolean|array
     */

    public function getPost($customerId);
}