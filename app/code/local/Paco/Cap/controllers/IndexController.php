<?php
class Paco_Cap_IndexController extends Mage_Core_Controller_Front_Action
{


	public function indexAction()
	{
		$this->loadLayout();
		$this->renderLayout();
	}

	//OBTENER DATOS DEL CUSTOMER FILTRADOS POR AND Y OR
	public function customersAction()
	{
		//LOAD PARA ATRIBUTO (ROW)
		//COLLECTION PARA TRAER TODA LA INFO
		$customers = Mage::getModel('customer/customer')
		->getCollection()
		->addAttributeToSelect('*')
		//->addFieldToFilter('email', array('like' => '%pengo%'));
		//->addFieldToFilter('email', array('eq' => 'juan@info.com'));

		->addAttributeToFilter(array(
				array('attribute' => 'email', 'like' => '%pengo%'),
				array('attribute' => 'firstname', 'eq' => 'Juan')
			));

		echo (string)$customers->getSelect();

		if($customers ->count())
		{
			foreach($customers as $customer)
			{
				echo '<pre>'; print_r($customer->getEmail());
				echo '<pre>'; print_r($customer->getName());

			}
		}

		//echo '<pre>';
		//print_r($customers->getData());//->count();
	}


	//LEER TODAS LAS ORDENES
	public function ordersAction()
	{
		$orders = Mage::getModel('sales/order')
		->getCollection()
		->addAttributeToSelect('*');

		echo '<pre>'; print_r($orders->getData());
	}


	//ORDENES FILTRADAS POR USUARIO
	public function userordersAction()
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

	//ORDENES FILTRADAS POR STATUS PENDIENTE
	public function statusAction()
	{
		$orders = Mage::getModel('sales/order')
		->getCollection()
		->addAttributeToSelect('*')
		->addFieldToFilter('status', 'pending');

		echo '<pre>'; print_r($orders->getData());

	}

	//ORDENES CREADAS el dia de hoy
	public function createdtodayAction()
	{
		$now=date('Y-m-d');
		$orders = Mage::getModel('sales/order')
		->getCollection()
		->addAttributeToSelect('*')
		->addFieldToFilter('created_at', array('like' => $now.'%'));

		echo '<pre>'; print_r($orders->getData());
	}


	//TODOS LOS PRODUCTOS
	public function productsAction()
	{
		$products = Mage::getModel('catalog/product')
		->getCollection()
		->addAttributeToSelect('*');

		echo '<pre>'; print_r($products->getData());
	}

	//PRODUCTOS FILTRADOS POR LIKE
	public function productslikeAction()
	{
		$products = Mage::getModel('catalog/product')			
		->getCollection()
		->addAttributeToSelect('*')
		->addFieldToFilter('name', array('like' => 'A%')); //getting product model
 
		if($products ->count())
		{
			foreach($products as $producto)
			{
				echo '<pre>'; print_r($producto->getName());
			}
		}
	}
}
