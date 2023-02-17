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

function loadGenre(){
    $.ajax({
        url: site_url + '/api/genre/all',
        type: 'GET',
        data: {},
        beforeSend:function(){
            
            //showWaiting();
        }
    })
    .done(function(response) {
        //hideWaiting();

        var template = $("#mp_template").html();
        
        var html = '';

        for(genre of response.data){
            html += Mustache.render(template, genre);
        }

        $('.genre-id').append(html);
        
        loadPublisher();
        
    })
    .fail(function(response) {
        //hideWaiting();
        
        var data = JSON.parse(response.responseText);

        toastr.error(data.message);

        
    });
}

function loadPublisher(){
    $.ajax({
        url: site_url + '/api/publisher/all',
        type: 'GET',
        data: {},
        beforeSend:function(){
            
            //showWaiting();
        }
    })
    .done(function(response) {
        //hideWaiting();

        var template = $("#mp_template").html();
        
        var html = '';

        for(genre of response.data){
            html += Mustache.render(template, genre);
        }

        $('.publisher-id').append(html);
        
        if(typeof window.postPublisherLoad !== 'undefined'){
            window.postPublisherLoad();
        }
        
    })
    .fail(function(response) {
        //hideWaiting();
        
        var data = JSON.parse(response.responseText);

        toastr.error(data.message);

        
    });
}

