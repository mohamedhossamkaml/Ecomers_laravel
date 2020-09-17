$(document).ready(function()
{
    'use strict'


    // Hide Placeholder On Form Focus
    $('[Placeholder]').focus(function()
    {
        $(this).attr('data-text' , $(this).attr('placeholder'));
        $(this).attr('placeholder', '');
    }).blur(function()
    {
        $(this).attr('placeholder' , $(this).attr('data-text'));
    });

    //================================================================

    //Admin Hamburger Toggle
    $(".hamburger").click(function()
    {
        $('.worpper').toggleClass('collapse')
    });

    //==================================================================

        // Convert Password Field To Text Field On Hover

        var passfield = $('.password');

        $('.show-pass').hover(function () 
        {

            passfield.attr('type', 'text');

        }, 
        function()
        {
            passfield.attr('type', 'password');
        });

    // Confirmation Message On Button

        $('.confirm').click(function()
        {
            return confirm('Are You Suer ??');
        });

    // Trigger The SelectBoxIt
        // Calls the selectBoxIt method on your HTML select box
        $("select").selectBoxIt({

            autoWidth: false,

        // Uses the jQueryUI 'shake' effect when opening the drop down
            showEffect: "shake",

        // Sets the animation speed to 'slow'
            showEffectSpeed: 'slow',

        // Sets jQueryUI options to shake 1 time when opening the drop down
            showEffectOptions: { times: 1 },

        // Uses the jQueryUI 'explode' effect when closing the drop down
            hideEffect: "explode" });

        $(document).ready(function(){
            $('.slider').bxSlider(
            {
                            // auto:true,
                            // stopAutoOnClick:true,
                            pause:10,
                            autoHover:true,
                            keyboardEnabled:true,
            });

            });

        $('#list-tab a').on('click', function (e) {
            e.preventDefault();
            $(this).tab('show');
            $(this).addClass('active').siblings().removeClass('active');
        });



});

