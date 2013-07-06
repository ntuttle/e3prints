<?
class DATA {

var $Host;
var $Database;
var $Table;
var $Default;
var $Con=array();	
var $Queries=array();
var $Errors=array();
var $NumRows;
var $Result=array();

public function __construct($Name,$Host=false,$User=false,$Pass=false){
	if($Host===false){$Host=HOST;}
	if($User===false){$User=DBUSER;}
	if($Pass===false){$Pass=DBPASS;}
	$this->CON($Name,$Host,$User,$Pass);
	$this->Default=$Name;
}
public function CON($Name,$Host,$User,$Pass){
	$Connection=mysql_connect($Host,$User,$Pass,true,MYSQL_CLIENT_COMPRESS);
	if($Connection!==false){$this->Con[$Name]=$Connection;}
	else{$this->Errors[]="MySql Error! ".mysql_error()." --- $Host $User $Pass --- ";}
}
public function SET($Connection,$Fields,$Criteria,$Limit=false){
	foreach($Fields as $k=>$v){$fields[]="`$k`='$v'";}
	$Fields=implode(',',$fields);
	if($Limit){$Limit="LIMIT $LIMIT";}
	if($this->ParseConnection($Connection)!==false){
		if(mysql_select_db($this->Database,$this->Con{$this->Host})){
			$Query="UPDATE `{$this->Table}` SET $Fields WHERE $Criteria $Limit";
			$this->Queries[]=$Query;
			if(mysql_query($Query,$this->Con[$this->Host])){
				$this->LastID=mysql_insert_id($this->Con[$this->Host]);
			}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Query --- ";}
		}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Connection --- ";}
	}else{$this->Errors[]="Malformed Request! --- $Connection --- ";}
}
public function PUT($Connection,$Fields,$Values,$extra=false){
	if(stristr($extra,'update')){
		$update=" ON DUPLICATE KEY ".$extra;
		$extra=false;
	}else{$update=false;}
	$this->Result = array();
	if(is_array($Fields)){foreach($Fields as &$field){$field="`$field`";}$Fields="(".implode(',',$Fields).")";}
	if(is_array($Values)){foreach($Values as &$values){if(is_array($values)){foreach($values as &$value){if(stristr($value,'()')){$value="$value";}else{$value="'$value'";}}$values="(".implode(',',$values).")";}}$Values=implode(",",$Values);}
	if($this->ParseConnection($Connection)!==false){
		if(mysql_select_db($this->Database,$this->Con{$this->Host})){
			$Query="INSERT $extra INTO `{$this->Table}` $Fields VALUES $Values $update";
			$this->Queries[]=$Query;
			if(mysql_query($Query,$this->Con[$this->Host])){
				$this->LastID=mysql_insert_id($this->Con[$this->Host]);
			}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Query --- ";}
		}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Connection --- ";}
	}else{$this->Errors[]="Malformed Request! --- $Connection --- ";}
}
public function DEL($Connection,$Criteria,$Limit=false){
	$this->Result = array();
	if($this->ParseConnection($Connection)!==false){
		if(mysql_select_db($this->Database,$this->Con{$this->Host})){
			if($Limit){$Limit="LIMIT $Limit";}
			else{$Limit="LIMIT 1";}
			$Query="DELETE FROM `{$this->Table}` WHERE $Criteria $Limit";
			$this->Queries[]=$Query;
			if(mysql_query($Query,$this->Con[$this->Host])){
				$this->Affected=mysql_affected_rows($this->Con[$this->Host]);
			}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Query --- ";}
		}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Connection --- ";}
	}else{$this->Errors[]="Malformed Request! --- $Connection --- ";}
}
public function Q($Connection,$RawQuery){
	$this->Result = array();
	if($this->ParseConnection($Connection)!==false){
		if(mysql_select_db($this->Database,$this->Con{$this->Host})){
			$this->Queries[]=$RawQuery;
			if($result=mysql_query($RawQuery,$this->Con[$this->Host])){while($row = @mysql_fetch_assoc($result)){$this->Result[]=$row;}
			}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Query --- ";}
		}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Connection --- ";}
	}else{$this->Errors[]="Malformed Request! --- $Connection --- ";}
}
public function GET($Connection,$Criteria=false,$Fields="*",$Limit=array('0'=>30)){
	$this->Result = array();
	if($this->ParseConnection($Connection)!==false){
		if(mysql_select_db($this->Database,$this->Con{$this->Host})){
			if(is_array($Fields)){foreach($Fields as &$field){$field="`$field`";}$Fields=implode(',',$Fields);}
			if(is_array($Limit)){foreach($Limit as $start=>$limit){$Limit="LIMIT $start, $limit";}}
			else{$Limit="LIMIT $Limit";}
			if($Criteria!==false){$Criteria="WHERE $Criteria";}
			$Query="SELECT $Fields FROM `{$this->Table}` $Criteria $Limit";
			$this->Queries[]=$Query;
			if($result=mysql_query($Query,$this->Con[$this->Host])){while($row = mysql_fetch_assoc($result)){$this->Result[]=$row;}
			}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Query --- ";}
		}else{$this->Errors[]="MySql Error! ".mysql_error($this->Con[$this->Host])." --- $Connection --- ";}
	}else{$this->Errors[]="Malformed Request! --- $Connection --- ";}
	$this->NumRows=count($this->Result);
}
public function ParseConnection($Connection){
	$HostDatabaseTable='/^([a-zA-Z0-9_]+)[\.]{1}([a-zA-Z0-9_]+)[\.]{1}([a-zA-Z0-9_\.]+)$/';
	$DatabaseTable='/^([a-zA-Z0-9_]{3,})[\.]{1}([a-zA-Z0-9_]{3,})$/';
	if((preg_match($HostDatabaseTable,$Connection,$Parts))||(preg_match($DatabaseTable,$Connection,$Parts))){
		if(isset($Parts[3])){
			$this->Host=$Parts[1];
			$this->Database=$Parts[2];
			$this->Table=$Parts[3];
		}else{
			$this->Host=$this->Default;
			$this->Database=$Parts[1];
			$this->Table=$Parts[2];
		}
		return true;
	}else{
		return false;
	}
}
}
?>
