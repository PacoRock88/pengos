
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

		$id = $this->getRequest()->getParam('id');
		$customer = Mage::getModel('customer/customer')->load($id);

		if($customer->getId())
		{
			$name='Hola '.$customer->getName();
		}

		else
		{
			$name='No existe';
		}
		
		return $name;
    }

}