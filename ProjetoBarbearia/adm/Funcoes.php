<?php 

class Funcoes{

    public function trataCarater($vir,$tipo){
        
        switch($tipo){
            case 1: $rst = utf8_decode($vir); break;
            case 2: $rst = utf8_encode($vir); break;
        }
        return $rst;
    }
}

?>