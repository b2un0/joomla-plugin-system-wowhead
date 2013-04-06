<?php

/**
 * Wowhead
 *
 * @author     Branko Wilhelm <bw@z-index.net>
 * @link       http://www.z-index.net
 * @copyright  (c) 2013 Branko Wilhelm
 * @package    plg_wowhead
 * @license    GNU General Public License v3
 * @version    $Id$
 */
 
defined('_JEXEC') or die;

class plgSystemWowhead extends JPlugin {
	
	public function onBeforeRender() {
		if (JFactory::getApplication()->isAdmin()) {
			return;
		}
		
		JFactory::getDocument()->addScript('//static.wowhead.com/widgets/power.js');
				
		$config['colorlinks'] = $this->params->get('colorlinks') ? true : false;
		$config['iconizelinks'] = $this->params->get('iconizelinks') ? true : false;
		$config['renamelinks'] = $this->params->get('renamelinks') ? true : false;
		
		JFactory::getDocument()->addScriptDeclaration('var wowhead_tooltips = ' . json_encode($config));
    }
}