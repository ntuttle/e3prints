<?
require_once DIR.'core/nav.php';
$Nav=new Nav('Main',$X->USER);
$Nav->Link('businesscards/','All Products');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->LinkDrop('product1','Product Name');
$Nav->PrintLink();
$Nav->Link('businesscards/','Business Cards');
$Nav->PrintLink();
$Nav->Link('test/','Brochures');
$Nav->LinkDrop('test','Product Name');
$Nav->LinkDrop('test','Product Name');
$Nav->LinkDrop('test','Product Name');
$Nav->LinkDrop('test','Product Name');
$Nav->PrintLink();
$Nav->Link('test/','Catalogs');
$Nav->LinkDrop('test','Product Name');
$Nav->LinkDrop('test','Product Name');
$Nav->PrintLink();
$Nav->Link('test/','Stationary');
$Nav->LinkDrop('test','Letterhead');
$Nav->LinkDrop('test','Envelopes');
$Nav->LinkDrop('test','Greeting Cards');
$Nav->PrintLink();
$Nav->Link('test/','Newsletters');
$Nav->LinkDrop('test','Product Name');
$Nav->LinkDrop('test','Product Name');
$Nav->LinkDrop('test','Product Name');
$Nav->PrintLink();
$Nav->Link('','Flyers &amp; Postcards');
$Nav->LinkDrop('test','Product Name');
$Nav->LinkDrop('test','Flyers');
$Nav->PrintLink();
$Nav->Link('test/','Custom Printing');
$Nav->PrintLink();
$Nav->EndNav();
?>