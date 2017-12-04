$(function(){
    //url = 'posts';
    var page = 1;
    var current_page = 1;
    var total_page = 0;
    var is_ajax_fire = 0;
    manageData();
    function manageData() {
        $.ajax({
            dataType: 'json',
            url: 'posts',
            data: {page:page}
        }).done(function(data){
    console.log(data);
            total_page = data.last_page;
            current_page = data.current_page;
    
            $('#pagination').twbsPagination({
                totalPages: total_page,
                visiblePages: current_page,
                onPageClick: function (event, pageL) {
                    page = pageL;
                    if(is_ajax_fire != 0){
                      getPageData();
                    }
                }
            });
    
            manageRow(data.data);
            is_ajax_fire = 1;
        });
    }
    
    /* Get Page Data*/
    function getPageData() {
        
        $.ajax({
            dataType: 'json',
            url: 'posts',
            data: {page:page}
        }).done(function(data){
        // console.log(data);
        manageRow(data.data);
        });
    }
    function manageRow(data) {
         
        var trHTML = '';
        $.each(data, function (i, item) {
            
            trHTML = trHTML+ '<tr>' ;
            trHTML = trHTML+ '<td id="row1">' + item.title + '</td>' ;
            trHTML = trHTML+ '<td id="row2">' + item.body + '</td>' ;
            trHTML = trHTML+ '<td data-id="'+item.id+'">';
            trHTML = trHTML+'<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button>';
            trHTML = trHTML+'<button class="btn btn-danger remove-item" >Delete</button>';
            trHTML = trHTML+'</td>';
            trHTML = trHTML+'</tr>';
        });
        
        $('#records_table > tbody').html(trHTML);
        
    }

//insert element through ajax call

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
 
            $(document).on('click','.crud-submit', function(){
            
            $.ajax({
                type: 'post',
                url: 'addItem',
                data: {
                    // '_token': $('input[name=_token]').val(),
                     'title': $('input[name=title]').val(),
                     'body': $('input[name=body]').val(),
                     '_token': $('input[name=_token]').val(),
                },
                success: function(data){
                    
                    if ((data.errors)) {
                        $('.error').removeClass('hidden');
                        $('.error').text(data.errors.name);
                    } else {
                        getPageData();
                         $('.error').remove();
                         toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
                    }
                }
            });
            
        });

        //remove item
        $("body").on("click",".remove-item",function(){
            
             var id = $(this).parent("td").data('id');
        
            var c_obj = $(this).parents("tr");
            
            $.ajax({
                dataType: 'json',
                type:'delete',
                url: 'delete' + '/' + id,
            }).done(function(data){
                console.log(data);
                c_obj.remove();
                toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
                getPageData();
            });
        });
        //edit data
        $("body").on("click",".edit-item",function(){
            var id = $(this).parent("td").data('id');
            var title = $(this).parent("td").prev("td").prev("td").text();
            var body = $(this).parent("td").prev("td").text();
            $("#edit-item").find("input[name='title']").val(title);
            $("#edit-item").find("input[name='body']").val(body);
            $("#edit-item").find("form").attr("action",'editPost' + '/' + id);
            
        });
        /* Updated new Item */
$(".crud-submit-edit").click(function(e){
    e.preventDefault();
    var form_action = $("#edit-item").find("form").attr("action");
    var title = $("#edit-item").find("input[name='title']").val();
    var body = $("#edit-item").find("input[name='body']").val();

    $.ajax({
        dataType: 'json',
        type:'PUT',
        url: form_action,
        data:{title:title, body:body}
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
    });
});

});