Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});

document.getElementById('trans_date').value = new Date().toDateInputValue();


function typeSelectCheck(nameSelect)
{
    console.log(nameSelect);
    if(nameSelect){
        typeValue = document.getElementById("setor").value;
        if(typeValue == nameSelect.value){
            document.getElementById("hidden_div1").style.display = "block";
            document.getElementById("hidden_div2").style.display = "none";
        }
        else{
            document.getElementById("hidden_div1").style.display = "none";
            document.getElementById("hidden_div2").style.display = "block";
        }
    }
    else{
        document.getElementById("admDivCheck").style.display = "none";
    }
}