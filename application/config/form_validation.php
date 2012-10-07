<?php
$config = array(

    'reg/index' => array(
        array(
            'field' => 'email',
            'label' => '邮箱',
            'rules' => 'required|valid_email|is_unique[fdz_user.email]'
        ),
        array(
            'field' => 'name',
            'label' => '名号',
            'rules' => 'required|min_length[2]'
        ),
        array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'required|min_length[6]'
        ),
        array(
            'field' => 'invitecode',
            'label' => '邀请码',
            'rules' => 'required|callback_valid_invitecode'
        )
    ),
    'mealdiscuss/show' => array(
        array(
            'field' => 'content',
            'label' => '内容',
            'rules' => 'required'
        )
    ),
    'mealdiscuss/create' => array(
        array(
            'field' => 'title',
            'label' => '标题',
            'rules' => 'required'
        ),
        array(
            'field' => 'content',
            'label' => '内容',
            'rules' => 'required'
        )
    ),
    'msg/new_mail' => array(
        array(
            'field' => 'title',
            'label' => '标题',
            'rules' => 'required'
        ),
        array(
            'field' => 'content',
            'label' => '内容',
            'rules' => 'required'
        ),
        array(
            'field' => 'to_user_id',
            'label' => '收件人',
            'rules' => 'required'
        )
    ),
	'meal/create' => array(
		array(
        	'field' => 'title',
        	'label' => '标题',
        	'rules' => 'required'
        ),
	    array(
        	'field' => 'date',
        	'label' => '活动时间',
        	'rules' => 'required|callback_valid_date'
	    ),
	    array(
	       'field' => 'describe',
	       'label' => '活动简介',
	       'rules' => 'required'
	    ),
	    array(
            'field' => 'dpurl',
            'label' => '商户链接',
            'rules' => 'required|callback_valid_dpurl'
        )
    )
);