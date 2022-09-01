// script used by cards html files to generate their own members + respective cards

//POST variables (group name) to send to PHP file, which accesses info from database,
// returns appropriate HTML as request.response, which we handle in response handler


var to_fill = document.getElementById("fill"); //set HTML, fill in

// ajax get response. request consists of HTML to be filled from PHP
function get_cards (request) {
    console.log(request.response);
    to_fill.innerHTML = request.response;
        
    }




// run from cards/group_name.html. should be POST request
$ajaxutils.sendPostRequest("../php/card_creation.php", get_cards, 'name=AESPA');