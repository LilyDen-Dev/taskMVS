$(document).ready(function() {
    // $('#my-table').dynatable();
    fieldValidate();
});

function fieldValidate()
{

    $('form').on('submit', function (e)
    {
        var form = $(this);
        var inputs = form.find('.form-control');

        var error = false;

        inputs.each(function () {

            if ($(this).val() === '') {
                $(this).addClass(':invalid');

                form.addClass('was-validated');
                error = true;
            }
            else {
                $(this).removeClass(':invalid');
            }

            if (error) {
                e.preventDefault();
            }
        });

        inputs.on('keydown', function () {

            if($(this).hasClass(':invalid'))
            {
                $(this).removeClass(':invalid');
            }
        });

    });


    // document.querySelectorAll('.js-valid').onkeydown = function (event){event};

}
