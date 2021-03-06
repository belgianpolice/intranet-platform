<?php
/**
 * @version     $Id: executable.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * User Controller Executable Behavior 
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 */
class ComUsersControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{  
    public function canLogout()
    {
        $user = JFactory::getUser();
        
        //Allow logging out ourselves
        if($this->getModel()->id == $user->get('id')) {
             return true;
        }
        
        if($user->get('gid') > 24) {
            return true;
        }
        
        return false;
    }
}