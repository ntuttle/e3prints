<?
$FORM=new FORMS('LoginForm','E3 User Login');
$FORM->Hidden('ip',$_SERVER['REMOTE_ADDR']);
$FORM->Span('Alert',false,'invalid username or password');
$FORM->EndSpan();
$FORM->Text('username');
$FORM->Pass('password');
$FORM->Br();
$FORM->Button('Signup','signup','grey');
$FORM->Button('PassReset','reset password','grey');
$FORM->Button('UserLogin','login');
$FORM->PrintForm();

?>