<?php

namespace TW\PazarYeri\Trendyol\Services;

use TW\PazarYeri\Trendyol\Helper\Request;

Class BrandService extends Request
{

	/**
	 *
	 * Default API Url Adresi
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 * @var string
	 *
	 */
	public $apiUrl = 'https://api.trendyol.com/sapigw/brands';

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
	 * createProduct servisine yapılacak isteklerde gönderilecek brandId bilgisi bu servis kullanılarak alınacaktır.
	 * Bir sayfada en fazla 500 adet brand bilgisi alınabilmektedir.
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 * @param string $degisken
	 * @return string 
	 *
	 */
	public function getBrands($size = 100, $pageId = 0)
	{
		$this->setApiUrl($this->apiUrl);
		return $this->getResponse(true, array('page' => $pageId, 'size' => $size), false);
	}

	/**
	 *
	 * Marka araması yapmak için kullanılır.
	 * BÜYÜK / küçük harf ayrımına dikkat etmelisiniz.
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 * @param string $degisken
	 * @return string 
	 *
	 */
	public function getBrandByName($brandName)
	{
		$this->setApiUrl($this->apiUrl . '/by-name');
		return $this->getResponse(true, array('name' => $brandName), false);
	}

}