<?php
/**
 * @version     $Id: author.php 1638 2011-06-07 23:00:45Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Author Element Class
 *
 * @author      Gergo Erdosi <http://nooku.assembla.com/profile/gergoerdosi>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 */

class JElementAuthor extends JElement
{
    var $_name = 'Author';

    /**
     * @param $name
     * @param $value
     * @param $node
     * @param $control_name
     * @return bool|mixed
     */
    function fetchElement($name, $value, &$node, $control_name)
    {
        return JHTML::_('list.users', $control_name.'['.$name.']', $value);
    }
}