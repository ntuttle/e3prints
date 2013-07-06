<?
class FORMS {
	
	var $FORM=array();
	var $title;
	var $id;

	public function __construct($id,$title=false,$class=false,$width=325){
		$this->StartForm($id,$class,$width);
		if($title){$this->Header($title);}
	}
	public function StartForm($id,$class,$width){
		$this->id=$id;
		$id="id=\"$id\"";
		if($class===false){$class='box';}
		$class="class=\"$class\"";
		$this->FORM[$this->id][]="\n<form method=\"POST\" $id $class style=\"width:{$width}px\"/>";
	}
	public function SelectForm($id){
		$this->id=$id;
	}
	public function Br(){
		$this->FORM[$this->id][]="<hr />";
	}
	public function Header($title,$buttons=false){
		$this->FORM[$this->id][]="<h1>$title";
		if(is_array($buttons)){
			foreach($buttons as $button){
				if(is_array($button)){
					$this->Button($button[0],$button[1],@$button[2]);
				}else{
					$this->Button($buttons[0],$buttons[1],@$buttons[2]);
				}
			}
		}
		$this->FORM[$this->id][]="</h1>";
	}
	public function Span($name,$display=true,$content=false){
		if($display===false){$display=" style='display:none;'";}
		$this->FORM[$this->id][]="<span id='$name'$display>".$content;
	}
	public function EndSpan(){
		$this->FORM[$this->id][]="</span>";
	}
	public function Select($name,$options,$value=false,$label=true,$null=true,$width=200){
		if($label===true){$this->Label($name);}elseif($label){$this->Label($label);}
		if($value===false){$value=@$_POST[$name];}
		$this->FORM[$this->id][]="<select style=\"width:{$width}px\" name=\"$name\" id=\"$name\">";
		if($null){$this->FORM[$this->id][]="<option></option>";}
		foreach($options as $k=>$v){
			if(($k==$value)||($v==$value)){$check='selected';}else{$check=false;}
			$this->FORM[$this->id][]="<option $check value=\"$k\">$v</option>";
		}
		$this->FORM[$this->id][]="</select>";
	}
	public function Textarea($name,$value=false,$label=true,$width=170){
		if($label===true){$this->Label($name);}
		elseif($label){$this->Label($label);}
		if($value===false){$value=@$_POST[$name];}
		$this->FORM[$this->id][]="<textarea style=\"width:{$width}px\" name=\"$name\" id=\"$name\" value=\"$value\" ></textarea>";
	}
	public function Text($name,$value=false,$label=true,$width=170){
		if($label===true){$this->Label($name);}
		elseif($label){$this->Label($label);}
		if($value===false){$value=@$_POST[$name];}
		$this->FORM[$this->id][]="<input type=\"text\" style=\"width:{$width}px\" name=\"$name\" id=\"$name\" value=\"$value\" />";
	}
	public function Pass($name,$value=false,$label=true,$width=170){
		if($label===true){$this->Label($name);}
		elseif($label){$this->Label($label);}
		if($value===false){$value=@$_POST[$name];}
		$this->FORM[$this->id][]="<input type=\"password\" style=\"width:{$width}px\" name=\"$name\" id=\"$name\" value=\"$value\" />";
	}
	public function Hidden($name,$value=false){
		if($value===false){$value=@$_POST[$name];}
		$this->FORM[$this->id][]="<input type=\"hidden\" name=\"$name\" id=\"$name\" value=\"$value\" />";
	}
	public function Label($title){
		$this->FORM[$this->id][]="<label>".ucfirst($title).":</label>";
	}
	public function Button($name,$value=false,$color=false){
		if($value===false){$value=" value=\"$name\"";}else{$value=" value=\"$value\"";}
		if($color!==false){$color=" class=\"$color\"";}
		$name="name=\"$name\" id=\"$name\"";
		$this->FORM[$this->id][]="<input type=\"button\" $name$value$color/>";
	}
	public function Buttons($button){
		if(is_array($button)){
			if(isset($button['id'])){$id="id=\"".$button['id']."\"";}else{$id=false;}
			if(isset($button['icon'])){
				$title=X::Icon($button['icon']);
				if(isset($button['name'])){$name="name=\"{$button['name']}\"";}else{$name="name=\"".@$button['icon']."\"";}
				if(isset($button['color'])){$class="class=\"{$button['color']}\"";}
				$BUTTON="<a $id $name>$title</a>";
			}else{
				$title="value=\"{$button['title']}\"";
				if(isset($button['name'])){$name="name=\"{$button['name']}\"";}else{$name="name=\"".@$button['id']."\"";}
				if(isset($button['color'])){$class="class=\"{$button['color']}\"";}
				else{$class=false;}
				$BUTTON="<input type=\"button\" $class $title $name $id />";
			}
			$this->FORM[$this->id][]=$BUTTON;
		}elseif($button!==false){
			$this->FORM[$this->id][]=$button;
		}
	}
	public function PrintForm($id=false){
		if($id){$this->id=$id;}
		echo implode("\n\t",$this->FORM[$this->id])."\n</form>\n\n";
	}
}
?>
