<?php


class LoginModel
{
   
    public function __construct(Database $db)
    {
        $this->db = $db;
    }
    

                public function getAllshift()
                {
                    $sql= 'select * from shiftmaster';
                    $query = $this->db->query($sql);
                    $query->execute();
                    $arr=$query->fetchAll();
                    return $arr;    
                }

                public function getAllemployee()
                {
                    $sql1= 'select * from employeemaster';
                    $query1 = $this->db->query($sql1);
                    $query1->execute();
                    $arr1=$query1->fetchAll();
                    return $arr1;   
                }

                public function saveAllEmployee($alldata)
                {
                    $name = $alldata['name'][0];
                    for($j=0;$j<count($alldata['date']);$j++)
                    {
                        $shift=$alldata['shift'][$j];
                        for($i=0;$i<count($alldata['date'][$j]);$i++)
                        {
                        $date = $alldata['date'][$j][$i];
                        $query="insert into allemployeerecordmaster (EmployeeId,ShiftId,Date) values($name,$shift,'$date')";
                        $query_run= $this->db->prepare($query);
                        $query_run->execute();
                    }
                    
                    }
                
                }


}

    
