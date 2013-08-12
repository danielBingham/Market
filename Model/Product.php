<?PHP
namespace danielBingham\Ecommerce\Model;

/**
 * A Product being offered for sale in the market.
 */
class Product extends Identified {
	
	/**
	 * This Product's name.  
	 *
 	 * @example 	"Brandywine Tomato"
	 *
 	 * @type	string
	 */
	public $name = '';
	 
	/**
	 * This Product's paragraph description.
	 *
	 * @example		"A large, mildly flavored heirloom tomato.  Great for
	 * 				slicing into a salad, frying or making into a sauce."
	 *
 	 * @type	string
 	 */
	public $description = '';
	
	/**
	 * The price of one Unit of this Product.
	 *
	 * @example	2.50 (per pound)
	 *
	 * @type	float with 2 decimal's precision (currency)
	 */
	public $price = 0.0;
	
	/**
	 * The number of Units of this Product available for sale.
	 *
	 * @example	200 (pounds)
	 * 
	 * @type	int
	 */
	public $amount_available = 0;

	/**
	 * The category this Product belongs to.  Managed by setters and getters
	 * in order to maintain type.
	 *
	 * @example	$category = new Category();
	 * 			$category->name = 'Tomatoes';
	 * 			$product->setCategory($category);
	 *
	 * @type	Category
	 */
	protected $category = null;
	
	/**
	 * The Unit this Product is measured by.  Managed by setters and getters
	 * in order to maintain type.
	 *
	 * @example	$unit = new Unit();
	 * 			$unit->name = 'pound';
	 * 			$unit->abbreviation = 'lb';
	 * 			$product->setUnitMeasuredBy($unit);
	 * 
	 * @type	Unit
	 */
	protected $unit_measured_by = null;
	
	/**
	 * The Farm that is selling this product.  Managed by setters and getters
	 * in order to maintain type.
	 *
	 * @example	$farm = new Farm();
	 * 			$farm->name = 'Wayward Yank\'s Farm';
	 * 			$farm->description = 'A small organic farm.'
	 * 			$product->setFarm($farm);
	 * 
	 * @type	Farm
	 */
	protected $farm = null;

	/**
	 * Get the category that this Product belongs to.
	 *
	 * @return	Category	The category this which this Product belongs.
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * Set the category that this Product belongs to.
	 *
	 * @param	Category	$category	The category that this Product belongs
	 * 									to.
	 * 
	 * @return	$this
 	 */
	public function setCategory(Category $category)
	{
		$this->category = $category;
		return $this;
	}

	/**
	 * Get the unit being used to measure this Product.
	 *
	 * @return	Unit	The unit used to measure this Product.
	 */
	public function getUnitMeasuredBy()
	{
		return $this->unit_measured_by;
	}

	/**
	 * Set the unit that is used to measure this Product.  Could be
	 * pounds, bags or "tomatoes".
	 *
	 * @param	Unit	$unit	The unit used to measure this Product.
	 *
	 * @return	$this
	 */
	public function setUnitMeasuredBy(Unit $unit)
	{
		$this->unit_measured_by = $unit;
		return $this;
	}

	/**
	 * Get the Farm that is offering this Product for sale.
	 *
	 * @return Farm	The Farm offering this Product for sale.
	 */
	public function getFarm()
	{
		return $this->Farm;
	}

	/**
	 * Set the Farm that is offering up this Product.
	 *
	 * @param	Farm	$farm	The Farm offering this Product for sale.
	 *
	 * @return	$this
	 */
	public function setFarm(Farm $farm)
	{
		$this->Farm = $farm;
		return $this;
	}

}
