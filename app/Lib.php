<?php

namespace App;
use File;
class Lib 
{
    public static function ext($file = ''){
        $ex = explode('.', $file);
        $ls = count($ex) -1;
        return '.' . $ex[$ls];
	}
	
	public static function active($status){
		if( $status == 'Y'){
			return '<span class="badge badge-success" >Active</span>';
		}else{
			return '<span class="badge badge-danger" >Unactive</span>';
		}                 
	}	
	public static function bcm($_breadcrumb){
		$bcm = '';
		  if( is_array($_breadcrumb) ){
			  $max = count($_breadcrumb)-1;
			  foreach( $_breadcrumb as $i => $text ){
				  $bcm .= '<li class="breadcrumb-item '.( $i == $max ? 'active':'' ).'">'. $text .'</li>';
			  }
		  }else{
			  $bcm .= '<li class="breadcrumb-item active">'. $_breadcrumb .'</li>';
		  }
	  return $bcm;
	}
	public static function makeFolder($folder){
		//echo $folder;
		if(!file_exists($folder)){
			File::makeDirectory($folder,0777,true);
		}
	}
    public static function encodelink($value=''){
		$link = strtolower($value);
		$link = str_replace(' ', '-', $link);
		$link = str_replace('/', '-', $link);
		$link = str_replace('%', '-', $link);
		$link = str_replace('*', '-', $link);
		$link = str_replace('&', '-', $link);
		$link = str_replace('+', '-', $link);
		$link = str_replace('?', '-', $link);
		$link = str_replace('=', '-', $link);
		$link = str_replace('+', '-', $link);
		$link = str_replace('#', '', $link);
		$link = str_replace(',', '-', $link);
		$link = str_replace(';', '-', $link);
		$link = str_replace('@', '', $link);
		$link = str_replace('!', '', $link);
		$link = str_replace('?', '', $link);
		$link = str_replace('<', '', $link);
		$link = str_replace('>', '', $link);
		$link = str_replace('\"', '', $link);
		$link = str_replace('(', '', $link);
		$link = str_replace(')', '', $link);
		return $link;
	}
    public static function encodefile($value=''){
		$link = strtolower($value);
		$link = str_replace(' ', '-', $link);
		$link = str_replace('/', '-', $link);
		$link = str_replace('%', '-', $link);
		$link = str_replace('*', '-', $link);
		$link = str_replace('&', '-', $link);
		$link = str_replace('+', '-', $link);
		$link = str_replace('?', '-', $link);
		$link = str_replace('=', '-', $link);
		$link = str_replace('+', '-', $link);
		$link = str_replace('#', '', $link);
		$link = str_replace(',', '-', $link);
		$link = str_replace(';', '-', $link);
		$link = str_replace('@', '', $link);
		$link = str_replace('!', '', $link);
		$link = str_replace('?', '', $link);
		$link = str_replace('<', '', $link);
		$link = str_replace('>', '', $link);
		$link = str_replace('\"', '', $link);
		$link = str_replace('(', '', $link);
		$link = str_replace(')', '', $link);
		return substr($link,0,20) .'.';
	}
	
	public static function setJson($arr = []){
		return json_encode( $arr , JSON_UNESCAPED_UNICODE );
	}

	public static function exRate($operation,$rate,$append){
		$total = 0;
		if( $operation == 'plus'){
			$total = $rate + $append;
		}
		if( $operation == 'mul'){
			$total = $rate * $append;
		}
		if( $operation == 'per'){
			$per = $rate * $append / 100;
			$total = $rate + $per;
		}
		return $total;
	}
	public static function nb($a,$dec = 0,$cm = ','){
		$a = floatval($a);
		if(empty($a)){
			return 0;
		}else{
			return $dec != 0 ? number_format($a,$dec,'.',$cm): number_format($a,$dec,'',$cm);
		}
	}
}