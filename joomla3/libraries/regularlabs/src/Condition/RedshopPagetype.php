<?php
/**
 * @package         Regular Labs Library
 * @version         23.3.19307
 * 
 * @author          Peter van Westen <info@regularlabs.com>
 * @link            http://regularlabs.com
 * @copyright       Copyright © 2023 Regular Labs All Rights Reserved
 * @license         http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

namespace RegularLabs\Library\Condition;

defined('_JEXEC') or die;

/**
 * Class RedshopPagetype
 * @package RegularLabs\Library\Condition
 */
class RedshopPagetype extends Redshop
{
    public function pass()
    {
        return $this->passByPageType('com_redshop', $this->selection, $this->include_type, true);
    }
}
