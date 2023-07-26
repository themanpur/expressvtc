$(document).ready(function(){
    $('#contactForm').on('submit', function(evt){
        evt.preventDefault();
        $('#submit_button').attr('disabled', true);
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();
        $.ajax({
            url: './contact-form.php',
            type:'POST',
            data: { name: name, email: email, subject: subject, message: message },
            success: function (rep) {
                $('#submit_button').attr('disabled', false);
                if(rep.code == 200){
                    $('#contactForm :input').attr('disabled', 'disabled');
                    $('#contactForm').fadeTo( "slow", 1, function() {
                        $(this).find(':input').attr('disabled', 'disabled');
                        $(this).find('label').css('cursor','default');
                        $('#alert-success').fadeIn();
                    });
                }else{
                    $('#contactForm').fadeTo( "slow", 1, function() {
                        $('#alert-error').fadeIn();
                    });
                }
            },
            error: function (res,status,err) {
                $('#submit_button').attr('disabled', false);
                console.log(status+status+err);
                $('#contactForm').fadeTo( "slow", 1, function() {
                    $('#alert-error').fadeIn();
                });
            }
        });
    });

    $('#newsletterForm').on('submit', function(evt){
        evt.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();
        $.ajax({
            url: './newsletter-form.php',
            type:'POST',
            data: { name: name, email: email },
            success: function (rep) {
                if(rep.code == 200){
                    $('#newsletterForm :input').attr('disabled', 'disabled');
                    $('#newsletterForm').fadeTo( "slow", 1, function() {
                        $(this).find(':input').attr('disabled', 'disabled');
                        $(this).find('label').css('cursor','default');
                        $('#alert-success').fadeIn();
                    });
                }else{
                    $('#newsletterForm').fadeTo( "slow", 1, function() {
                        $('#alert-error').fadeIn();
                    });
                }
            },
            error: function (res,status,err) {
                console.log(status+status+err);
                $('#newsletterForm').fadeTo( "slow", 1, function() {
                    $('#alert-error').fadeIn();
                });
            }
        });
    });
});