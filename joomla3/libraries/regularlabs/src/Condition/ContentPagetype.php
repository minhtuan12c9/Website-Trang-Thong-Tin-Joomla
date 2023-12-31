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
 * Class ContentPagetype
 * @package RegularLabs\Library\Condition
 */
class ContentPagetype extends Content
{
    public function pass()
    {
        $components = ['com_content', 'com_contentsubmit'];

        if ( ! in_array($this->request->option, $components))
        {
            return $this->_(false);
        }
        if ($this->request->view == 'category' && $this->request->layout == 'blog')
        {
            $view = 'categoryblog';
        }
        else
        {
            $view = $this->request->view;
        }

        return $this->passSimple($view);
    }
}
