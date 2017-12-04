

 $(document).ready(function(){


    //url ='posts/index';
    var page = 1;
    var current_page = 1;
    var total_page = 0;
    var is_ajax_fire = 0;
    
    getPageData();
    //url='ajaxtest/show'
    /* Get Page Data*/
    function getPageData() {
        alert('dnfvn');
        $.ajax({
            dataType: 'json',
            url: url,
            data: {

                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
        }).done(function(data){
            alert('called');
            manageRow(data.data);
            
        });
    }
    

/* Add new Item table row */
function manageRow(data) {
   // var	rows = '<h1>Test</h1>';
   //var parsed_data = JSON.parse(data);
    // $.each(data, function(index, obj){
    //     var tr = $("<tr></tr>");
        
    //     tr.append("<td>"+ obj.id +"</td>");
    //     tr.append("<td>"+ obj.title +"</td>");
    //     tr.append("<td>"+ obj.body +"</td>");
    //     tr.append("<td>"+ obj.cover_image +"</td>");
        
    //     $("#my-containing-data").append(tr);
    // });
    $('#my-containing-data').html(data);
    $.each( data, function( key, value ){
        console.log(value.title+"   "+value.body);
    });
	
	// $.each( data, function( key, value ) {
	//   	rows = rows + '<tr>';
	//   	rows = rows + '<td>'+value.title+'</td>';
    //     rows = rows + '<td>'+value.body+'</td>';
    //     rows = rows + '<td>'+value.body+'</td>';
	//   	rows = rows + '<td data-id="'+value.id+'">';
    //             rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
    //             rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';
    //             rows = rows + '</td>';
	//   	rows = rows + '</tr>';
	// });
   // $("#tdata").html(rows);
    //$("tbody").html(rows);
}
//     //insert post

// alert(action);
//  $('#subbtn').click(function(){
//     alert('title');
//         var form_action = $("#create_form").attr("action");
        
//         var title = $("#create_form").find("input[name='title']").val();
//         //alert(title);
//         var body = $("#create_form").find("input[name='body']").val();

//        var cover_image = $("#create_form").find("textarea[name='body']").val();
//         alert(form_action);
//         $.ajax({
//             dataType: 'json',
//             type:'POST',
//             url: form_action,
//             data:{title:title, body:body}
//         }).done(function(data){
//             alert(data.success);
//             if(data.success) {
//                 alert('jgbbbbbbbbbbbbbbbbbbbbb');
//                 // getPageData();
//                 // $(".modal").modal('hide');
//                  toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
//             }
//             else {
//                 alert('no success');
//                 console.log('hdchdchj');
//                 // $(".modal").modal('hide');
//                 // toastr.error('Item Creation Failed.', 'Error', {timeOut: 5000});
//             }
//         });
//     }); 
 });