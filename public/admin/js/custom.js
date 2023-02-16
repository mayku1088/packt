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
        
        if(ind in fields){
            
            var msg = obj;

            var element = form.find(fields[ind]);
            

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

(function ($, undefined) {
    '$:nomunge'; // Used by YUI compressor.

    $.fn.serializeObject = function () {
        var obj = {};

        $.each(this.serializeArray(), function (i, o) {
            var n = o.name,
                v = o.value;

            obj[n] = obj[n] === undefined ? v
                : $.isArray(obj[n]) ? obj[n].concat(v)
                    : [obj[n], v];
        });

        return obj;
    };

})(jQuery);

