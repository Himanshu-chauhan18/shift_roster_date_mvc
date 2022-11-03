<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <title>Category wise Seat Allocation</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-10">
         <form id="submitForm">
           <table class="table table-striped shadow-lg p-3 mb-5 bg-white rounded table-hover mx-auto w-auto  text-center" style="margin-top:20px;">
                <thead>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Shift</th>
                    <th>Action</th>
                <thead>
				<tbody  id="addrow">  
                          
				</tbody>
                <tr>
                <td><select name="employee" class="form-control mt-5">
                    <option value="" >Select value</option>
                </select></td>
                <td><button type="submit" class="btn btn-success mt-5">Save</button></td>
                <td></td>
                <td></td>
                </tr>
			</table>
            </form>
            </div>
        </div>
    </div>

    <script>

var k=0
var j=0;
var m=0;
addRow()
function addRow()
  {
   
    $('#addrow').append('<tr><td>'+'<input id="from'+ j +'" class="form-control fromDate" autocomplete="off" type="date"  name="from[]">'+'</td>'+
    ' <td>'+'<input readonly  class="form-control toDate" id="to'+ j +'" autocomplete="off" type="date" name="to[]" >'+'</td>'+
    '<td>'+'<select class="form-control" name="shift[]" id="shift'+ k +'">'+
    '<option value="" selected>Shift</option>'+
    '</select>'+'</td>'+
    '<td>'+'<button type="button"  id="btn" class="btn btn-info" onclick="addRow(); setNextDate();">+</button>'+'</td></tr>');
    getshiftData()
    j++;
}



  $('#submitForm').submit(function(a){
        a.preventDefault();
		var user = $('#submitForm').serialize();   
			$.ajax({
				type: 'POST',
				url: 'http://localhost/shift_roster_date_mvc/welcome/saveData',
				data: user,
				success:function(t){
                    $('#submitForm')[0].reset();
                    $('#addrow').find('tr').remove();
                    addRow()
                    alert('Data saved successfully')
				}
			});
	});
  

function getshiftData(){
    $.ajax({
            url: "http://localhost/shift_roster_date_mvc/welcome/getshift",
            dataType: 'Json',
            success: function(data) {
              for(let i = 0; i < data.length; i++) {
                $('#shift'+k).append('<option value="'+ data[i].Id +'">'+ data[i].Name +'</option>');
              }
              k++;  
            
            }
        });
      }
      
  getemployeeData();
  function getemployeeData() {
    $ .ajax({
            url: "http://localhost/shift_roster_date_mvc/welcome/getemployeeData",
            dataType: 'Json',
            success: function(d) {
                console.log(d)
              for(let i = 0; i < d.length; i++) {
                $('select[name="employee"]').append('<option value="'+ d[i].Id +'">'+ d[i].Name +'</option>');
              }
            }
        });
  }

setdate()
function setdate() {
var getDate = new Date().toISOString().split('T')[0];
$("#from"+(j-1)).attr('min',getDate);
};
 
$('#from'+(j-1)).on('change', function(){
  $('#to'+(j-1)).removeAttr('readonly');
    $('#to'+(j-1)).attr('min', $('#from'+(j-1)).val());
});
 
function setNextDate()
{
     m=j;
     date = $('#to'+(m-2)).val()
     const dt = new Date(date)
     dt.setDate(dt.getDate() + 1);
     $('#from'+(j-1)).attr('min',dt.toISOString().split('T')[0]);

    $('#from'+(j-1)).on('change', function(){
       $('#to'+(j-1)).removeAttr('readonly');
    $('#to'+(j-1)).attr('min', $('#from'+(j-1)).val());
});
 
}






 


    </script>
  
  
</body>

</html>