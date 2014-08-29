
function addUser() {
  $.ajax({
    type: "GET",
    url: "ajax.php?",
    data: { method: "new", name: $("#name_form").val(), email: $("#email_form").val()}
  })
  .done(function( msg ) {
    $( "#dialog" ).dialog();
    dialog.dialog( "close" );
    $('[name="refresh"]').click();
  });
  return true;
}

$( "#dialog" ).dialog({
  autoOpen: false,
  show: {
    effect: "blind",
    duration: 1000
  },
  hide: {
    effect: "explode",
    duration: 1000
  }
});



dialog = $( "#dialog-form" ).dialog({
   autoOpen: false,
   height: 300,
   width: 350,
   modal: true,
   buttons: {
     "Create Contact": addUser,
     Cancel: function() {
       dialog.dialog( "close" );
     }
   },
   close: function() {
    dialog.dialog( "close" );
     //form[ 0 ].reset();
     //allFields.removeClass( "ui-state-error" );
   }
});

$( "#new_contact" ).button().on( "click", function() {
    dialog.dialog( "open" );
})

$( "#delete_contact" ).button().on( "click", function() {
    var objects = $('#table1').bootstrapTable('getSelections');
    var ids = new Array();
    for(var i = 0; i <= objects.length; i++){
      ids.push(objects["id"]);
    }

    $.ajax({
    type: "GET",
    url: "ajax.php?",
    data: { method: "delete", id: ids }
  })
  .done(function( msg ) {
    $( "#dialog" ).dialog();
    dialog.dialog( "close" );
    $('[name="refresh"]').click();
  });

    //dialog.dialog( "open" );
})