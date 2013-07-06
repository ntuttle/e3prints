<?
class X {


	var $PAGE;
	var $VIEW;
	var $ID;
	var $ACT;

	var $DATA;

	var $USER;


	public function __construct($session){
		$this->DATA=new DATA('DB',HOST,DBUSER,DBPASS);
		$this->ParseUrl();
		$this->CheckSession($session);
	}
	public function CheckSession($session){
		$this->session=$session;
		
		if(isset($session['E3SESSION'])){
			$this->DATA->GET('DB.e3prints.users',"`id`='{$session['E3SESSION']}'");
			$this->USER=$this->DATA->Result[0];
			if($this->PAGE==''){$this->PAGE='user/dashboard';}}
		elseif(isset($_POST['AJAX'])){	echo $this->$_POST['AJAX']($_POST);exit();}
		elseif($this->PAGE=='user'){$this->PAGE='login';}
		elseif($this->PAGE==''){$this->PAGE='home';}
	}
	public function UserLogin($vars){
		$username=@$vars['username'];
		$password=md5(@$vars['password']);
		$ip=@$vars['ip'];
		if($username!='' && $password!=''){
			$this->DATA->GET('DB.e3prints.users',"`username`='$username' AND `password`='$password'");
			if(!empty($this->DATA->Result)){
				$this->USER=$this->DATA->Result[0]['id'];
				$now=date('Y-m-d H:i:s');
				$this->DATA->SET('DB.e3prints.users',array('lastlogin'=>$now,'ip'=>$ip),"`id`='{$this->USER}'");
				if(setcookie('E3SESSION',$this->USER,time()+(3600*2),'./','e3prints.com')){return $this->USER;}
				else{return false;}
			}
		}
	}
	public function ParseUrl(){
		$this->PAGE=$_GET['page'];
		$this->VIEW=$_GET['view'];
		$this->ID=$_GET['id'];
		$this->ACT=$_GET['act'];
	}

}
?>
