<?php

namespace TW\PazarYeri\Trendyol\Services;

use TW\PazarYeri\Trendyol\Helper\Request;

Class ProductService extends Request
{

	/**
	 *
	 * Default API Url Adresi
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 * @var string
	 *
	 */
	public $apiUrl = 'https://api.trendyol.com/sapigw/suppliers/{supplierId}/products';

	/**
	 *
	 * Request sınıfı için gerekli ayarların yapılması
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 *
	 */
	public function __construct($supplierId, $username, $password)
	{
		parent::__construct($this->apiUrl, $supplierId, $username, $password);
	}

	/**
	 *
	 * Trendyol üzerindeki ürünleri filtrelemek için kullanılır.
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 * @return array 
	 *
	 */
	public function filterProducts($data = array())
	{

		$query = array(
			'approved'      => '',
			'barcode'       => '',
			'startDate'     => array('format' => 'unixTime'),
			'endDate'       => array('format' => 'unixTime'),
			'page'          => '',
			'dateQueryType' => array('required' => array('CREATED_DATE' , 'LAST_MODIFIED_DATE')),
			'size'          => ''
		);

		return $this->getResponse($query, $data);
	}
}

