var page = 1;
var current_page = 1;
var total_page = 0;
var is_ajax_fire = 0;

//manageData();
loadProv();
loadSets();


function loadProv(){
	$.ajax({
       dataType: 'json',
       url: '../dashboard/view_location'
	}).done(function(data){

       manageOpt(data.data);

    });
}

function loadSets(){
	
	$.ajax({
       dataType: 'json',
       url: '../dashboard/load_sets'       
	}).done(function(data){
		
       manageSets(data.data);
	   
    });
}

function manageOpt(data){
	var opt = '';
	
	$.each(data, function (key, value){
		opt = opt + '<option value="' + value.id + '">' + value.name + '</option>';		
	});
	
	$(".ddl-prov").html(opt);
}

function manageReg(data){
	var opt = '';
	
	$.each(data, function (key, value){
		opt = opt + '<option value="' + value.id + '">' + value.name + '</option>';		
	});
	
	$(".ddl-reg").html(opt);
}

function manageSets(data){
	var opt = '';
	
	$.each(data, function (key, value){
		opt = opt + '<option value="' + value.id + '">' + value.set_name + '</option>';		
	});
	
	$(".ddl-sets").html(opt);
}

$(".ddl-prov").change(function(){
	var province_id = $(".ddl-prov option:selected").val();
	
	$.ajax({
		dataType: 'json',
		type: 'POST',
		url : '../dashboard/load_regencies',
		data:{province_id:province_id}
	}).done(function(data){
		manageReg(data.data);
	});
});


function manageRow(data) {

    var	rows = '';	
    $.each( data, function( key, value ) {

        rows = rows + '<tr>';
        rows = rows + '<td>'+value.id+'</td>';
        rows = rows + '<td>'+value.name+'</td>';       
		rows = rows + '<td data-id="'+value.id+'">';		
        rows = rows + '<button class="btn btn-primary crud-select">Pilih</button>';        
        rows = rows + '</td>';
        rows = rows + '</tr>';

    });    
    $("tbody").html(rows);

}


/* search new Item */
$(".crud-search-fas").click(function(e){

    e.preventDefault();
	
    var form_action = $("#search-facilitator").find("form").attr("action");
    var facilitator_name = $("#search-facilitator").find("input[name='facilitator_name']").val();    	
    $.ajax({
        dataType: 'json',
        type:'POST',
        url: form_action,        
		data:{name:facilitator_name}
    }).done(function(data){
		
		manageRow(data.data,'');

    });

});

 
$("body" ).on("click",".crud-select",function(e){
	
	e.preventDefault();
	
	var id = $(this).parent("td").data('id');
    var full_name = $(this).parent("td").prev("td").text();
	
	$("#registerFrm").find("input[name='facilitator_id']").val(id);
	$("#registerFrm").find("input[name='facilitator_name']").val(full_name);
	
	
	$(".modal").modal('hide');
}); 



