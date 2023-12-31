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
 * Class HikashopProduct
 * @package RegularLabs\Library\Condition
 */
class HikashopProduct extends Hikashop
{
    public function pass()
    {
        if ( ! $this->request->id || $this->request->option != 'com_hikashop' || $this->request->view != 'product')
        {
            return $this->_(false);
        }

        return $this->passSimple($this->request->id);
    }
}
