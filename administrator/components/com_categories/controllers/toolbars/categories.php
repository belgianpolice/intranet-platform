<?php
/**
 * @version     $Id: categories.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Categories
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Categories Toolbar Class
 *
 * @author      John Bell <http://nooku.assembla.com/profile/johnbell>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Categories   
 */
class ComCategoriesControllerToolbarCategories extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addSeparator()    
			 ->addEnable(array('label' => 'publish'))
			 ->addDisable(array('label' => 'unpublish'));
	    
        return parent::getCommands();
    }

    /**
     * @param KControllerToolbarCommand $command
     * @throws KObjectException
     */
    protected function _commandNew(KControllerToolbarCommand $command)
    {
        $option  = $this->getIdentifier()->package;
		$view	 = KInflector::singularize($this->getIdentifier()->name);
		$section = $this->getController()->getModel()->get('section');
		
        $command->attribs->href = JRoute::_('index.php?option=com_'.$option.'&view='.$view.'&section='.$section ); 
    }
}