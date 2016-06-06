<?php
class ArticleRelationModel extends RelationModel{
	protected $tableName='article';
	//这里是要关联的表
	protected $_link=array(
	'attr'=>array(
	//表之间的关系
	'mapping_type'=>MANY_TO_MANY,
	'mapping_name'=>'attr',
	'foreign_key'=>'articleid',
	'relation_foreign_key'=>'attrid',
	//中间表的名称
	'relation_table'=>'article_attr',
	
	),
	'cate'=>array(
	//表示用多的作为主表。表示一对多的关系，HAS——MANY表示一对多，1是主表
	'mapping_type'=>BELONGS_TO,
	'foreign_key'=>'assortmentid',
	//吧关联 的数组作为整个数组的属性
	//'as_fields'=>'cate',
	)
	);
}
?>