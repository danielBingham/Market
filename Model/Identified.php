<?PHP
namespace danielBingham\Ecommerce\Model;

/**
 * Many Model Entities need to be uniquely identified in some way.  To do this
 * we have them extend Identified which assigns them an integer ID.
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
