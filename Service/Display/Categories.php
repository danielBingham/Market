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
		
		$paged_view = $this->getPage('Category', 'categories/item', 8, $filters);
		$this->factory->getView()->layout($paged_view);
	}

	/**
	 *
	 */
	protected function single($id = null)
	{
		if ($id === null) {
			$id = $this->factory->getRequest()->get('id');	
		}

		$productDisplay = new ProductDisplayService($this->factory);
		$productDisplay->page(array('category = :id' => array('id' => $id)));
	}

}
