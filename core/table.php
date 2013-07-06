<?
class TBL{

	static function Start($title=false,$id=false,$width='100%'){
		if($title){$title="<h1 class='tblheader'>$title</h1><hr />";}
		if($id){$id=" id='$id'";}
		if($width){$width=" width='$width'";}
		echo "<table$id$width class='tablesorter'>$title\n";
	}
	static function Button($title,$link=false,$color=false){
		$style="class='button $color'";
		if(stristr($link,'/')){$link=" href='".WEB."$link'";}
		elseif($link){$link=" id='$link'";}
		return "<a$link$style>$title</a>";
	}
	static function Row($class=false,$id=false){
		if($class){$class=" class='$class'";}
		if($id){$id=" id='$id'";}
		echo "\t<tr$class$id>\n";
	}
	static function HeaderRow($class=false,$id=false){
		if($class){$class=" class='$class'";}
		if($id){$id=" id='$id'";}
		echo "\t<thead><tr$class$id>\n";
	}
	static function HeaderCell($value=false,$width=false,$align=false,$id=false){
		if($width){$width=" width='$width'";}
		if($align){$align=' style="text-align:right;"';}
		if($value!==false){if($id){$id=" id='$id'";}else{$id=" id='$value'";}}
		echo "\t\t<th$width$align$id>$value</th>\n";
	}
	static function Cell($value=false,$width=false,$align=false,$id=false){
		if(stristr($width,'px')){$min="min-width:$width;";}
		if($align){$align='text-align:right;';}
		$style=' style="'.@$align.@$min.'"';
		if($width){$width=" width='$width'";}
		if($id){$id=" id='$id'";}
		echo "\t\t<td$width$style$id>$value</td>\n";
	}
	static function ToolCell($tool=false,$link=false,$name=false,$title=false){
		if($tool!==false){
			if(!stristr($tool,"<img")){
				$TOOL=X::Icon($tool);
				if($TOOL){
					$tool=$TOOL;
					if(stristr($link,'/')){$link=" href='".WEB."$link'";}
					elseif($link){$link=" id='$link'";}
					if($name){$name=" name='$name'";}
					if($title){$title=" title='$title'";}
					$button="<a$link$name$title>$tool</a>";
					echo "\t\t<td class='toolbar'>$button</td>";
				}else{
					echo "\t\t<td class='toolbar'>$tool</td>";
				}
			}else{
				if(stristr($link,'/')){$link=" href='".WEB."$link'";}
				elseif($link){$link=" id='$link'";}
				if($name){$name=" name='$name'";}
				if($title){$title=" title='$title'";}
				$button="<a$link$name$title>$tool</a>";
				echo "\t\t<td class='toolbar'>$button</td>";
			}
		}else{
			echo "\t\t<td class='toolbar'></td>";
		}
	}
	static function RowEnd($head=false){
		if($head){$thead='</thead>';}
		echo "\t</tr>\n".@$thead;
	}
	static function End(){
		echo "</table>\n";
	}
	static function Make($array,$tools=false,$width='100%'){
		foreach($array as $rowID=>$row){
			if(!isset($c)){$c=0;
				if(isset($tools['title'])){$title=$tools['title'];}else{$title=false;}
				TBL::Start($title,false,$width);
				TBL::Row('header');
				if($tools!==false && isset($tools['left'])){foreach($tools['left'] as $tool){TBL::Cell();}}
				foreach($row as $k=>$v){TBL::Cell($k);}
				if($tools!==false && isset($tools['right'])){foreach($tools['right'] as $tool){TBL::Cell();}}
				TBL::RowEnd();
			}elseif($rowID=='...'){
				TBL::Row('header');
				if($tools!==false && isset($tools['left'])){foreach($tools['left'] as $tool){TBL::Cell();}}
				foreach($row as $k=>$v){if(is_numeric($k)){TBL::Cell();}else{TBL::Cell($k);}}
				if($tools!==false && isset($tools['right'])){foreach($tools['right'] as $tool){TBL::Cell();}}
				TBL::RowEnd();
			}
			TBL::Row('row');
			if($tools!==false && isset($tools['left'])){
				foreach($tools['left'] as $tool){
					if(stristr($tool['id'],'/')){
						$id=$tool['id'].'/'.$row[$tool['name']];
					}else{
						$id=$tool['id'];
					}
					if(($rowID=='...') && ($rowID!=0)){
						TBL::Cell(' ');
					}else{
						TBL::ToolCell($tool['icon'],$id,@$row[$tool['name']]);
					}
				}
			}
			foreach($row as $k=>$v){
				if(is_numeric(str_replace(array(',','$','.','%'),'',$v))){$width='75px';$align='right';}else{$width='100%';$align=false;}
				TBL::Cell(stripslashes($v),$width,$align);}
			if($tools!==false && isset($tools['right'])){foreach($tools['right'] as $tool){if(stristr($tool['id'],'/')){$id=$tool['id'].'/'.$row[$tool['name']];}else{$id=$tool['id'];}TBL::ToolCell($tool['icon'],$id,$row[$tool['name']]);}}
			TBL::RowEnd();
			$c++;}
		TBL::End();
	}
}
class TABLE {

	var $id;
	var $Rows;

	public function __construct($id,$title=false,$width=false){
		if($title){$this->Header();}
		if($width===false){$width='100%';}
		$this->width=$width;
		$this->id=$id;
		$this->Rows[$id]=array();
		$this->Start();
	}
	public function Start($title=false,$width='100%'){
		if($title){$title="<h1 class='tblheader'>$title</h1><hr />";}
		if($id){$id=" id='$id'";}
		if($width){$width=" width='$width'";}
		echo "<table$id$width class='tablesorter'>$title\n";
	}
}
?>
