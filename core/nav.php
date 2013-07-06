<?

class Nav{

	var $LinkDrop=array();
	var $Link;
	var $Class;
	var $User;

	public function __construct($nav,$user=false){
		$this->User=$user;
		echo "\n<!-- START $nav NAVIGATION -->\n<div class='".$nav."Nav' align='center'><div class='Page' align='left'>";
	}
	public function LinkDrop($view,$name,$security=false,$newPage=false){
		if($this->securityCheck($security)){
			if($newPage){$target=" target='_blank'";}
			$this->LinkDrop[]="<div class='Link'><a href='".WEB.$this->Class."$view/'".@$target.">".ucwords($name)."</a></div>";
		}
	}
	public function Link($className,$friendlyName=false,$hover=false){
		if(!$friendlyName){$friendlyName=ucfirst($className);}
		if((stristr($className,'/'))||($className=='')){$link=" href='".WEB."$className'";}
		else{$link=" id='$className'";}
		if($hover){$hover=" title='$hover'";}
		$this->Class=$className;
		$this->LinkDrop=array();
		$this->Link="<a$link$hover>$friendlyName</a>";
	}
	public function PrintLink($class=false,$security=false){
		if($this->securityCheck($security)){
			$link="<div class='".$class."Link'>";
			$link.=$this->Link;
			if(!empty($this->LinkDrop)){
				$link.="<div class='LinkDrop'>\n";
				foreach($this->LinkDrop as $LinkDrop){$link.="\t".$LinkDrop."\n";}
				$link.="</div>";
			}
			$link.="</div>\n";
			echo $link;
		}
		$this->ClearNav();
	}

	public function ClearNav(){
		unset($this->Link);
		unset($this->Class);
		$this->LinkDrop=array();
	}

	public function EndNav(){
		echo "</div></div>\n<!-- END NAVIGATION -->\n";
	}

	public function securityCheck($securityLevel){
		if($securityLevel!==false){
			if($this->User[$securityLevel]==1){
				$pass=true;
			}else{
				$pass=false;
			}
		}else{
			$pass=true;
		}
		return $pass;
	}
}

?>
