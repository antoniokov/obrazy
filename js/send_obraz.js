$(document).ready(function () {
                $('#send_obraz').on('submit',function (e) {

                    $.ajax({
                        url: 'http://obrazy.by/send_obraz.php',
                        data: $(this).serialize(),
                        type: 'POST',
                        success: function (data) {
                            console.log(data);
                            $(':input', '#send_obraz')
                            .not(':button, :submit, :reset, :hidden')
                            $("#obraz_text").val('')
                            $("#success_obraz").show().fadeOut(8000); //=== Show Success Message==
                        },
                        error: function (data) {
                            $("#error_obraz").show().fadeOut(8000); //===Show Error Message====
                        }
                    });
                    e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
                });
            });