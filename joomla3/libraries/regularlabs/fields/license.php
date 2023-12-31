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

defined('_JEXEC') or die;

use RegularLabs\Library\Field;
use RegularLabs\Library\License as RL_License;

if ( ! is_file(JPATH_LIBRARIES . '/regularlabs/autoload.php'))
{
    return;
}

require_once JPATH_LIBRARIES . '/regularlabs/autoload.php';

class JFormFieldRL_License extends Field
{
    public $type = 'License';

    protected function getInput()
    {
        $extension = $this->get('extension');

        if (empty($extension))
        {
            return '';
        }

        $message = RL_License::getMessage($extension, true);

        if (empty($message))
        {
            return '';
        }

        return '</div><div>' . $message;
    }

    protected function getLabel()
    {
        return '';
    }
}
