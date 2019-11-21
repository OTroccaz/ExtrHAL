<?php
/*
    PHPRtfLite
    Copyright 2010-2011 Steffen Zeidler <sigma_z@web.de>

    This file is part of PHPRtfLite.

    PHPRtfLite is free software: you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    PHPRtfLite is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with PHPRtfLite.  If not, see <http://www.gnu.org/licenses/>.
*/

/**
 * Class for autoloading PHPRtfLite classes.
 * @version     1.2
 * @author      Steffen Zeidler <sigma_z@web.de>
 * @copyright   2010-2011 Steffen Zeidler
 * @package     PHPRtfLite
 */
class PHPRtfLite_Autoloader
{

    /**
     * base dir of the PHPRtfLite package
     * @var string
     */
    protected static $_baseDir;


    /**
     * sets the base dir, where PHPRtfLite classes can be found
     *
     * @param string $dir
     */
    public static function setBaseDir($dir)
    {
        self::$_baseDir = $dir;
    }


    /**
     * loads PHPRtfLite classes
     *
     * @param  string   $className
     * @return boolean  returns true, if class could be loaded
     */
    public static function autoload($className)
    {
			if (strpos($className, "pDraw") === false
				&& strpos($className, "pData") === false
				&& strpos($className, "pColor") === false
				&& strpos($className, "pException") === false
				&& strpos($className, "pCharts") === false
				&& strpos($className, "pBubble") === false
				&& strpos($className, "pcolorGradient") === false
				&& strpos($className, "pIndicator") === false
				&& strpos($className, "pPie") === false
				&& strpos($className, "pPyramid") === false
				&& strpos($className, "pRadar") === false
				&& strpos($className, "pScatter") === false
				&& strpos($className, "pSpring") === false
				&& strpos($className, "pStock") === false
				&& strpos($className, "pSurface") === false
			) {
				// validate classname
				if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/m', $className)) {
						throw new Exception("Class name '$className' is invalid");
				}

				$classFile = self::$_baseDir . '/' . str_replace('_', '/', $className) . '.php';
			
			
				// check if file exists
				if (!file_exists($classFile)) {
						throw new Exception("File $classFile does not exist!");
				}

				require $classFile;

				if (!class_exists($className) && !interface_exists($className)) {
						throw new Exception("Class $className could not be found!");
				}
			}
    }

}