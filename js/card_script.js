// load html from groups.json through ajax

function test (request) {
    const data = request.response; //dictionary of groups
    innerHTML = [];
    curHTML = '';
    for (var key in data) {
        group_name = key;
        color = data[key]["color"];
        if (data[key]["has_pic"]) {
            url_fill = group_name;
        }
        else {
            url_fill = 'generic';
        }

        curHTML = "<div class=\'group-banner\', style=\'background-image: url(images/" + url_fill + "_slot.jpg);\'>\
        <a href=\'cards/" + group_name + ".html\' style=\'color:" +  color + "\'>" + group_name + "</a></div>";
        innerHTML.push(curHTML);
        curHTML = '';
    }   

    curHTML = "<div class=\'group-banner\', style=\'background-image: url(images/" + 'generic' + "_slot.jpg);\'>\
    <a href=\'cards/" + 'other' + ".html\' style=\'color:" +  'black' + "\'>" + 'other' + "</a></div>";
    innerHTML.push('')

    document.getElementById("fill").innerHTML = innerHTML.join(' ');
}
$ajaxutils.sendGetRequest("data/groups.json", test, 'json');