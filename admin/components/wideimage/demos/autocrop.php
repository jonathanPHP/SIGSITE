<?php
	/**
    This file is part of WideImage.
		
    WideImage is free software; you can redistribute it and/or modify
    it under the terms of the GNU Lesser General Public License as published by
    the Free Software Foundation; either version 2.1 of the License, or
    (at your option) any later version.
		
    WideImage is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Lesser General Public License for more details.
		
    You should have received a copy of the GNU Lesser General Public License
    along with WideImage; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
  **/
	
	require_once(dirname(__FILE__) . '/helpers/common.inc.php');
	
	//Registry::set('debug', 'text');
	
	$img = wiImage::load(WI_IMG_PATH . Request::get('img'));
	$rgb_threshold = Request::getInt('rgb_threshold', 0);
	$pixel_cutoff = Request::getInt('pixel_cutoff', 1);
	$margin = Request::getInt('margin', 0);
	$base_color = Request::get('base_color', null);
	
	if (strlen($base_color) > 0 && preg_match(Registry::get('rgb regex'), $base_color, $matches))
		$base_color = $img->getExactColor(hexdec($matches[1]), hexdec($matches[2]), hexdec($matches[3]));
	else
		$base_color = null;
	
	$result = $img->autocrop($margin, $rgb_threshold, $pixel_cutoff, $base_color);
	
	$format = substr(Request::get('img'), -3);
	img_header($format);
	echo $result->asString($format);
?>