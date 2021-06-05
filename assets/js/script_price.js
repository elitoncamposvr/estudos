$(function(){

	$('input[name=price]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=min_price]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=purchase_price]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=receipt_amount]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=standard_value]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=advance_amount]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=limit_credit]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=wage]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=bill_amount]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('input[name=profit]').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});

});

  function profitCalcSale(){
      let purchase_price = document.getElementById('purchase_price').value
      let sale_price = document.getElementById('price').value
      let profit = document.getElementById('profit')
      let value1 = parseFloat(purchase_price.replace(',', '.'))
      let value2 = parseFloat(sale_price.replace(',', '.'))
      let percentage = value2 - value1
      let res = percentage / value1 * 100
      if (profit.value != ''){
        profit.value = res.toFixed(2).replace('.', ',')
      }
    }

    function valueCalcSale() {
      let purchase_price = document.getElementById('purchase_price').value
      let profit = document.getElementById('profit').value
      let value1 = parseFloat(purchase_price.replace(',', '.'))
      let value2 = parseFloat(profit)
      let percentage = value1 * value2 / 100
      let res = value1 + percentage
      document.getElementById('price').value = res.toFixed(2).toString().replace('.', ',')
    }

    function profitCalc(){
      let purchase_price = document.getElementById('purchase_price').value
      let sale_price = document.getElementById('price').value
      let value1 = parseFloat(purchase_price.replace(',', '.'))
      let value2 = parseFloat(sale_price.replace(',', '.'))
      let percentage = value2 - value1
      let res = percentage / value1 * 100
      document.getElementById('profit').value = res.toFixed(2).replace('.', ',')
	  
    }