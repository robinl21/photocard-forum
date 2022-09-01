function change () {
    document.getElementById("test").textContent = "S:DIFJSD:F";
}

console.log((document.querySelector("main")).name = "hi")

function handling (request) {
    console.log(request.response);
}
$ajaxutils.sendGetRequest('php/script.php', handling, 'text');