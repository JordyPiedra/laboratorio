<?php

Class View {
	public $link;
	public function render($controller, $view ,$layout=true){
		$controller = get_class($controller);
		// view/User/index.php
		if($layout)
		{
		include_once HEADER;
		include_once MENU;
		}
		
		require './views/'.$controller.'/'.$view.'.php';
		
		
	}
       
}

?>