$(function () {

    // init the validator
    // validator files are included in the download package
    // otherwise download from http://1000hz.github.io/bootstrap-validator

    // $('#contactUs').validator();
    console.log($(this).serialize());
    console.log("NANI THE FUCK");
    // when the form is submitted
    $('#contactUs').on('submit', function (e) {
        console.log($(this).serialize())
        console.log("nani the cukg");

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = "processors/contactProcessor.php";

            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    console.log("SUCUK SUCUK")
                    // data = JSON object that contact.php returns

                    // we recieve the type of the message: success x danger and apply it to the 
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    // let's compose Bootstrap alert box HTML
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable">' + messageText + '</div>';
                    
                    // If we have messageAlert and messageText
                    if (messageAlert && messageText) {
                        // inject the alert to .messages div in our form
                        document.querySelector(".errorOrSuccessMessage").classList.add("visibleErrorMessage");
                        $('#contactUs').find('.errorOrSuccessMessage').html(alertBox);
                        // empty the form
                        $('#contactUs')[0].reset();
                    }
                }
            });
            return false;
        }
    })
});