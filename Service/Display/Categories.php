<?PHP
namespace DanielBingham\Ecommerce\Service\Display;

class CategoriesDisplayService extends DisplayService {
	private $factory = null;

	/**
	 *
	 */
	public function __construct(Factory $factory)
	{
		parent::__construct($factory);
	}

	/**
	 *
	 */
	protected function page(array $filters=array())
	{
		if (empty ($filters)) {
			$filters = $this->parseFilter();
		}
	
		$pager = new PagingService('Category', 'categories/item');
		$pager->number_per_page = 8;	

		foreach($filters as $filter=>$parameters) {
			$pager->filter($filter,$parameters);
		}		

		return $pager->getPage();
	}

	/**
	 *
	 */
	protected function single($id = null)
	{
		if ($id === null) {
			$id = $this->factory->getRequest()->get('id');	
		}

		$product_display = new ProductDisplayService($this->factory);
		$product_page_view = $product_display->page(array('category = :id' => array('id' => $id)));
	}

}
