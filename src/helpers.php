<?php
/**
 * 多个数组的笛卡尔积
 * @return array
 */
function combineDika() {
    $data = func_get_args();
    $data = current($data);
    $cnt = count($data);
    $result = [];
    $arr1 = array_shift($data);
    foreach($arr1 as $key=>$item)
    {
        $result[] = array($item);
    }
    foreach($data as $key=>$item)
    {
        $result = combineArray($result,$item);
    }
    return $result;
}

/**
 * 两个数组的笛卡尔积
 * @param $arr1
 * @param $arr2
 * @return array
 */
function combineArray($arr1,$arr2) {
    $result = array();
    foreach ($arr1 as $item1)
    {
        foreach ($arr2 as $item2)
        {
            $temp = $item1;
            $temp[] = $item2;
            $result[] = $temp;
        }
    }
    return $result;
}

