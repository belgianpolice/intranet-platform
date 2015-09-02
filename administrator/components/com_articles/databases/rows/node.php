<?php
/**
 * @version     $Id: node.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Node Database Row Class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 */

class ComArticlesDatabaseRowNode extends KDatabaseRowAbstract
{
    /**
     * Nodes object or identifier (com://APP/COMPONENT.rowset.NAME)
     *
     * @var string|object
     */
    protected $_children = null;
 	
    /**
     * Node object or identifier (com://APP/COMPONENT.rowset.NAME)
     *
     * @var string|object
     */
 	protected $_parent   = null;

	/**
	 * Initializes the options for the object
	 *
	 * Called from {@link __construct()} as a first step of object instantiation.
	 *
	 * @param KConfig $config
	 * @internal param An $object optional KConfig object with configuration options.
	 */
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'children'  => null,
            'parent'	=> null,
        ));

        parent::_initialize($config);
    }

	/**
	 * Insert a row into the rowset
	 *
	 * The row will be stored by it's identity_column if set or otherwise by
	 * it's object handle.
	 *
	 * @param KDatabaseRowInterface $node
	 * @return KDatabaseRowsetAbstract
	 * @internal param A $object KDatabaseRow object to be inserted
	 */
	public function insertChild(KDatabaseRowInterface $node)
 	{
 		//Track the parent
 		$node->setParent($this);
 		 		
 		//Insert the row in the rowset
 		$this->getChildren()->insert($node);
 		
 		return $this;
 	}
 	
	public function hasChildren()
	{
		return (boolean) count($this->_children);
	}

	/**
     * Get the children rowset
     *
     * @return	object
     */
	public function getChildren()
	{
		if(!($this->_children instanceof KDatabaseRowsetInterface))
        {
            $identifier         = clone $this->getIdentifier();
            $identifier->path   = array('database', 'rowset');
            $identifier->name   = KInflector::pluralize($this->getIdentifier()->name);
            
            //The row default options
            $options  = array(
                'identity_column' => $this->getIdentityColumn()
            );
               
            $this->_children = $this->getService($identifier, $options); 
        }
        
	    return $this->_children;
	}
	
	/**
     * Get the parent node
     *
     * @return	object
     */
	public function getParent()
	{
		return $this->_parent;
	}

	/**
	 * Set the parent node
	 *
	 * @param $node
	 * @return ComArticlesDatabaseRowNode
	 */
	public function setParent( $node )
	{
		$this->_parent = $node;
		return $this;
	}
}