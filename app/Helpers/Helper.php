<?php

	// Filter - Type - Join
    function filter($req)
    {
    	$filter = array();
        foreach($req->input() as $key => $val ) {
            if(strpos($key, 'filter') === 0){
            	$cluase = filter_clm_val($key,$val);
            	if(filled($cluase))
                array_push($filter, $cluase);
            }
        }

        return $filter;
    }

    function filter_clm_val($key,$val){

    	$key = substr($key,6);

    	if(strpos($key, 'str') === 0){
	    	$key = substr($key,3);
	    	if(strpos($key, 'join') === 0){
		    	$key = substr($key,4);
	    		$key = str_replace('-','.',$key);
			}
			return [$key,'like','%'.$val.'%'];

    	}else
		if(strpos($key, 'num') === 0){
			$key = substr($key,3);
	    	if(strpos($key, 'join') === 0){
		    	$key = substr($key,4);
	    		$key = str_replace('-','.',$key);
			}
			if(is_numeric($val)&&filled($val))
				return [$key,$val];
			else 
				return null;
		}else
		if(strpos($key, 'date') === 0){
			$key = substr($key,4);
	    	if(strpos($key, 'join') === 0){
		    	$key = substr($key,4);
	    		$key = str_replace('-','.',$key);
			}
			if(filled($val))
				return [$key,$val];
			else 
				return null;
		}
    }
