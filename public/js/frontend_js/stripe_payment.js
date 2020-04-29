var stripe = Stripe('pk_test_5JlIAuMPx0g9fhxI3hsvPfee00othlHOlt');
var elements = stripe.elements();

var style = {
    base:{
        fontSize: '16px',
        lineHeight: '24px'
    }
};

var card = elements.create('card',{style: style});
card.mount('#card-element');

card.addEventListener('change',function(){
    var displayError = document.getElementById('card-errors');
    if(event.error){
        displayError.textContent = event.error.message;
    }else{
        displayError.textContent= '';
    }
});

//create a token or display an error when the form is submitted
var form = document.getElementById('payment_form');

form.addEventListener('submit',function(event){
    event.preventDefault();
    
    stripe.createToken(card).then(function(result){
        if(result.error){
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        }else{
            stripeTokenHandler(result.token);
        }
    });
});

function stripeTokenHandler(token){
    //console.log(token);
    var form = document.getElementById('payment_form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type','hidden');
    hiddenInput.setAttribute('name','stripeToken');
    hiddenInput.setAttribute('value',token.id);
    form.appendChild(hiddenInput);
    form.submit();
}