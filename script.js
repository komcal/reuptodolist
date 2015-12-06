


$(document).ready(function(){
	
	
	$("input").keypress(function(event) {
    if (event.which == 13) {

        textValue(this.form);
        
    }
	});
	function textValue(form){
		var s = form.todo.value;
		sent_to_database(s);
		
		event.preventDefault();
		var value = "<p>" + s + "</p>";
		var massage = $(value);
		$(".todobox").append('<div class="row"></div>');
		$(".row").last().append('<div class="cell_mark" ></div>');
		$(".row").last().append('<div class="cell_list"></div>');
		$(".cell_list").last().append(massage);
		var del = $("<button> x </button>");
		$(".cell_list").last().append(del);
		var check = $("<button> check </button>");
		$(".cell_mark").last().append(check);
		check = $(".cell_mark").last().children();
		check.addClass("check");
		massage.addClass("text");
		del.addClass("del");
		del = $(".cell_list").last().children().last();
		form.reset();

		check.on("click",function(){
			var word = $(this).parent().next().children().first();
			if(!word.hasClass("selected")){
				word.addClass("selected");
				mark_data(1,s);
			}
			else {
				word.removeClass("selected");
				mark_data(0,s);
			}
		});
		del.on("click",function(){
			
			$(this).parent().parent().remove();
			
			del_database(s);
		});
		
		
	}

	
});		
	
function sent_to_database(todo,user){
	$.ajax({
		url: 'conn.php',
		type: "POST",
		data:{
			data:todo
			
		}
		

	});
}
function del_database(todo){
	$.ajax({
		url: 'del.php',
		type: "POST",
		data:{
			data:todo
		}
		

	});
}
function mark_data(status,todo){
	
	$.ajax({
		url: 'mark.php',
		type: 'POST',
		data:{
			check: status,
			data: todo
		}
	});
}


	function push_data(data,m){
		
		var value = "<p>" + data + "</p>";
		var massage = $(value);
		$(".todobox").append('<div class="row"></div>');
		$(".row").last().append('<div class="cell_mark" ></div>');
		$(".row").last().append('<div class="cell_list"></div>');
		$(".cell_list").last().append(massage);
		var del = $("<button> x </button>");
		$(".cell_list").last().append(del);
		var check = $("<button> check </button>");
		$(".cell_mark").last().append(check);
		check = $(".cell_mark").last().children();
		check.addClass("check");
		massage.addClass("text");
		del.addClass("del");
		del = $(".cell_list").last().children().last();

		if(m == 1){
			check.parent().next().children().first().addClass("selected");
		}


		check.on("click",function(){
			var word = $(this).parent().next().children().first();
			if(!word.hasClass("selected")){
				word.addClass("selected");
				mark_data(1,data);
			}
			else {
				word.removeClass("selected");
				mark_data(0,data);
			}
		});
		del.on("click",function(){
			
			$(this).parent().prev().remove();
			$(this).parent().remove();
			del_database(data);
		});

}

