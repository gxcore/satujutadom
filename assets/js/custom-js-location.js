var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

manageData();

function initCap(string) {
    return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}

/* manage data list */
function manageData(){	   
   $.ajax({
      dataType: 'json',	  
      url: 'get_provinces',	        
    }).done(function(data){
	   /* for(k=0;k<data.length;k++){
			alert("Index: " + k + " value: " + data[k]);
		} */
       total_page = data.total % 5;
       current_page = page;	   
	   
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
       url: 'get_provinces',
       data: {page:page}
	}).done(function(data){

       manageRow(data.data);

    });

}

/* Add new Item table row */
function manageRow(data) {

    var	rows = '';

    $.each( data, function( key, value ) {

        rows = rows + '<tr>';
        rows = rows + '<td>'+value.id+'</td>';
        rows = rows + '<td>'+value.name+'</td>';       
		rows = rows + '<td data-id="'+value.id+'">';		
        rows = rows + '<button data-toggle="modal" data-target="#edit-item" class="btn btn-primary edit-item">Edit</button> ';
        rows = rows + '<button class="btn btn-danger remove-item">Delete</button>';		
		rows = rows + '<button class="btn btn-secondary edit-item">Detail</button>';		
        rows = rows + '</td>';
        rows = rows + '</tr>';

    });    
    $("tbody").html(rows);

}

/* Create new Item */
$(".crud-submit").click(function(e){

    e.preventDefault();

    var form_action = $("#create-item").find("form").attr("action");
    var province_name = $("#create-item").find("input[name='province_name']").val();
    //var description = $("#create-item").find("textarea[name='description']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,        
		data:{name:province_name}
    }).done(function(data){

        getPageData();
        $(".modal").modal('hide');
        toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});

    });

});

/* Remove Item */
$("body").on("click",".remove-item",function(){

    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    $.ajax({
        dataType: 'json',
        type:'delete',
        url: 'delete_provinces' + '/' + id,
    }).done(function(data){

        c_obj.remove();
        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();

    });

});

/* Edit Item */
$("body").on("click",".edit-item",function(){

    var id = $(this).parent("td").data('id');
    var province_name = $(this).parent("td").prev("td").text();
    //var description = $(this).parent("td").prev("td").text();

    $("#edit-item").find("input[name='province_name']").val(province_name);
    //$("#edit-item").find("textarea[name='description']").val(description);
    $("#edit-item").find("form").attr("action",'edit_provinces/' + id);

});

/* Updated new Item */
$(".crud-submit-edit").click(function(e){

    e.preventDefault();

    var form_action = $("#edit-item").find("form").attr("action");
    var province_name = $("#edit-item").find("input[name='province_name']").val();
    //var description = $("#edit-item").find("textarea[name='description']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,
        //data:{title:title, description:description}
		data:{name:province_name}
    }).done(function(data){

        getPageData();
        $(".modal").modal('hide');
        toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});

    });

});