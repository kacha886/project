<?php

//��С��k������������
$heaparr = array();

function GetLeastNumbers_Solution($input, $k)
{
    if($k>count($input)){
        return [];
    }
    global $heaparr;
    $result = array();
    $heaparr = array(0);
    //������ȫ������
    for($i = 1; $i<= count($input); $i++){
        $heaparr[] = $input[$i-1];
    }
    //2.�������е�����ʹ�÷�����С�ѵ�����,�����һ����Ҷ�ӽڵ㿪ʼ�Ҿ��У��±���sum/2
    $max = count($input);

    for ($idx = round($max /2); $idx >=1; $idx--) {
        setNodeP($idx, $max);
    }
    //ÿ��ȡ���������Ԫ�أ�Ȼ������ڵ��Ԫ�ط��ڶ��������µ�����ʹ��ʣ��Ľڵ�����������С�ѵ����ԡ�
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