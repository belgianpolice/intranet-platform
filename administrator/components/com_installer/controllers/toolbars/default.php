<?php
/**
 * @version     $Id: default.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Installer
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Installer Toolbar Class
 *
 * @author      Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Installer
 */
class ComInstallerControllerToolbarDefault extends ComDefaultControllerToolbarDefault
{
    /**
     * Uninstall toolbar command, same as delete but with different label
     * 
     * @param   object  A KControllerToolbarCommand object
     * @return  void
     */
    protected function _commandDelete(KControllerToolbarCommand $command)
    {
        $command->icon  = 'icon-32-delete'; 
        $command->label = 'Uninstall';

        $command->append(array(
            'attribs' => array(
                'data-action' => 'delete'
            )
        ));
    }
}