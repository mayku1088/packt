function showWaiting(){
	waitingDialog.show('Please wait');
}

function hideWaiting(){
	waitingDialog.hide();
}

function setLocalStorage(key, value){
    localStorage.setItem(key, value);
}

function getLocalStorage(key){
    return localStorage.getItem(key);
}

function displayErrors(form, errors, fields){
    $('label.error').remove();

    $.each(errors, function(ind, obj){
        
        if(obj.key in fields){
            
            var msg = obj.message;

            var element = form.find(fields[obj.key]);
            

            if(!element.next().is('.error')){
                //add error
                
                $('<label class="error">' + msg + '</label>').insertAfter(element);
            }else{
                //update error
                element.next('.error').html(msg);
            }

            
        }
        
    });
}

