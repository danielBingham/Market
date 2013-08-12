<?PHP
namespace DanielBingham\Ecommerce\Service;

class PagingService {
	public $number_per_page = 1;

	protected $item_view = null;
	protected $entity_name = null;

	private $factory = null;
	private $query = null;

	public function __construct(Factory $factory, $entity_name, $item_view)
	{
		$this->factory = $factory;
	
		$this->entity_name = $entity_name;
		$this->item_view = $item_view;

		$this->query = $this->factory->getQuery($this->entity_name);
	}

	public function with($entity_name)
	{
		$this->query->with($entity_name);
	}

	public function filter($filter)
	{
		$this->query->filter($filter);
	}

	public function getPage($page)
	{
		$total = $this->query->count();
		$entities = $this->query->offset($page*$this->number_per_page)
						->limit($this->number_per_page)
						->execute();

		$total_pages = $total/$number_of_pages;
		$total_pages += ($total % $number_of_pages === 0 ? 1 : 0);

		$variables = array(
			'page' => $page,
			'total_pages' => $total_pages
		);
		$pager_view = $this->factory->getViewHandler()->load('pager', $variables);
	
		$item_views = array();
		foreach ($entities as $entity) {
			$variables = array($this->entity_name => $entity);
			$item_views[] = $this->factory->getViewHandler()->load($this->item_view, $variables);	
		}

	}

}
