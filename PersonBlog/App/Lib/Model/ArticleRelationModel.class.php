<?php
class ArticleRelationModel extends RelationModel{
	protected $tableName='article';
	//������Ҫ�����ı�
	protected $_link=array(
	'attr'=>array(
	//��֮��Ĺ�ϵ
	'mapping_type'=>MANY_TO_MANY,
	'mapping_name'=>'attr',
	'foreign_key'=>'articleid',
	'relation_foreign_key'=>'attrid',
	//�м�������
	'relation_table'=>'article_attr',
	
	),
	'cate'=>array(
	//��ʾ�ö����Ϊ������ʾһ�Զ�Ĺ�ϵ��HAS����MANY��ʾһ�Զ࣬1������
	'mapping_type'=>BELONGS_TO,
	'foreign_key'=>'assortmentid',
	//�ɹ��� ��������Ϊ�������������
	//'as_fields'=>'cate',
	)
	);
}
?>