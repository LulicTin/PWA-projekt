$(function() {
    $("form[name='forma_vijesti']").validate({
      rules: {
        naslov: {
          required: true,
        minlength: 5,
        maxlength: 30,
      },
        sazetak:{
          required: true,
        },
        kategorija:{
            required: true,
        },
        
      },
      messages: {
        naslov: {
          required: "Potrebno je upisati naslov",
          minlength: "Naslov ne smije imati manje od 5 znakova",
          maxlength: "Naslov ne smije imati više od 30 znakova",
        },
        sazetak: {
          required: "Potrebno je upisati tekst",
        },
        kategorija: {
            required: "Potrebno je izabrati kategoriju",
          },
          
     },
     

      submitHandler: function(form) {
        form.submit();
      }
    });
  });