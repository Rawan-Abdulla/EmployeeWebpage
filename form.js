$.ajax({
    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
    url         : 'process.php', // the url where we want to POST
    data        : formData, // our data object
    dataType    : 'json' // what type of data do we expect back from the server
})

$.post('process.php', function(formData) {
    alert("welcome"); 

    

})
    .fail(function(data) {
        alert("the email or pass is un correct try again"); 
        window.location = "loginv1.html";
    });