
$(document).ready(function () {
   
    $("#send_obrazec").submit(function (e) {
        $.ajax({
            url: 'http://obrazy.by/send_obrazec.php',
            data: $(this).serialize(),
            type: 'POST',
            success: function (data) {
                console.log(data);
                $(':input', '#send_obrazec').not(':button, :submit, :reset, :hidden');
                $("#obrazec_text").val('');
                $("#from_obrazec").val('');
                $("#success_obrazec").show().fadeOut(8000); //=== Show Success Message==
            },
            error: function (data) {
                $("#error_obrazec").show().fadeOut(8000); //===Show Error Message====
            }
        });
        e.preventDefault(); //=== To Avoid Page Refresh and Fire the Event "Click"===
        return false;
    });
});