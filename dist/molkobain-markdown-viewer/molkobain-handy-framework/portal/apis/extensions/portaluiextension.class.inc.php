<?php
/**
 * Copyright (c) 2015 - 2019 Molkobain.
 *
 * This file is part of licensed extension.
 *
 * Use of this extension is bound by the license you purchased. A license grants you a non-exclusive and non-transferable right to use and incorporate the item in your personal or commercial projects. There are several licenses available (see https://www.molkobain.com/usage-licenses/ for more informations)
 */

namespace Molkobain\iTop\Extension\HandyFramework\Portal\Extension;

use AbstractPortalUIExtension;
use Molkobain\iTop\Extension\HandyFramework\Common\Helper\ConfigHelper;
use Symfony\Component\DependencyInjection\Container;

// Protection for iTop 2.6 and older
if(!class_exists('Molkobain\\iTop\\Extension\\HandyFramework\\Portal\\Extension\\PortalUIExtensionLegacy'))
{
	/**
	 * Class PortalUIExtension
	 *
	 * @package Molkobain\iTop\Extension\HandyFramework\Portal\Extension
	 * @since v1.3.0
	 */
	class PortalUIExtension extends AbstractPortalUIExtension
	{
		/**
		 * @inheritdoc
		 */
		public function GetCSSFiles(Container $oContainer)
		{
			// Check if enabled
			if(ConfigHelper::IsEnabled() === false)
			{
				return array();
			}

			$sModuleVersion = ConfigHelper::GetModuleVersion();
			$sURLBase = ConfigHelper::GetAbsoluteModuleUrl();

			// Note: Here we pass the compiled .css file in order to be compatible with iTop 2.5 and earlier (ApplicationHelper::LoadUIExtensions() refactoring that uses utils::GetCSSFromSASS())
			$aReturn = array(
				$sURLBase . 'common/css/handy-framework.css?v=' . $sModuleVersion,
			);

			return $aReturn;
		}

		/**
		 * @inheritdoc
		 */
		public function GetJSFiles(Container $oContainer)
		{
			// Check if enabled
			if(ConfigHelper::IsEnabled() === false)
			{
				return array();
			}

			$sModuleVersion = ConfigHelper::GetModuleVersion();
			$sURLBase = ConfigHelper::GetAbsoluteModuleUrl();

			$aJSFiles = array(
				$sURLBase . 'common/js/handy-framework.js?v=' . $sModuleVersion,
			);

			return $aJSFiles;
		}
	}
}
