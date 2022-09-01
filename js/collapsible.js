elements = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < elements.length; i++) { //adds event handler to change content below
    elements[i].addEventListener("click", function() { 
        var content = this.nextElementSibling;

        if (content.style.maxHeight == '' || content.style.maxHeight == '0px') {
            content.style.padding = '10px';
            content.style.maxHeight = content.scrollHeight + 'px';
            
        }   
        else {
            content.style.maxHeight = '0px';
            content.style.padding = '0px';
        }
    })
}