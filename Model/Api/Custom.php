<?php
/**
*
* Developer: Hemant Singh Magento Certified Developer
* Category:  Wishusucess_ShippingAddress
* Website:   http://www.wishusucess.com/
*/
namespace Wishusucess\ShippingAddress\Model\Api;

use Psr\Log\LoggerInterface;

class Custom 
{
    /** @var \Magento\Framework\View\Result\PageFactory  */
    protected $resultPageFactory;
    protected $_customerFactory;
    protected $_addressFactory;
               
    public function __construct(
     \Magento\Framework\View\Result\PageFactory $resultPageFactory,
     \Magento\Customer\Model\CustomerFactory $customerFactory,
     \Magento\Customer\Model\AddressFactory $addressFactory,
        array $data = []
    ) {
                        $this->resultPageFactory = $resultPageFactory;
                        $this->_customerFactory = $customerFactory;
                        $this->_addressFactory = $addressFactory;

                       
           
    }

    /**
     * @inheritdoc
     */

    public function getPost($customerId)
    {
        $response = ['success' => false];

        try {
            $customer = $this->_customerFactory->create()->load($customerId);    //insert customer id

            //billing
            $billingAddressId = $customer->getDefaultBilling();
            $billingAddress = $this->_addressFactory->create()->load($billingAddressId);
            
            
            //shipping
            $shippingAddressId = $customer->getDefaultShipping();
            $shippingAddress = $this->_addressFactory->create()->load($shippingAddressId);
           
            $field_data['ShippingAddress']=$shippingAddress->getData();
            $field_data['BillingAddress']=$billingAddress->getData();

              $response= $field_data;
    //    print_r($cart);
       
            
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
        }
        $returnArray = $response;
        return $returnArray; 
    }
}