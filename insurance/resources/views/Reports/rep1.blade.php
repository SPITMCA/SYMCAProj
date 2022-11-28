
 <style type="text/css">
   table.a {
  table-layout: auto;
  width: 100%;   

}

.icon-red {
  color: blue;
}

.fotters{
	color: #9F9F9F;
	background: #202020;
	text-align: center;
	font-size: 11px;
	padding: 20px 0;
	margin-top: 20px;
	}
  
 
   </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">       

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<div class="main mt-4 mb-2">
    <div class="content-wrapper">
        <div class="container-sm">
            <div class="row">
                <div class="col-md-12">


                <br><br><br>

                        <h2 class="page-title">Claim Details</h2>
                        <hr>

                        <div class="card" align="center">
						<br><br>

<div align="center">
<select id="year" type="dropdown-toggle" class="form-control  btn btn-secondary dropdown-toggle" name="year" style="width:130px">
<option value="">select year </option>
@foreach($year2 as $year2)
<option value="{{$year2->hc_date_yr}}">{{$year2->hc_date_yr}}</option>
@endforeach
</select>

<select id="dis_type" type="dropdown-toggle" class="form-control  btn btn-secondary dropdown-toggle" name="year" style="width:130px">
<option value="">select disease_type </option>
@foreach($dis_ty as $dis_ty)
<option value="{{$dis_ty->hc_desc_dis}}">{{$dis_ty->hc_desc_dis}}</option>
@endforeach
</select>

<script>
 document.getElementById("dis_type").onchange = function(){
    var value = document.getElementById("year").value;
    var value1 = document.getElementById("dis_type").value;
	window.location.href = '/report1' +value+'/'+value1;
 };
</script>

@if (session('report1_sess'))
<label ><h4><b>-----Select type of chart-----</h4></b></label>
 <select name ="chart"  id="chart" onchange="myfunction()" class="form-control  btn btn-secondary dropdown-toggle" style="width:120px;">
    <option value="pie">PIE</option>
    <option value="column">COLUMN</option>
    <option value="pyramid">PYRAMID</option>
    <option value="bar">BAR</option>
    <option value="line">LINE</option>
    <option value="area">AREA</option>
</select>

<button id="exportChart" class=" btn btn-secondary ">Export Chart</button>

<br><br>

<div id="chartContainer" style="height: 300px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Per-Year data "
	},
	axisY: {
		title: "TOTAL_CLAIMS"
	},
	data: [{        
		type:"column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "total claims",
        indexLabel:"{label} ({y})",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


document.getElementById("exportChart").addEventListener("click",function(){
    	chart.exportChart({format: "jpg"});
    }); 

}


function myfunction(){

var chartype=document.getElementById("chart").value;

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Per-Year data "
	},
	axisY: {
		title: "TOTAL_CLAIMS"
	},
	data: [{        
		type: chartype ,//"column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "total claims",
        indexLabel:"{label} ({y})",
		dataPoints: <?php echo json_encode($data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();


document.getElementById("exportChart").addEventListener("click",function(){
    	chart.exportChart({format: "jpg"});
    }); 

}
//window.onload = function () {
    
</script>


<br><br><br><br><br><br>
</div>
        </div>
        </div>
        </div>
        </div>
        <br><br>
        
<div class="container-fluid">
 

 <div class="card shadow mb-4">

         <div class="card-header py-3">
           <h6 class="m-0 font-weight-bold text-danger">Claim Data</h6>

         </div>
     <div class="card-body">
         <div class="table-responsive" style="overflow:scroll; height:85vh;">
         <div id="tab" align="center">

<table class="table-bordered a" id="dataTable" width="100%" cellspacing="0">
                        <thead align="center" >
                            <tr height="60px">
                                <th scope="col">Claim_id</th>
                                <th scope="col">Diseses type</th>
                                <th scope="col">Customer Id</th>
                                <th scope="col">Cover Id</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Timestamp</th>


                            </tr>
                        </thead>
                        <tfoot align="center">
                        <tr height="60px">
                        <th scope="col">Idea_id</th>
                                <th scope="col">Claim_id</th>
                                <th scope="col">Diseses type</th>
                                <th scope="col">Customer Id</th>
                                <th scope="col">Cover Id</th>
                                <th scope="col">Start date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Timestamp</th>
                        </tr>
                        </tfoot>
                        <tbody align="center">
                        @foreach($top_idea_report as $top_idea_report)
                        <tr height="60px">
                        <td>{{$top_idea_report->hc_id}}</td>
                        <td>{{$top_idea_report->hc_desc}}</td>
                        <td>{{$top_idea_report->hc_cid}}</td>
                        <td>{{$top_idea_report->hc_cvid}}</td>
                        <td>{{$top_idea_report->hc_sdt}}</td>
                        <td>{{$top_idea_report->hc_edt}}</td>
                        <td>{{$top_idea_report->hc_date}}</td>
                        </tr>
                        @endforeach
        
                        </tbody>
                </table>
              <br>
              <br>
                </div>
        </div>
        <br>
        <p align="center">
        <input class="btn btn-primary" type="button" value="Print PDF" 
            id="btPrint" onclick="createPDF()" />
    </p>
    </div>
                </div>  
            </div>
</body>
</div>
<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
       // <title> FOR PDF HEADER.
         
        win.document.write('</head>');
        win.document.write('<body>');
      
        win.document.write('<img style="display: block; margin-left: auto; margin-right: auto;" src="../images/spitlogo.jpg"/>');
        win.document.write(' <h2 style="text-align: center;">Bharatiya Vidya Bhavans</h2>');
        win.document.write(' <h2 style="text-align: center;">Sardar Patel Institute of Technology</h2>');

        win.document.write(' <div class="container"><hr></div>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script> 

@endif
