$(function(){

	$('input[name=cpf]').mask('000.000.000-00');
	$('input[name=cnpj]').mask('00.000.000/0000-00');
	$('input[name=date_worth]').mask('00/00/0000');
	$('input[name=birth_date]').mask('00/00/0000');
	$('input[name=admission_date]').mask('00/00/0000');
	$('input[name=phone]').mask('(00)0000-0000');
	$('input[name=cellphone]').mask('(00)00000-0000');
	$('input[name=whatsapp]').mask('(00)00000-0000');
	$('input[name=address_zipcode]').mask('00.000-000');
	$('input[name=bank_account]').mask('00000000-0', {reverse:true, placeholder:"000000-0"});

	

});