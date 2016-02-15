<?php
class ModuleIndex extends LmlBase{
	public function index(){
		if( !headers_sent() ) {
			header("Content-type:text/html;charset=utf-8");
		}
		echo '<div style="margin-top:100px;line-height:30px;font-size:16px;font-weight:bold;font-family:微软雅黑;text-align:center;color:red;">^_^,&nbsp;Welcome to use LMLPHP!<div style="color:#333;">A fully object-oriented PHP framework, keep it light, magnificent, lovely.</div></div>';
	}
}