<?php
/**
 * @package                Joomla.Site
 * @subpackage	Templates.MERIDIAN
 * @copyright        Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license                GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('joomla.filesystem.file');

// check modules
$showRightColumn	= $this->countModules('right');
$showbottom			= ($this->countModules('position-9') or $this->countModules('position-10') or $this->countModules('position-11'));
$showleft			= ($this->countModules('position-4') or $this->countModules('position-7') or $this->countModules('position-5'));

if ($showRightColumn==0 and $showleft==0) {
	$showno = 0;
}

JHtml::_('behavior.framework', true);

// get params
$color				= $this->params->get('templatecolor');
$logo				= $this->params->get('logo');
$navposition		= $this->params->get('navposition');
$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$templateparams		= $app->getTemplate(true)->params;

$doc->addStyleSheet($this->baseurl.'/templates/system/css/system.css');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/position.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

$files = JHtml::_('stylesheet', 'templates/'.$this->template.'/css/general.css', null, false, true);
if ($files):
	if (!is_array($files)):
		$files = array($files);
	endif;
	foreach($files as $file):
		$doc->addStyleSheet($file);
	endforeach;
endif;

$doc->addStyleSheet('templates/'.$this->template.'/css/'.htmlspecialchars($color).'.css');
if ($this->direction == 'rtl') {
	$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/template_rtl.css');
	if (file_exists(JPATH_SITE . '/templates/' . $this->template . '/css/' . $color . '_rtl.css')) {
		$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/'.htmlspecialchars($color).'_rtl.css');
	}
}

$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/md_stylechanger.js', 'text/javascript');
$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<jdoc:include type="head" />

<!--[if lte IE 6]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ieonly.css" rel="stylesheet" type="text/css" />
<?php if ($color=="personal") : ?>
<style type="text/css">
#line {
	width:98% ;
}
.logoheader {
	height:200px;
}
#header ul.menu {
	display:block !important;
	width:98.2% ;
}
</style>
<?php endif; ?>
<![endif]-->

<!--[if IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/ie7only.css" rel="stylesheet" type="text/css" />
<![endif]-->

<script type="text/javascript">
	var big ='<?php echo (int)$this->params->get('wrapperLarge');?>%';
	var small='<?php echo (int)$this->params->get('wrapperSmall'); ?>%';
	var altopen='<?php echo JText::_('TPL_MERIDIAN_ALTOPEN', true); ?>';
	var altclose='<?php echo JText::_('TPL_MERIDIAN_ALTCLOSE', true); ?>';
	var bildauf='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/plus.png';
	var bildzu='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/minus.png';
	var rightopen='<?php echo JText::_('TPL_MERIDIAN_TEXTRIGHTOPEN', true); ?>';
	var rightclose='<?php echo JText::_('TPL_MERIDIAN_TEXTRIGHTCLOSE', true); ?>';
	var fontSizeTitle='<?php echo JText::_('TPL_MERIDIAN_FONTSIZE', true); ?>';
	var bigger='<?php echo JText::_('TPL_MERIDIAN_BIGGER', true); ?>';
	var reset='<?php echo JText::_('TPL_MERIDIAN_RESET', true); ?>';
	var smaller='<?php echo JText::_('TPL_MERIDIAN_SMALLER', true); ?>';
	var biggerTitle='<?php echo JText::_('TPL_MERIDIAN_INCREASE_SIZE', true); ?>';
	var resetTitle='<?php echo JText::_('TPL_MERIDIAN_REVERT_STYLES_TO_DEFAULT', true); ?>';
	var smallerTitle='<?php echo JText::_('TPL_MERIDIAN_DECREASE_SIZE', true); ?>';
</script>

</head>
<body>
	<div id="all">
			<div id="back">
					<div id="header"> <!-- berin header -->
							<div class="logoheader">
								<a href="./"><jdoc:include type="modules" name="header" /></a>
							</div><!-- end logoheader -->
					</div><!-- end header -->

						<div id="top-menu"> <!-- begin top menu -->
								<jdoc:include type="modules" name="top-menu" />
						</div><!-- end top menu -->

							<div id="<?php echo $showRightColumn ? 'contentarea2' : 'contentarea'; ?>"><!-- begin contentarea -->
								  <div id="breadcrumbs">
										<jdoc:include type="modules" name="navigation" />
								  </div>
									  <div id="search"><!-- begin search -->
											<jdoc:include type="modules" name="search" />
									  </div><!-- end search -->
											  <div class="clearfix"></div>
													<?php if ($navposition=='left' and $showleft) : ?>
														<?php endif; ?>
															<div id="<?php echo $showRightColumn ? 'wrapper' : 'wrapper2'; ?>" <?php if (isset($showno)){echo 'class="shownocolumns"';}?>><!-- begin wrapper -->
																  <div id="main"><!-- begin main -->
																		<?php if ($this->countModules('top-news')): ?>
																			<div id="top"><jdoc:include type="modules" name="top-news"   /></div>
																		<?php endif; ?>
																			<jdoc:include type="message" />
																			<jdoc:include type="component" />
																  </div><!-- end main -->
															</div><!-- end wrapper -->
															<div class="right"id="nav" ><!-- begin nav right menu -->
																	<jdoc:include type="modules" name="right" style="beezDivision" headerLevel="3" />
															</div><!-- end nav right menu -->
											<div class="wrap"></div>
							 </div> <!-- end contentarea -->
				  <div id="footer-outer"><!-- begin footer-outer -->
									<?php if ($showbottom) : ?>
										<div id="footer-inner">
												<div id="bottom">
														<div class="box box1"> <jdoc:include type="modules" name="wrap-1" style="beezDivision" headerlevel="3" /></div>
														<div class="box box2"> <jdoc:include type="modules" name="wrap-2" style="beezDivision" headerlevel="3" /></div>
														<div class="box box3"> <jdoc:include type="modules" name="wrap-3" style="beezDivision" headerlevel="3" /></div>
												</div>
										</div>
											<?php endif ; ?>
									<div id="footer-sub">
											<div id="footer">
												<div class="md-footer">
													<ul>
														<li>
															тел.:  8 (3843) 52-49-42, 8 (3843)  52-57-90 Адрес: 654031, г. Новокузнецк, ул. Горьковская, 11а Эл. почта: id_e-mail.ru
														</li>
														<li>
															© 2013–2016 МБОУ ДОД "Центр детского (юношеского) технического творчества "<a href="./">Меридиан</a>"
														</li>
													</ul>
												</div>
											</div><!-- end footer -->
									</div>
				  </div><!-- end footer-outer -->
			</div><!-- back -->
	</div><!-- all -->
		<jdoc:include type="modules" name="debug" /><!-- debug mode -->
</body>
</html>
