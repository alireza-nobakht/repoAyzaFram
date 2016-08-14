<?php

namespace server;

Class Router  {

    private $_routs;

    function __construct($routs) {
        //echo '<pre>';
        $this->_routs = $routs;
    }

    function getRequestedRout($withExplod = false) {
        $requeset = $this->trimRequset();
        if($withExplod){
             return explode('/',$requeset);
        } else {
            return $requeset;
        }
    }

    function trimRequset(){
        $requeset = $_SERVER['REQUEST_URI'];
        if(strlen($requeset) > 1 && $requeset != '/' ) {
            $requeset = ltrim($requeset , '/');
            if($requeset[strlen($requeset) - 1] == '/') {
                $requeset = rtrim($requeset, '/');
            }
        }
        return $requeset;
    }

    public function dispatcher(){
        $valid = false;
        $params = array();
        $arrRequestRout = $this->getRequestedRout(true);
       // print_r($arrRequestRout);
        if(is_array($this->_routs) && !empty($this->_routs)){
            foreach($this->_routs as $rout){
                $validRoutArr =  explode('/',$rout[0]);
                //print_r($validRoutArr);
                if(is_array($validRoutArr) && !empty($validRoutArr)){
                    if(count($validRoutArr) == count($arrRequestRout)){
                        foreach($validRoutArr as $key=>$val){
                            //print_r($validRoutArr);
                            //for check is varieable or not
                            if(!empty($val[0]) && $val[0] == '{' && $val[strlen($val) - 1] == '}') {
                                //if is variable just need know is exist
                                if( isset($arrRequestRout[$key]) ){
                                    $params[substr($val,1,-1)] = $arrRequestRout[$key];
                                    $valid = true;
                                } else {
                                    $valid = false;
                                }
                            } else {
                                if($arrRequestRout[$key] == $val){
                                    $valid = true;
                                } else {
                                    $valid = false;
                                }
                            }

                        }
                    } else {
                        $error =  'no same number of params';
                    }

                } else {
                    $error =  'valid rout is empty';
                }

                if($valid){
                    return array($rout,$params);
                    break;
                }

            }
        }

    }


}
