<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 - 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class plgSystemWowhead extends JPlugin
{

    public function onBeforeRender()
    {
        if (JFactory::getApplication()->isAdmin()) {
            return;
        }

        JFactory::getDocument()->addScript('//static.wowhead.com/widgets/power.js', 'text/javascript', false, true);

        $config['colorlinks'] = $this->params->get('colorlinks') ? true : false;
        $config['iconizelinks'] = $this->params->get('iconizelinks') ? true : false;
        $config['renamelinks'] = $this->params->get('renamelinks') ? true : false;

        JFactory::getDocument()->addScriptDeclaration('var wowhead_tooltips=' . json_encode($config) . ';');
    }
}
