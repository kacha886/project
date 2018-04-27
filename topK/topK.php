<?php

//最小的k个数，并排序
$heaparr = array();

function GetLeastNumbers_Solution($input, $k)
{
    if($k>count($input)){
        return [];
    }
    global $heaparr;
    $result = array();
    $heaparr = array(0);
    //构建完全二叉树
    for($i = 1; $i<= count($input); $i++){
        $heaparr[] = $input[$i-1];
    }
    //2.调整所有的子树使得符合最小堆的特性,从最后一个非叶子节点开始找就行，下标是sum/2
    $max = count($input);

    for ($idx = round($max /2); $idx >=1; $idx--) {
        setNodeP($idx, $max);
    }
    //每次取走最上面的元素，然后把最大节点的元素放在顶部，重新调整，使得剩余的节点依旧满足最小堆的特性。
    for($i = 1; $i<= $k; $i++){
        $t = $heaparr[1];
        $heaparr[1]=$heaparr[$max];
        $max--;
        setNodeP(1, $max);
        $result[] = $t;

    }
    return $result;
}


function setNodeP($curIdx, $maxNode){
    global $heaparr;
    if($curIdx*2 > $maxNode) {
        return;
    }
    $t = $curIdx;
    if($heaparr[$curIdx]>$heaparr[$curIdx*2]){
        $t = $curIdx * 2;
    }
    if($curIdx*2+1 <=$maxNode) {
        if($heaparr[$t] > $heaparr[$curIdx*2+1]) {
            $t = $curIdx * 2 + 1;
        }
    }
    if($t!=$curIdx) {
        $tem = $heaparr[$curIdx];
        $heaparr[$curIdx] = $heaparr[$t];
        $heaparr[$t] = $tem;
        setNodeP($t, $maxNode);
    }
}
$res = GetLeastNumbers_Solution([4,5,1,6,2,7,3,8], 4);
for($i=0;$i<count($res);$i++){
    printf("%d\n", $res[$i]);
}
?>