
function addUser() {
    var valid = true;
    allFields.removeClass( "ui-state-error" );
 
    valid = valid && checkLength( name, "username", 3, 16 );
    valid = valid && checkLength( email, "email", 6, 80 );
    valid = valid && checkLength( password, "password", 5, 16 );
 
    valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
    valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
    valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
 
    if ( valid ) {
      $( "#users tbody" ).append( "<tr>" +
        "<td>" + name.val() + "</td>" +
        "<td>" + email.val() + "</td>" +
      "</tr>" );
      dialog.dialog( "close" );
    }
    return valid;
}


dialog = $( "#dialog-form" ).dialog({
   autoOpen: false,
   height: 300,
   width: 350,
   modal: true,
   buttons: {
     "Create an account": addUser,
     Cancel: function() {
       dialog.dialog( "close" );
     }
   },
   close: function() {
     form[ 0 ].reset();
     allFields.removeClass( "ui-state-error" );
   }
});

$( "#new_contact" ).button().on( "click", function() {
    dialog.dialog( "open" );
})

$( "#delete_contact" ).button().on( "click", function() {
    alert("Hola");
    //dialog.dialog( "open" );
})