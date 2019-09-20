jQuery(document).ready(function($){
    let form = jQuery('#contactForm');
    let action = form.attr('action');

    form.submit(function(event){
        event.PreventDefault();
        
        let formData = {
            contactName : $('#contactName').val(),
            contactEmail : $('#contactEmail').val(),
            contactSubject : $('#contactSubject').val(),
            contactMessage : $('#contactMessage').val()
        }
        console.log(formData);
        
        $.ajax({
            url : action,
            type: 'POST',
            data: formData,
            error: function(request, txtstatus, errorThrown){
                console.log(request);
                console.log(txtstatus);
                console.log(errorThrown);
            },
            success: function(){
                alert('ok');
                form.html('Send message');
            }
        });
        
    });

});