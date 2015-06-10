
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

<<<<<<< HEAD
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
=======
		$params = $this->getRequest()->getParams();
		$customer = Mage::getModel('customer/customer')->load($params['id']);
		echo $customer->getName();
>>>>>>> 2c0b3f456b9db40308b9c302504dae22a92f23ec
    }

}