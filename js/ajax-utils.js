//CALLING .sendGetRequest is asynchronous, so subsequent code that needs information must be put into function
// $ajaxutils.sendGetRequest(URL to call (php), response handler function, response type)
(function (global) {
    var ajaxutils = {}; 

    // define functions in this frame
    function getRequestObject () {
        return (new XMLHttpRequest());
    }

    function handleResponse (request, responseHandler) {
        if ((request.readyState == 4) && (request.status == 200)) {
            responseHandler(request); //responseHandler defined in globals, reference to globals
        }
        
        else {
            alert("Bad request!");
        }
    }

    //function 'shown' to global frame who's reference points to this function frame, has access to above helper functions

    ajaxutils.sendGetRequest = function (requestUrl, responseHandler, responseType) { //responseHandler should be function with request argument
        var request = getRequestObject();
        request.onload = function () {
            handleResponse(request, responseHandler); // callback handler function run when response gotten
        }
        request.open("GET", requestUrl, true); //asynchronous request, gets status and triggers onload
        request.responseType = responseType;
        request.send(null); 
    }

    ajaxutils.sendPostRequest = function(requestUrl, responseHandler, params) {
        var request = getRequestObject();
        request.onload = function () {
            handleResponse(request, responseHandler);
        }
        request.open('POST', requestUrl, true);
        request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        request.send(params); // information to send over, name=avlue pairs (received by php file as post variables)
    }

    global.$ajaxutils = ajaxutils
})(window);

//responseTypes: json, text..
//in responseHandler, to get request's response, must do 
// responseHandler(request): request.response