<?php
/*
Plugin Name: 搜索下拉提示框
Version: 1.0.0
Plugin URL:https://wordpress.org/plugins/opensug/
Description: 为来访者提供搜索建议，使用户的搜索方便快捷。
Author: openSug
Author URL: https://www.opensug.eu.org/
*/
! defined("EMLOG_ROOT") && exit("access deined!");

// 前端脚本
addAction("index_footer", function(){
	$config = array();
	$db = Storage::getInstance("openSug");
	$config = $db->getValue( "config" );

	if( ! isset( $config["ipt"] ) || strlen($config["ipt"]) == 0) return false;

	if( $config["width"] < 1 ) $config["width"] = "";

	$config["sugSubmit"] = $config["sugSubmit"] == "0" ? "false" : "true";

	echo "\r\n<script type=\"text/javascript\" src=\"https://opensug.github.io/js/opensug.js\"></script>\r\n<script type=\"text/javascript\">\"use strict\";(function(){\r\n	 var ipt = document[\"getElementById\"](\"{$config["ipt"]}\");\r\n	if( ipt != null && (\r\n		(ipt[\"getAttribute\"](\"type\") || \"\")[\"toLocaleLowerCase\"]() === \"search\" || \r\n		(ipt[\"getAttribute\"](\"type\") || \"\")[\"toLocaleLowerCase\"]() === \"text\") && \r\n	   	\"function\" === typeof( window[\"openSug\"] )\r\n	) window[\"openSug\"]( \"{$config["ipt"]}\", {\r\n		// 提示框的背景色。\r\n		bgcolor : \"{$config["bgcolor"]}\",\r\n\r\n		// 提示框的高亮背景色。\r\n		bgcolorHI : \"{$config["bgcolorHI"]}\",\r\n\r\n		// 提示框的边框颜色。\r\n		borderColor : \"{$config["borderColor"]}\",\r\n\r\n		// 提示框中文本的颜色。\r\n		fontColor : \"{$config["fontColor"]}\",\r\n\r\n		// 高亮显示提示框中的文本颜色。\r\n		fontColorHI : \"{$config["fontColorHI"]}\",\r\n\r\n		// 提示框中文本的字体。\r\n		fontFamily : \"{$config["fontFamily"]}\",\r\n\r\n		// 提示框中的文本字体大小。\r\n		fontSize : \"{$config["fontSize"]}\",\r\n\r\n		// 提示框的内边距。\r\n		padding : \"{$config["padding"]}\",\r\n\r\n		// 边界的圆角半径。\r\n		radius : \"{$config["radius"]}\",\r\n\r\n		// 边框的阴影效果。\r\n		shadow : \"{$config["shadow"]}\",\r\n\r\n		// 搜索提示框的数据源。\r\n		source : \"{$config["source"]}\",\r\n\r\n		// 选择提示时是否自动提交表单。\r\n		sugSubmit : {$config["sugSubmit"]},\r\n\r\n		// 提示框的宽度。\r\n		// 建议的空值。\r\n		width : \"{$config["width"]}\",\r\n\r\n		// 提示框相对于输入框的横向偏移。\r\n		// 负值向右移动。\r\n		XOffset : \"{$config["XOffset"]}\",\r\n\r\n		// 提示框相对于输入框的纵向偏移。\r\n		// 负值向下偏移。\r\n		YOffset : \"{$config["YOffset"]}\"\r\n\r\n	}, function(callback){\r\n		/*  ...  */\r\n	});\r\n}(this));</script>\r\n";
});

// 后台调试链接
addAction("adm_menu_ext", function (){
	echo "<a id=\"openSug\" class=\"collapse-item\" href=\"plugin.php?plugin=opensug\">openSug</a>";
});