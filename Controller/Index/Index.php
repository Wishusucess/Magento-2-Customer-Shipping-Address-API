<?php
/**
*
* Developer: Hemant Singh Magento Certified Developer
* Category:  Wishusucess_ShippingAddress
* Website:   http://www.wishusucess.com/
*/
namespace Wishusucess\ShippingAddress\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action {

  /** @var \Magento\Framework\View\Result\PageFactory  */
      protected $resultPageFactory;
      protected $_customerFactory;
      protected $_addressFactory;
      protected $_data;
    
       
      public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\CustomerFactory $customerFactory,
        \Magento\Customer\Model\AddressFactory $addressFactory,
        array $data = []
    ) {
        $this->_customerFactory = $customerFactory;
        $this->_data = $data;
        parent::__construct($context);
    }
    
       public function execute() {
           $customerId=41;
           $customer = $this->_customerFactory->create()->load($customerId);    //insert customer id

           //billing
           $billingAddressId = $customer->getDefaultBilling();
           $billingAddress = $this->_addressFactory->create()->load($billingAddressId);
           
           
           //shipping
           $shippingAddressId = $customer->getDefaultShipping();
           $shippingAddress = $this->_addressFactory->create()->load($shippingAddressId);
            

            echo "<pre>";

            print_r($customer->getData());

            echo "------------------------";
            // print_r($shippingAddress->getData());

                   die();
                          
        }
                      
 }