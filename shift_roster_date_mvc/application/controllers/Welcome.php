<?php
class Welcome extends Controller
{
   
    function __construct()
    {
        parent::__construct();
    }

  
public function  read()
{
	$login_model = $this->loadModel('Login');
	$arr=$login_model->read(); 
}

public function getshift()
{
	$login_model = $this->loadModel('Login');
	$arr=$login_model->getAllshift(); 
	echo json_encode($arr);
}

public function getemployeeData()
{
	$login_model = $this->loadModel('Login');
	$arr1=$login_model->getAllemployee(); 
	echo json_encode($arr1);
}

public function saveData()
{
	
	function getDatesFromRange($start, $end, $format = 'Y-m-d') {
      
		$array = array();
		$interval = new DateInterval('P1D');
		$realEnd = new DateTime($end);
		$realEnd->add($interval);
	  
		$period = new DatePeriod(new DateTime($start), $interval, $realEnd);

		foreach($period as $date) {                 
			$array[] = $date->format($format); 
            }
		return $array;
	}

	for($i=0;$i<count($_POST['from']);$i++){
		$date['date'][]=getDatesFromRange($_POST['from'][$i],$_POST['to'][$i]);
		 $date['shift'][]=$_POST['shift'][$i];
	}
	$date['name'][]=$_POST['employee'];
	$login_model = $this->loadModel('Login');
	$login_model->saveAllEmployee($date); 

	echo "<pre>";print_r($date);echo "</pre>";
}

}