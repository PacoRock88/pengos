
<?php
class Paco_Cap_Block_Hello extends Mage_Core_Block_Template
{
	public function getName()
	{
		/*$id=Mage::app()->getRequest()->getParam('id');

		$_customer = Mage::getModel('customer/customer')->getCollection()
		->addAttributeToSelect('name')
		->addAttributeToFilter('customer_id', $id)
		->load();

		echo $customer>getName();*/

		$params = $this->getRequest()->getParams();
		$customer = Mage::getModel('customer/customer')->load($params['id']);
		echo $customer->getName();
    }

}