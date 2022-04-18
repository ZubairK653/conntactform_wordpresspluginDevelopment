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



 $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});

// Tabs for right sidebar
function openField(evt, fieldName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(fieldName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


 // field accordion
 function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('fa fa-angle-down fa fa-angle-up');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);