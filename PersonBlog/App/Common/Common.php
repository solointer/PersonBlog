<?php
 defined('CURRENT_URL');
 define('CURRENT_URL',base64_encode($_SERVER["REQUEST_URI"]));
 //var_dump(CURRENT_URL);
function p($array){
	dump($array,1,'<pre>',0);
}
//替换表情
/*function replace_phiz($content){
	//返回一个二维数组
	preg_match_all('/\[.*?\]/is',$content,$arr);
	
	if($arr[0]){
		//读取所有的表情数组
		$phiz=F('phiz','','./Data/');
		foreach($arr[0] as $v){
			foreach($phiz as $k=>$value)
			{
				if($v=='['.$value.']')
				{
					$content=str_replace($v,'<img src="'.__ROOT__.'/public/Images/phiz/''$key.'.gif'">,$content);
				}
				continue;
			}
		}
		
	}
}*/
?>