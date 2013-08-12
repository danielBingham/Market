<?PHP
namespace DanielBingham\Ecommerce\Transaction\Edit;

use \DanielBingham\FrameworkInterface\Transaction as Transaction;
use \DanielBingham\FrameworkInterface\Factory as Factory;

use \DanielBingham\Ecommerce\Model\Producer as Producer;

class Producer extends Transaction {
	private $factory = '';

	public function __construct(Factory $factory)
	{
		parent::__construct(array('showForm', 'processForm'));
		$this->factory = $factory;	
	}

	protected function showForm()
	{
		$id = $this->factory->getRequest()->get('id');
		if ($id === NULL) {
			$variables = array(
				'action' => $this->factory->getConfig()->get('site_url')
							. '/producer/create/process-form'	
			);
			$view = $this->factory->getViewHandler()->load('edit_producer/show_form', $variables);
			return $this->factory->getViewHandler()->layout($view);
		}

		$producer = $this->factory->getQuery('Producer')
									->filter('id = :id', array('id'=>$id))
									->execute();
	
		$variables = array(
			'action' => $this->factory->getConfig()->get('site_url')
						. '/producer/edit/' . $id . '/process-form',
			'producer' => $producer
		);
		$view = $this->factory->getViewHandler()->load('edit_producter/show_form', $variables);
		return $this->factory->getViewHandler()->layout($view);	
	}

	protected function processForm()
	{
		$producer = new Producer();
		$producer->name = $this->factory->getRequest()->post('name');
		$producer->description = $this->factory->getRequest()->post('description');
		$persistor = $this->factory->getPersistor('Producer');
		$persistor->save($producer);

		$view = $this->factory->getViewHandler()->load('edit_producer/success');
		return $this->factory->getViewHandler()->layout($view);
	}

}
