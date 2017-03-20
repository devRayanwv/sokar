$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

$('#col4').daterangepicker({
    singleDatePicker: true,
    locale: {
       format: 'MMM Do YYYY'
    },
    singleClasses: "picker_4"

}, function(start, end, label) {
    console.log(start.toISOString(), end.toISOString(), label);
});