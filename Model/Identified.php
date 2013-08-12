<?PHP
namespace danielBingham\Ecommerce\Model;

/**
 * Many Model Entity need to be uniquely ided in some way.  To do this
 * we have them extend Identified, we assigns them an integer ID.
 */
class Identified {
	
	/**
	 * An integer identifier, used to ID this
	 * model entity.
	 *
	 * @type	int
	 */
	public $id = null;
}
