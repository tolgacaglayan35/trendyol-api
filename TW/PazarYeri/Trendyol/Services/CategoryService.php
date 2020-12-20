<?php

namespace TW\PazarYeri\Trendyol\Services;

use TW\PazarYeri\Trendyol\Helper\Request;

Class CategoryService extends Request
{

	/**
	 *
	 * Default API Url Adresi
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 * @var string
	 *
	 */
	public $apiUrl = 'https://api.trendyol.com/sapigw/product-categories';

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
	 * Trendyol üzerindeki bütün kategorileri getirir.
	 * createProduct servisine yapılacak isteklerde gönderilecek categoryId
	 * bilgisi bu servis kullanılarak alınacaktır.
	 * 
	 * createProduct yapmak için en alt seviyedeki kategori ID bilgisi kullanılmalıdır. 
	 * Seçtiğiniz kategorinin alt kategorileri var ise bu kategori bilgisi ile ürün aktarımı yapamazsınız.
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 * @return array 
	 *
	 */
	public function getCategoryTree()
	{
		$this->setApiUrl($this->apiUrl);
		return $this->getResponse(true, true, false);
	}

	/**
	 *
	 * Trendyol üzerindeki kategorinin özelliklerini döndürür.
	 * createProduct servisine yapılacak isteklerde gönderilecek attributes bilgileri 
	 * ve bu bilgilere ait detaylar bu servis kullanılarak alınacaktır.
	 * 
	 * createProduct yapmak için en alt seviyedeki kategori ID bilgisi kullanılmalıdır. 
	 * Seçtiğiniz kategorinin alt kategorileri var ise (leaf:true) bu kategori bilgisi ile ürün aktarımı yapamazsınız.
	 *
	 * @author Tolga Çağlayan <info@togiajans.com>>
	 * @param int $categoryId
	 * @return array 
	 *
	 */
	public function getCategoryAttributes($categoryId)
	{
		$this->setApiUrl($this->apiUrl . '/{categoryId}/attributes');
		return $this->getResponse(true, array('categoryId' => $categoryId), false);
	}

}