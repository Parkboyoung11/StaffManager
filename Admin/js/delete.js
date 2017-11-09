// JavaScript Document
$('.delete_link').on('click',function(){
	var thongbao='Disable this account. You sure?';
	return confirm(thongbao);  
});

$('.reset_link').on('click',function(){
	var thongbao='Reset this acount password. You sure?';
	return confirm(thongbao);  
});

$('.exprotCSV').on('click',function(){
	var thongbao='Export to CSV file. You sure?';
	return confirm(thongbao);  
});
	
	
	
	
