<?PHP
namespace danielBingham\Ecommerce\Model;

/**
 * An order placed by a customer of the site.  Contains
 * a list of products and quantities that the customer
 * has ordered.
 */
class Order extends Identified {

	/**
	 * Indicates that this is an order that has been started, but that has not
	 * yet been completed.  Maybe they are still adding things to their cart.
	 */	
	const STATE_UNCONFIRMED = 'unconfirmed';
	 
	/**
	 * Indicates an order that has been completed, but payment was not yet
	 * successful.
	 */
	const STATE_CONFIRMED	= 'confirmed';
	
	/**
	 * An order that has been successfully paid for, but has not be assembled
	 * or delivered.
 	 */
	const STATE_PAID		= 'paid';
	
	/**
	 * Indicates an order has been placed, paid for an is assembled and ready
	 * for shipment, pickup or delivery.
	 */
	const STATE_ASSEMBLED	= 'assembled';
	 
	/**
	 * Indicates that this order has been successfully filled and placed in
	 * the consumer's hands.
	 */
	const STATE_FILLED		= 'filled';

	/**
	 * What is the status of this order?  Related
	 * to the STATE_ enum of constants.
	 *
	 * @example	$order->setState(Order::STATE_UNCONFIRMED);
	 *
	 * @type	constant (string)
	 */
	protected $state	= STATE_UNCONFIRMED;	

	/**
	 *	Date and time when the order was placed.
	 *
	 * @example	$order->setDatePlaced(new DateTime());
	 *
	 * @type	DateTime
	 */
	protected $datePlaced = null;
	
	/**
	 * User who placed this order.
	 *
	 * @type	User
	 */
	protected $orderer = null;

	/**
	 *
	 */
	protected $products = array();

	public function getState()
	{
		return $this->state;
	}

	public function setState($state)
	{
		$valid_states = array(
			STATE_UNCONFIRMED, 
			STATE_CONFIRMED, 
			STATE_PAID, 
			STATE_ASSEMBLED, 
			STATE_FILLED
		);

		if (! in_array($state, $valid_states)) {
			throw new RuntimeException('Invalid state "' . $state . '" set on Order.');
		}

		$this->state = $state;
		return $this;
	}
	
	public function getDatePlaced()
	{	
		return $this->datePlaced;
	}

	/**
	 *
	 */
	public function setDatePlaced(DateTime $datePlaced)
	{
		$this->datePlaced = $datePlaced;
		return $this;
	}

	public function getOrderer()
	{
		return $this->orderer;
	}

	public function setOrderer(User $orderer)
	{
		$this->orderer = $orderer;
		return $this;
	}

	public function getProducts()
	{
		return $this->products;
	}

	public function setProducts(array $products)
	{
		foreach($products as $product)

		$this->products = $products;
		return $this;
	}

	/**
	 * Add an amount of a Product to this Order.
	 */
	public function addProduct(Product $product, $amount)
	{
		if (isset($this->products[$product->id])) {
			$this->products[$product->id]->amount += $amount;
			return $this;
		}

		$op = new OrderedProduct();
		$op->setProduct($product);
		$op->amount = $amount;
		$this->products[$product->id] = $op;	

		return $this;
	}

	/**
	 * Remove an amount of a Product from this Order.
	 */
	public function removeProduct(Product $product, $amount)
	{
		if ( ! isset($this->products[$product->id])) {
			return $this;
		}
		
		if ($this->products[$product->id]->amount < $amount) {
			unset($this->products[$product->id]);
			return $this;
		}

		$this->products[$product->id]->amount -= $amount;
		return $this;
	}

}

/**
 *
 */
class OrderedProduct {
	public $amount = 0;

	protected $product = null;

	public function getProduct()
	{
		return $this->product;
	}

	public function setProduct(Product $product)
	{
		$this->product = $product;
		return $this;
	}
	
}
