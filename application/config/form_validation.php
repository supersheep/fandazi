<?php
$config = array(
	'meal/create' => array(
		array(
        	'field' => 'title',
        	'label' => '标题',
        	'rules' => 'required'
        ),
	    array(
        	'field' => 'time',
        	'label' => '活动时间',
        	'rules' => 'required'
	    ),
	    array(
	       'field' => 'describe',
	       'label' => '活动简介',
	       'rules' => 'required'
	    ),
	    array(
            'field' => 'dpurl',
            'label' => '商户链接',
            'rules' => 'required'
        )
    )
);