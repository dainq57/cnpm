//check_user
$(document).ready(function() {

    // Sự kiện khi focus vào pass_user
    $("#user_new").blur(function() {

        if($(this).val() != ''){
            // Gán text cho class thongbao trước khi AJAX response
            $(".nofityUser").html('<i style="float: right; padding-right: 90px;">Đang kiểm tra...</i>');
        }
        // Dữ liệu sẽ gởi đi
        var form_data = {action: 'check_user', user_new: $(this).val()};

        $.ajax({
            type: "POST",				// Phương thức gởi đi
            url: "../includes/check_user.php",			// File xử lý dữ liệu được gởi
            data: form_data,			// Dữ liệu gởi đến cho url
            success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                $(".nofityUser").html(result);
            }
        });

    });

});

// check_email
$(document).ready(function() {

    // Sự kiện khi focus vào pass_name
    $("#email_new").blur(function() {

        if($(this).val() != ''){
            // Gán text cho class thongbao trước khi AJAX response
            $(".nofityEmail").html('<i style="float: right; padding-right: 90px;">Đang kiểm tra...</i>');
        }
        // Dữ liệu sẽ gởi đi
        var form_data = {action: 'check_email',	email_new: $(this).val()};

        $.ajax({
            type: "POST",				// Phương thức gởi đi
            url: "../includes/check_email.php",			// File xử lý dữ liệu được gởi
            data: form_data,			// Dữ liệu gởi đến cho url
            success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                $(".nofityEmail").html(result);
            }
        });

    });

});


// check password
$(document).ready(function() {

    // Sự kiện khi focus vào pass_name
    $("#pass_new").blur(function() {

        if($(this).val() != ''){
            // Gán text cho class thongbao trước khi AJAX response
            $(".nofityPass").html('<i style="float: right; padding-right: 90px;">Đang kiểm tra...</i>');
        }
        // Dữ liệu sẽ gởi đi
        var form_data = {action: 'check_pass',	pass_new: $(this).val()};

        $.ajax({
            type: "POST",				// Phương thức gởi đi
            url: "../includes/check_pass.php",			// File xử lý dữ liệu được gởi
            data: form_data,			// Dữ liệu gởi đến cho url
            success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                $(".nofityPass").html(result);
            }
        });

    });

});

// check re-password
$(document).ready(function() {

    // Sự kiện khi focus vào pass_name
    $("#repass_new").blur(function() {

        if($(this).val() != ''){
            // Gán text cho class thongbao trước khi AJAX response
            $(".nofityRePass").html('<i style="float: right; padding-right: 90px;">Đang kiểm tra...</i>');
        }
        // Dữ liệu sẽ gởi đi
        var form_data = {action: 'check_repass', pass_new: $("#pass_new").val(), repass_new: $(this).val()};

        $.ajax({
            type: "POST",				// Phương thức gởi đi
            url: "../includes/check_repass.php",			// File xử lý dữ liệu được gởi
            data: form_data,			// Dữ liệu gởi đến cho url
            success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                $(".nofityRePass").html(result);
            }
        });

    });

});
