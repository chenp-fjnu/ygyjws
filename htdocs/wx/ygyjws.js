document.querySelector('#get_materialcount').onclick = function () {
    $.ajax({
    type: "POST",
    url: "some.php",
    data: { name: "John" }
    }).done(function( msg ) {
    alert( "Data Saved: " + msg );
    });    
  };