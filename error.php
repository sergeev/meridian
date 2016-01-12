<?php
/**
 * @package		Joomla.Site
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$params = JFactory::getApplication()->getTemplate(true)->params;
$logo =  $params->get('logo');
$showRightColumn = 0;
$showleft = 0;
$showbottom = 0;

// get params
$color			= $params->get('templatecolor');
$navposition	= $params->get('navposition');

//get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;
?>
<html>
<head>
	<title>Страница не найдена</title>
	<style type="text/css">
		body {
			text-align: center;
			padding-top: 50px;
			color: #6297E6;
			text-shadow: 0px 1px 1px #3076DE;
		}
		a {
			color: #3076DE;
		}
	</style>
</head>
<body>
<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/logo-meridian.png">
<h2>Страница не найдена, или удалена.</h2>
<h3>Перейти на <a href="<?php echo $this->baseurl ?>">Главную страницу</a></h3>
</body>
</html>