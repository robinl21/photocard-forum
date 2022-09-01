//TODO:fill in first select with group options, keeping list of group options and OTHER
//set innerHTML for artist select onchange for group select!

function form_check(custom) {
    //TODO: 
    //if custom, check if group name exists in cards.json or is OTHER
    //if group exists, alert to choose other option!

    
    if (custom) {
        const form = document.forms['custom_card_submission'];
        var image_link = form['custom_image']; //needs to be var
        var image_file = form['custom_image_file'];

    }
    else {
        const form = document.forms['card_submission'];
        var image_link = form['image'];
        var image_file = form['image_file'];
    }

    const types = ['jpg', 'png', 'jpeg', 'pdf'];


    if (!image_link.value && !image_file.value) {
        alert('Please input either a link to an image or upload the image!');
        return false;
    }

    var end = image_file.value.split('.').pop().toLowerCase(); //image_file.value gives fakepath/filename.type
    var end_len = types.length;



    if (image_file.value) { 
        console.log('file uploaded');
        const size = image_file.files[0].size; //gets image_file input element, gets file and size, divide 1024 to get Mb
        if (size >  2097152) { //apache has max file size of 2MB
            alert('FILE TOO BIG! max 2mb');
            return false;
        }

        for(var i = 0; i < end_len; i++) {
            if (end === types[i]) {
                return true;
            }
        }
    
        alert('We do not accept this file type! We only accept: ' + types.join(', '))
        return false;
    }

    else {
        console.log('no file uploaded');
    }

    console.log('returns true');
    return true;
}

