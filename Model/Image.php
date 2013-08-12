<?PHP
namespace danielBingham\Ecommerce\Model;

class Image {
	public $height = 0;
	public $width = 0;
	
	private $owner = null;

	public function __construct() {}

	public function getOwner() {
		return $this->owner;
	}

	public function setOwner(User $owner) {
		$this->owner = $owner;
		return $this;
	}
}
