function validateNewProductForm() {
    var primage = document.forms.newProductForm.idprimage.value;
    var prname = document.forms.newProductForm.idprname.value;
    var prtype = document.forms.newProductForm.idprtype.value;
    var prprice = document.forms.newProductForm.idprprice.value;
    var prqty = document.forms.newProductForm.idprqty.value;
    
    if ((prname === '') || (prtype === '') || (prprice === '') || (prqty === '')) {
        alert('Please Fill in All Required Information !');
        return false;
    }

    if(primage !=''){
        alert ('Image is Selected !');
    }else{
        alert ('No Image is Selected !');
        return false;
    }
    
    if (prtype === 'noselection') {
        alert("Please Select the Product Type !");
        return false;
    }
}
