$(document).ready(function() {
    fieldValidate();
});

function fieldValidate()
{

    $('#submit_form').on('click', function (e)
    {
        var form = $(this).parents('#task_form');
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

        if (!error) {

            var data = Collect(form);
            console.log(data);

            var result={};
            $.ajax({
                url: 'http://taskmvs/tasks/add',
                method: 'POST',
                data: data,
                success: function (data) {
                    if (data.status == 'success') {

                        console.log("data = ", data);
                        location.reload();
                    }
                    else if (data.status == 'error') {
                        error = true;
                        var errorVal = data.error;
                        console.log("data error!!!!", errorVal);
                        form.find('.js-err-email').show().text(errorVal);
                    }

                }
            });
            console.log("return ", result);
        }
    });

}

function Collect(form)
{
    var data = {};

    form.find('input:visible, textarea:visible').each(function() {
        var value = "";
        var name = $(this).attr('name');

        if (name)
        {
            value = $(this).val();
            data[name] = value;
        }
    });


    return data;
}
