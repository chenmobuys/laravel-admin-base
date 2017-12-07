<?php
return [
    //地区等级
    'level' => [
        1 => '省',
        2 => '市',
        3 => '县',
        4 => '街道',
    ],

    //属性类型
    'attr_type' => [
        1 => '关键属性',
        2 => '销售属性',
        3 => '次要属性',
    ],

    //属性输入类型
    'attr_input_type' => [
        1 => '文本框',
        2 => '选择框',
        3 => '文本域',
    ],

    //显示状态
    'show_status' => [
        1 => '显示',
        2 => '隐藏',
    ],

    //订单交易状态
    'trade_status' => [
        1 => '待确认',
        2 => '已确认',
        3 => '已完成',
        4 => '已取消',
    ],

    //订单支付状态
    'pay_status' => [
        1 => '待支付',
        2 => '支付中',
        3 => '已支付',
        4 => '待退款',
        5 => '退款中',
        6 => '已退款',
    ],

    //订单物流状态
    'ship_status' => [
        1 => '待发货',
        2 => '已发货',
        3 => '已收货',
        4 => '待退货',
        5 => '退货中',
        6 => '已退货',
    ],

    //订单评价状态
    'comment_status' => [
        1 => '待评论',
        2 => '已评论',
    ],

];