
function change_form(element) {
    console.log(element.selectedIndex);
    if (element.selectedIndex == 1) { //submit custom value
        console.log('custom');
        document.getElementById("custom_group").style.display = 'block';
        document.getElementById("exist_group").style.display = 'none';
        
    }

    else {
        document.getElementById("exist_group").style.display = 'block';
        document.getElementById("custom_group").style.display = 'none';
    }

}

