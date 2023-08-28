<?php
! defined("EMLOG_ROOT") && exit("access deined!" );

// 插件初始化配置
function callback_init() {
    $db = Storage::getInstance("openSug" );			// 插件初始化实例
    $db->setValue( "config", array(
		"ipt"			=> "",						// 输入框绑定ID
		"bgcolor"		=> "#ffffff",				// 背景颜色
		"bgcolorHI"		=> "#313131",				// 背景高亮颜色
		"borderColor"	=> "#ced4da",				// 边框颜色
		"fontColor"		=> "#313131",				// 字体颜色
		"fontColorHI"	=> "#ffffff",				// 字体高亮颜色
		"fontFamily"	=> "Montserrat,sans-serif",	// 字体
		"fontSize"		=> "14",					// 字体大小
		"padding"		=> "4px 8px",				// 内边框
		"radius"		=> "4px",					// 圆角
		"shadow"		=> "0 16px 10px #00000080",	// 阴影
		"source"		=> "",						// 结果源
		"sugSubmit"		=> "1",						// 默认动作
		"width"			=> "",						// 宽度
		"XOffset"		=> "",						// X偏移量
		"YOffset"		=> "-3",					// Y偏移量
	), "array" );
}

// 插件删除时清理数据
function callback_rm() {
    $db = Storage::getInstance("openSug");			//使用插件的英文名称初始化一个存储实例
    $ak = $db->deleteAllName("YES");				//删除此插件创建的所有数据, 请传入大写的"YES"来确认删除 ，一般用于插件删除回调函数。
}

// 插件更新时数据库
function callback_up() {

}
