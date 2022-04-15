jQuery(document).ready(function($){

    let formid = $("#dgform1");

    formid.submit(function(event){
        event.preventDefault();

        let title           = $('#formtitle').val();
        let formdescription = $("#formdescription").val();
       // Show errors if the field is empty
        if(title=='') {   
            $('#messageR').addClass('alert-danger');  
            $('#messageR').css("display", "block");
            $('#messageR').text("Please add the title");
            $('#formtitle').addClass('inputerror');
            $('#formtitle').focus();

            return false;
        }
        let formData = new FormData();
        formData.append('action', 'dg_submit_function');
        formData.append('title', title);
        formData.append('description', formdescription);

        $.ajax({
            url: ajaxUrl,
            type: 'post',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response){
                let res = JSON.parse(response);
                if(res.status== 200){
                        $('#messageR').css("display", "block");
                        $('#messageR').text(res.message);
                        $('#messageR').removeClass('alert-danger');
                        $('#messageR').addClass('alert-success');
                        $('#formtitle').removeClass('inputerror');

                        window.location.href = res.pageurl ;
                }
                else{
                    $('#messageR').css("display", "block");
                        $('#messageR').text(res.message);              
                        $('#messageR').removeClass('alert-success');
                        $('#messageR').addClass('alert-danger');
                        $('#formtitle').addClass('inputerror');
                        $('#formtitle').focus();

                        
                }
            },
            error: function(){
                console.log('error');
            } 
        });

    });

 });


 
