function onof(id){
$.post("script.php", {
operation:"onof",id:id
});
location.reload();

}
function dalee(){
	$("#nachalo").css('display', 'none');
}


function startTimer() {

    var my_timer = document.getElementById("my_timer");
    var time = my_timer.innerHTML;
    var arr = time.split(":");
    var h = arr[0];
    var m = arr[1];
    var s = arr[2];
    if (s == 0) {
        if (m == 0) {
            if (h == 0) {
                alert("Осталась одна минута");
                $('input:radio').attr('disabled', 'disabled');
                return;
            }
            h--;
            m = 60;
            if (h < 10) h = "0" + h;
        }
        m--;
        if (m < 10) m = "0" + m;
        s = 59;
    }
    else s--;
    if (s < 10) s = "0" + s;
    document.getElementById("my_timer").innerHTML = h+":"+m+":"+s;
    $('#my_timer2').val(my_timer.innerHTML);
    setTimeout(startTimer, 1000);
}


function addotvet(){
	vrem=$('#my_timer2').val();
	$('#vopros').css('display','none');
	$('#rezult').css('display','inline');
	obsh=0;
	/*rezotv=0;*/
	for(var i=0;i<31;i++)
	{
		rezotv=$('input:radio[name=vop'+i+']:checked').val();
		
		$('#otvrez'+i).val(rezotv);
		if(rezotv==''){
			$('#otv'+i).html('<span style="color:green">Пока нет ответа</span>');
			//rezotv==0;
		}
		else if(rezotv==1){
			$('#otv'+i).html('<span style="color:blue">Ответ сохранен</span>');
			
			obsh++;
		}else if(rezotv==0){
			$('#otv'+i).html('<span style="color:blue">Ответ сохранен</span>');
		}
		if(rezotv!='' || rezotv!=0){
		
		}
	}
	$('#obsh').text(obsh);
	$('#obshhid').val(obsh);
	$('#vrem').text(vrem);
	
}

function reversotv(){
	ispr=$('#ispr').val()-1;

	$('#ispr').val(ispr);
	$('#kolispr').text(ispr);
	if (ispr<=0){
		$('#reversotvb').prop('disabled',true);
	}
	
	$('#rezult').css('display','none');
	$('#vopros').css('display','inline');
	
}

$(function(){

    $('#cat').change(function(){
        var code = $(this).val();
                $.post("/load/",{code}, function (data) {
                   $('#cat2').html(data);
                });

            });

});

function addpole() {
    var $i = $("#i").val();
    $i = parseInt($i);
    $s = $i+1;
    $('#i').val($s);

    $('#eshevar').append('<input type="radio" name="prav2[]" value="'+$s+'"><input class="form-control" type="text" name="var2[]" value="'+$s+'">' +
        '<a href=""><i class="glyphicon glyphicon-minus" aria-hidden="true">' +
        '</i></a>');


}

function delpole($id) {

    var code = $id;
    if (confirm("Вы действительно хотите удалить поле и его содержимое")) {
        $.post("/delpole/", {code}, function (data) {
            location.reload();

        });
    } else {
        location.reload();
    }

}

function addtest() {
    var vopros = $('#vopros').val();
    alert(vopros);
}