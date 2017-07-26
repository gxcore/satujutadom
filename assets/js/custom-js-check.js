var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;
var queries = null;

manageData();

/* manage data list */
function manageData(){	   
   $.ajax({
      dataType: 'json',	  
      url: 'dashboard/view_request',	  
      //data: {page:page}
    }).done(function(data){
       total_page = data.total % 5;
       current_page = page;	   
       $('nav ul.pagination').twbsPagination({
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
	//console.log(queries);
    $.ajax({
		dataType: 'json',
		type:'POST',
		url: 'dashboard/view_request',
		data: {page:page, q:queries}
	}).done(function(data){

		//console.log(data.queries);
		manageRow(data.data);

    });

}

/* Add new Item table row */
function manageRow(data) {

    var	rows = '';

    $.each( data, function( key, value ) {

        rows = rows + '<tr>';
        rows = rows + '<td>'+value.id+'</td>';
		rows = rows + '<td>'+value.req_name+' / <br>'+value.company+'</td>';
        rows = rows + '<td>'+value.fac_name+'</td>';
		rows = rows + '<td>'+value.prov+' / <br><small>'+value.reg+'</small></td>';
        rows = rows + '<td data-id="'+value.id+'" data-st-id="'+value.status_next_id+'">';
        rows = rows + '<a data-toggle="modal" data-target="#view-stat" class="view-detail-stat" href="#" title="klik untuk melihat detil status"><big><span class="badge badge-pill badge-success btn-block">'+value.status+'</span><br>';
        rows = rows + '<span class="badge badge-pill badge-warning btn-block"><i class="fa fa-arrow-right" aria-hidden="true"></i> '+value.status_next+'</span></big></a><br>';
        rows = rows + '</td>';
        rows = rows + '</tr>';

    });

    $("tbody").html(rows);

}

$("body").on("click","a.view-detail-stat",function(){
	var m = $('.modal#view-stat');
	var ids = $(this).parent("td").data();
	var req = $(this).parent("td").prev("td").prev("td").prev("td").text();
	var fac = $(this).parent("td").prev("td").prev("td").text();
	var loc = $(this).parent("td").prev("td").text();
	//console.log(ids);
	m.find('.modal-title > span').text('Request #'+ids.id);
	m.find('.modal-body').empty().append('<h5>'+req+'</h5>');
	m.find('.modal-body').append('<h6>'+loc+'</h6>');
	m.find('.modal-body').append('<h6>Fasilitator: '+fac+'</h6><p><br>Status permohonan:</p><div class="btn-group-vertical btn-block"></div>');
	
    $.ajax({
        dataType: 'json',
        type:'post',
        url: 'dashboard/get_status_update_list',
		data: { id: ids.id }
    }).done(function(data){
		prev = "1";
		$.each( data, function( i, v ) {
			flag = (v.flag == "1") ? 'btn-success' : 'btn-outline-primary';
			check = (v.flag == "1") ? 'check-square-o' : 'square-o';
			flag = (v.flag == "0" && prev == "1") ? 'btn-warning' : flag;
			check = (v.flag == "0" && prev == "1") ? 'square' : check;
			m.find('.modal-body .btn-group-vertical').append('<a class="btn '+flag+' btn-sm text-left" href="#"><i class="fa fa-'+check+'" aria-hidden="true"></i> '+v.description+'</a>');
			prev = v.flag;
		});

    });
	
	
	//<a class="button-dl btn btn-outline-info btn-md  text-left" href="http://localhost/1.Project-Ongoing/satujutadom/admin/status?cid=11012"><i class="fa fa-users" aria-hidden="true"></i>supra.biz.id</a>
	
	
});

$('form#lookupreq').submit( function(event) {
	event.preventDefault();
	queries = $(this).serializeArray();
	//console.log(queries);
    getPageData();
});


/* Remove Item */
$("body").on("click",".remove-item",function(){

    var id = $(this).parent("td").data('id');
    var c_obj = $(this).parents("tr");

    $.ajax({
        dataType: 'json',
        type:'delete',
        url: 'delete_requestor' + '/' + id,
    }).done(function(data){

        c_obj.remove();
        toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
        getPageData();

    });

});

/* Edit Item */
$("body").on("click",".update-status",function(){

	var send = $(this).parent("td").data();
    var req = $(this).parent("td").prev("td").prev("td").prev("td").text();
	//console.log(send);
	if ( !confirm("Yakin update status untuk " + req + '?') ) {
		return 0;
	} else {
		$.ajax({		
			dataType: 'json',
			type:'POST',
			url: 'dashboard/update_status_next/',
			data: send
		}).done(function(data,st){
			getPageData();
			//$(".modal").modal('hide');
			toastr.success('Status for '+ req +' Updated Successfully.', 'Success Alert', {timeOut: 5000});

		});
	}
    //$("#edit-item").find("input[name='ktp_number']").val(ktp_number);
    //$("#edit-item").find("input[name='full_name']").val(full_name);
	//$("#edit-item").find("input[name='company']").val(company);
    //$("#edit-item").find("form").attr("action",'../dashboard/edit_requestor/' + id);

});

/* Updated new Item */
$(".crud-submit-edit").click(function(e){

    e.preventDefault();

    var form_action = $("#edit-item").find("form").attr("action");
    var ktp_number = $("#edit-item").find("input[name='ktp_number']").val();
	var full_name = $("#edit-item").find("input[name='full_name']").val();
	var company = $("#edit-item").find("input[name='company']").val();    
	
    $.ajax({		
        dataType: 'json',
        type:'POST',
        url: form_action,     
		data:{ktp_number:ktp_number,full_name:full_name,company:company}				
    }).done(function(data){
        getPageData();
        $(".modal").modal('hide');
        toastr.success('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});

    });
});



if (typeof startlook !== 'undefined' && startlook) {
    $('form#lookupreq').submit();
}