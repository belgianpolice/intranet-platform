<?php
/**
 * @version		$Id: activity.php 1485 2012-02-10 12:32:02Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Components
 * @subpackage  Activities
 * @copyright	Copyright (C) 2010 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Log Template Helper Class
 *
 * @author      Israel Canasa <http://nooku.assembla.com/profile/israelcanasa>
 * @category	Nooku
 * @package    	Nooku_Components
 * @subpackage 	Activities
 */

class ComActivitiesTemplateHelperActivity extends KTemplateHelperDefault implements KServiceInstantiatable
{
	/**
	 * Check for overrides of the helper
	 *
	 * @param KConfigInterface $config
	 * @param KServiceInterface $container
	 * @return ComActivitiesTemplateHelperActivity
	 * @internal param An $object optional KConfig object with configuration options
	 * @internal param A $object KServiceInterface object
	 */
    public static function getInstance(KConfigInterface $config, KServiceInterface $container)
    {
        $identifier = clone $config->service_identifier;
        $identifier->package = $config->row->package;
       
        $identifier = $container->getIdentifier($identifier);
        
        if(file_exists($identifier->filepath)) {
            $classname = $identifier->classname;    
        } else {
            $classname = $config->service_identifier->classname;
        }
        
        $instance  = new $classname($config);               
        return $instance;
    }

	/**
	 * @param array $config
	 * @return string
     */
	public function message($config = array())
	{
	    $config = new KConfig($config);
		$config->append(array(
			'row'      => ''
		));
	
		$row  = $config->row;

		$item = $this->getTemplate()->getView()->createRoute('option='.$row->type.'_'.$row->package.'&view='.$row->name.'&id='.$row->row);
		$user = $this->getTemplate()->getView()->createRoute('option=com_users&view=user&id='.$row->created_by); 

		$message   = '<a href="'.$user.'">'.$row->created_by_name.'</a>'; 
		$message  .= ' <span class="action">'.$row->status.'</span>';
       
		if ($row->status != 'deleted') {
			$message .= ' <a href="'.$item.'">'.$row->title.'</a>';
		} else {
			$message .= ' <span class="ellipsis" class="deleted">'.$row->title.'</span>';
		}
		
		$message .= ' <span class="ellipsis" class="package">'.$row->name.'</span>'; 
		
		return $message;
	}
}