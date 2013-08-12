<?PHP
namespace danielBingham\Ecommerce\Models;

/**
 * A model representing a Producer of some products sold in the market.
 */
class Producer {

	/**
	 * The name of this Producer.
	 *
	 * @example 'Hidden Valley Farm'
	 *
	 * @type	string
	 */
	public $name = '';
	
	/**
	 * A paragraph description of this Producer.
	 *
	 * @example	'Hidden Valley Farm is a small organic farm that lies tucked
	 * 			away in the greens growing region of Endor.'
	 *
	 * @type	string
	 */
	public $description = '';

	/**
	 * Images of this producer's facility or the producer him/herself.  Managed
	 * by getter and setters to maintain type.
	 *
	 * @type array[Image]
	 */	
	protected $images = array();
	
	/**
	 * The owner of this producer's profile.  Managed by setters and getters to
	 * maintain type.
	 * 
	 * @type User
	 */
	protected $owner = null;
	
	/**
	 * The Products that this Producer sells through the market.  Managed by
	 * setters and getters to maintain type.
	 *
	 * @type	array[Product]
	 */
	protected $products = array();

	/**
	 * Get the owner and manager of this Producer's profile.
	 *
	 * @return	User	The owner of this Producer's profile.
	 */
	public function getOwner()
	{
		return $this->owner;
	}

	/**
	 * Set the owner of this Producer's profile.
	 *
	 * @param	User	$owner	 The user who owns and manages this profile.
	 *
	 * @return	$this
	 */
	public function setOwner(User $owner) 
	{
		$this->owner = $owner;
		return $this;
	}

	/**
	 * Get the images of the producer or their facility.
	 *
	 * @return	array[Image]	The images of this producer/producer's facility.
	 */
	public function getImages() 
	{
		return $this->images;
	}

	/**
	 * Set the images of this producer/producer's facility.
	 *
	 * @param	array[Image]	$images	The Images to set.
	 *
	 * @return	$this
	 */
	public function setImages(array $images)
	{
		foreach($images as $image) {
			if ( ! ($image instanceof Image)) {
				throw new RuntimeException('Farm::setImages() expects an array of Image.');
			}
		}

		$this->images = $images;
		return $this;	
	}

	/**
	 * Add an image to this Producer.
	 *
	 * @param	Image	$image	The image to ad to this Producer.
	 *
	 * @return	$this
	 */
	public function addImage(Image $image)
	{
		$this->images[$image->id] = $image;
		return $this;
	}

	public function removeImage(Image $image)
	{
		unset($this->images[$image->id]);
		return $this;
	}

	public function getProducts()
	{
		return $this->products;
	}

	public function setProducts(array $products)
	{
		foreach($products as $product) {
			if ( ! ($product instanceof Product)) {
				throw new RuntimeException('An array of Products is expected, but a mixed array was passed.');
			}
		}
	
		$this->products = $products;
		return $this;
	}	

	public function addProduct(Product $product)
	{
		$this->products[$product->id] = $product;
		return $this;
	}

	public function removeProduct(Product $product)
	{
		unset($this->products[$product->id]);
		return $this;
	}
	
}
