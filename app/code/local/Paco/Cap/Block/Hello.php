
<?php
class Paco_Cap_Block_Hello extends Mage_Core_Block_Template
{
	public function getName()
	{
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

    //OBTIENE ORDENES FILTRADAS POR USUARIO
	public function getUsuarios()
	{

		$name = $this->getRequest()->getParam('name');
		$orders= Mage::getModel('sales/order')	
		->getCollection()
		->addAttributeToSelect('*')
		->addFieldToFilter('customer_firstname', $name); 
 
		if($orders ->count())
		{
			foreach($orders as $order)
			{
				echo '<pre>'; print_r($order->getIncrementId());
				echo '<pre>'; print_r($order->getCustomerName());
			}
		}
	}
}
