
$(document).ready(function(){

    $(function(){
        function readURL(input, selector) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();

                reader.onload = function (e) {
                    $(selector).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#img").change(function () {
            readURL(this, '#image');
        });

    });

    $('#create_info').submit(function(e){
        e.preventDefault();
        var url = $('#create_info').attr('action');
        var form = this;
        var dataForm = new FormData(form);
        var imgOld = $('#image').prop('src');
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    var dataInfo = '';
                    var printImg = response.data.image;
                    if(printImg == null) {
                        printImg = imgOld;
                    }else {
                        printImg = `/storage/`+response.data.image;
                    }
                    var major_name = $('.c_major_id').find(":selected").text();
                        dataInfo += `
                        <div class="mt-3"> <b>Họ tên:</b> `+response.data.name+` </div>
                        <div style="margin-top: 5px;"> <b>Ảnh:</b> <img style="margin-left: 10px;" width="100px" height="100px" src="`+printImg+`" alt=""></div>
                        <div style="margin-top: 5px;"> <b>Tình trạng hôn nhân:</b> `+response.data.marital+` </div>
                        <div style="margin-top: 5px;"> <b>Địa chỉ:</b> `+response.data.address+` </div>
                        <div style="margin-top: 5px;"> <b>Số điện thoại:</b> +`+response.data.phone+` </div>
                        <div style="margin-top: 5px;"> <b>Email:</b> `+response.data.email+` </div>
                        <div style="margin-top: 5px;"> <b>Chuyên ngành:</b> `+major_name+` </div>
                        <div style="margin-top: 5px;"> <b>Giới thiệu chung:</b> `+response.data.description+` </div>
                        `
                    $('.info_pro').html(dataInfo);
                    toastr.success(response.success)
                }else{
                    printErrorMsg(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Thêm thất bại")
            }
        });

    });

    function printErrorMsg (msg) {
        $('.val_info_name').text(msg.name != undefined ? msg.name : '');
        $('.val_info_image').text(msg.image != undefined ? msg.image : '');
        $('.val_info_address').text(msg.address != undefined ? msg.address : '');
        $('.val_info_phone').text(msg.phone != undefined ? msg.phone : '');
        $('.val_info_email').text(msg.email != undefined ? msg.email : '');
        $('.val_info_major_id').text(msg.major_id != undefined ? msg.major_id : '');
        $('.val_info_description').text(msg.description != undefined ? msg.description : '');
        
    }

    $('#formSkill').submit(function(e){
        e.preventDefault();
        var url = $('#formSkill').attr('action');
        var seeker_id = $('input[name=seeker_id]').val();
        var skill_id = [];
        $("#skills option:selected").each(function() {
            skill_id.push($(this).val());
        });
        var data = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "skill_id": skill_id,
            "seeker_id": seeker_id
        }
        $.ajax({
        type: "POST",
        url: url,
        data: data,
            success: function(response) {
                toastr.success(response.success)
            },
            error: function(response) {
                toastr.error("Cập nhật thất bại")
            }
        });
    });

    // kinh nghiệm làm việc
    $('#create_exp').submit(function(e){
        e.preventDefault();
        var url = $('#create_exp').attr('action');

        var form = this;
        var dataForm = new FormData(form);
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    $("#create_exp")[0].reset();
                    // $('#exp-full').load(document.URL +  ' #list-experiences');
                    location.reload();
                    toastr.success(response.success)
                }else if(response.is_max === true){
                    toastr.error(response.error)
                }else{
                    printErrorMsgExp(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Thêm thất bại")
            }
        });

    });

    $('.update_exp').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');

        var form = this;
        var dataForm = new FormData(form);
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    // $('#exp-full').load(document.URL +  ' #list-experiences');
                    location.reload();
                    toastr.success(response.success)
                }else{
                    printErrorMsgExp(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Cập nhật thất bại")
            }
        });

    });

    function printErrorMsgExp (msg) {
        $('.val_company_name').text(msg.company_name != undefined ? msg.company_name : '');
        $('.val_position').text(msg.position != undefined ? msg.position : '');
        $('.val_start_date').text(msg.start_date != undefined ? msg.start_date : '');
        $('.val_description_exp').text(msg.description != undefined ? msg.description : '');
    }
    
    $('.removeExp').click(function (e) {
        e.preventDefault();
        var url = $('.delExp').attr('action');
        var id = $(this).data('id-exp');
        var data = {
            id: id,
            "_token": $('meta[name="csrf-token"]').attr('content'),
        }
        Swal.fire({
            icon: 'warning',
            title: 'Bạn có chắc chắn muốn xóa ?',
            text: 'Bấm không nếu bạn đổi ý!',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonText: 'Xóa',
            confirmButtonColor: '#C46F01',
            cancelButtonText: 'Không'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "get",
                    data: data,
                    success: function(results) {
                        if (results.is_check === true) {
                            Swal.fire({
                                title: results.success,
                                icon: 'success',
                                type: 'success',
                                showConfirmButton: false,
                                timer: 1500
                            }, setTimeout(function() {
                            
                            }, 500)).then(function() {
                                $('.exp_div'+id).remove();
                            });
                        } else {
                            Swal.fire({
                                title: results.error,
                                type: 'error',
                                icon: 'error',
                                timer: 1500
                            });
                        }
                    }
                });
            }
        });
    });

     // công cụ sử dụng
     $('#create_tool').submit(function(e){
        e.preventDefault();
        var url = $('#create_tool').attr('action');

        var form = this;
        var dataForm = new FormData(form);
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    $("#create_tool")[0].reset();
                    location.reload();
                    toastr.success(response.success)
                }else if(response.is_max === true){
                    toastr.error(response.error)
                }else{
                    printErrorMsgTool(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Thêm thất bại")
            }
        });

    });

    $('.update_tool').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');

        var form = this;
        var dataForm = new FormData(form);
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    toastr.success(response.success)
                    location.reload();
                }else{
                    printErrorMsgTool(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Cập nhật thất bại")
            }
        });

    });

    function printErrorMsgTool (msg) {
        $('.val_title_tool').text(msg.title != undefined ? msg.title : '');
    }

    // kỹ năng khác
    $('#create_sko').submit(function(e){
        e.preventDefault();
        var url = $('#create_sko').attr('action');

        var form = this;
        var dataForm = new FormData(form);
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    $("#create_sko")[0].reset();
                    location.reload();
                    toastr.success(response.success)
                }else if(response.is_max === true){
                    toastr.error(response.error)
                }else{
                    printErrorMsgSko(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Thêm thất bại")
            }
        });

    });

    $('.update_sko').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');

        var form = this;
        var dataForm = new FormData(form);
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    toastr.success(response.success)
                    location.reload();
                }else{
                    printErrorMsgSko(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Cập nhật thất bại")
            }
        });

    });

    function printErrorMsgSko (msg) {
        $('.val_title_sko').text(msg.title != undefined ? msg.title : '');
    }

    // dự án đã làm
    $('#create_proj').submit(function(e){
        e.preventDefault();
        var url = $('#create_proj').attr('action');

        var form = this;
        var dataForm = new FormData(form);
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    $("#create_proj")[0].reset();
                    toastr.success(response.success)
                    location.reload();
                }else if(response.is_max === true){
                    toastr.error(response.error)
                }else{
                    printErrorMsgProj(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Thêm thất bại")
            }
        });

    });

    $('.update_proj').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');

        var form = this;
        var dataForm = new FormData(form);
        $.ajax({
        type: "POST",
        url: url,
        data: dataForm,
        processData: false,
        contentType: false,
            success: function(response) {
                if(response.is_check === true) {
                    toastr.success(response.success)
                    location.reload();
                }else{
                    printErrorMsgProj(response.error);
                }
                
            },
            error: function(response) {
                toastr.error("Cập nhật thất bại")
            }
        });

    });

    function printErrorMsgProj (msg) {
        $('.val_name_proj').text(msg.name != undefined ? msg.name : '');
        $('.val_start_date_proj').text(msg.start_date != undefined ? msg.start_date : '');
        $('.val_end_date_proj').text(msg.end_date != undefined ? msg.end_date : '');
        $('.val_summary_proj').text(msg.summary != undefined ? msg.summary : '');
        $('.val_description_proj').text(msg.description != undefined ? msg.description : '');
    }

    $("#block-p").click(function(){
        $("#desc").toggle(300);
    });
    $(".hide-button").click(function(){
        $("#desc").hide(300);
    });

    // kinh nghiệm làm việc
    $("#block-kn").click(function(){
        $("#experiences").toggle(300);
    });
    $(".hide-button-kn").click(function(){
        $("#experiences").hide(300);
    })

    // kỹ năng
    $("#block-sk").click(function(){
        $("#skills").toggle(300);
    });
    $(".hide-button-sk").click(function(){
        $("#skills").hide(300);
    })

    // trường học
    $("#block-edu").click(function(){
        $("#educations").toggle(300);
    });
    $(".hide-button-edu").click(function(){
        $("#educations").hide(300);
    })

    // chứng chỉ
    $("#block-cer").click(function(){
        $("#certificates").toggle(300);
    });
    $(".hide-button-cer").click(function(){
        $("#certificates").hide(300);
    })

    // kỹ năng khác
    $("#block-sko").click(function(){
        $("#skill_other").toggle(300);
    });
    $(".hide-button-sko").click(function(){
        $("#skill_other").hide(300);
    })

    // dự án đã làm
    $("#block-proj").click(function(){
        $("#projects").toggle(300);
    });
    $(".hide-button-proj").click(function(){
        $("#projects").hide(300);
    })

    // công cụ sử dụng
    $("#block-tool").click(function(){
        $("#tools_used").toggle(300);
    });
    $(".hide-button-tool").click(function(){
        $("#tools_used").hide(300);
    })
});
