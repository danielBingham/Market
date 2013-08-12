<?PHP
namespace danielBingham\Ecommerce\Model;


/**
 * Represents a category of products defined by
 * the site administrator.
 */
class Category extends Identified {

	/**
	 * The name of this category.
	 *
	 * @type	string
	 */
	public $name = '';

	/**
	 * An image that is associated with this category.
	 *
	 * @type	Image
	 */
	protected $image = null;

	/**
	 * A getter for the Image property, because we need
	 * to control its type.
	 *
	 * @return	Image	The image assigned to this category.
	 */
	public function getImage() 
	{
		return $this->image;
	}

	/**
	 * A setter for the image property to enforce its type.
	 *
	 * @param	Image	$image	The image to set on this category.
	 *
	 * @return	$this
	 */
	public function setImage(Image $image) 
	{
		$this->image = $image;
		return $this;
	}
}
