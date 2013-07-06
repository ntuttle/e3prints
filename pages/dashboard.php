<?php
$FORM=new FORMS('ProfileUpdate',strtoupper($X->USER['firstname']." ".$X->USER['lastname']));
foreach($X->USER as $k=>$v){$FORM->Text($k,$v);}
$FORM->Br();
$FORM->Button('SaveProfile','save changes');
echo "<div id=\"profile\">";
$FORM->PrintForm();
echo "</div>";
?>