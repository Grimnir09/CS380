"use strict";
var $ = function(id) { return document.getElementById(id); };
var reservationForm = document.getElementById("reservation_form").elements;

var saveReservation = function() {
    //Using js built in forms
    var arrival_date = document.forms.reservation_form.arrival_date.value;
    var nights = document.forms['reservation_form']['nights'].value;
    var adults = document.forms['reservation_form']['adults'].value;
    var children = document.forms['reservation_form']['children'].value;
    // room type
    var standard = document.forms['reservation_form']['standard'].value;
    var business = document.forms['reservation_form']['business'].value;
    var suite = document.forms['reservation_form']['suite'].value;
    // bed type
    var king = document.forms['reservation_form']['king'].value;
    var double = document.forms['reservation_form']['double'].value;
    //contact info
    var name = document.forms['reservation_form']['name'].value;
    var email = document.forms['reservation_form']['email'].value;
    var phone = document.forms['reservation_form']['phone'].value;
    var error = false;


    //validation with regex
    var date_regex = /^(0[1-9]|1[0-2])\/(0[1-9]|1\d|2\d|3[01])\/(19|20)\d{2}$/;
    if (!(date_regex.test(arrival_date))) {
        $('ad_span').innerHTML = '( Invalid Date Format )';
        error = true;
    }
    else {
        $('ad_span').innerHTML = '';
    }

    var night_regex =  /^-{0,1}\d+$/
    if(!(night_regex.test(nights))) {
        $('nights_span').innerHTML = ' ( Nights must be a number )';
        error = true;
    }
    else {
        $('nights_span').innerHTML = '';
    }

    if (name === '' || name.length < 1) {
        $('name_span').innerHTML = ' ( Name is required )';
        error = true;
    }
    else {
        $('name_span').innerHTML = '';
    }

    var email_regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!(email_regex.test(email))) {
        $('email_span').innerHTML = ' ( Email is invalid ) ';
        error = true;
    }
    else {
        $('email_span').innerHTML = '';
    }

    var phone_regex = /^\d{10}$/;
    if (!(phone_regex.test(phone))) {
        $('phone_span').innerHTML = ' ( Phone number is invalid )';
        error = true;
    }
    else {
        $('phone_span').innerHTML = '';
    }
    
    // if we got errors, return so that the user can fix them
    if (error == true) {
        return false;
    }

    //store values in session
    //check to see if the browser can support local storage
    if (typeof(Storage) !== "undefined") {

        for (var i = 0, item; item = reservationForm[i++];) {
            //Catch our bed type
            if (item.id === "king" || item.id === "double")
                if (item.value !== "")
                    sessionStorage.setItem('bedType',item.value);
            // Catch our room type
            if (item.id === "standard" || item.id === "business" || item.id === "suite")
                if (item.value !== "")
                    sessionStorage.setItem('roomType',item.value);

            sessionStorage.setItem(item.id, item.value)

        }

    } 
    else {
        alert('Sorry your browser doesn\'t support local storage, please open me in a more up to date browser');
        return false
    }

    //valid form
    return true;
};
