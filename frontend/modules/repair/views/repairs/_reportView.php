<?php

use frontend\modules\repair\models\Repairs;

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>

    </style>
    <body>
        <div class="container" style="padding-left: 5px; font-size:15pt;">

            <img src="img/cdcswl.png" width="58" height="59" class="pull-left"> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           
                <strong style="font-size:21pt;">ใบแจ้งซ่อม</strong>
            
        </div> 
        <div style="padding-left: 500px; font-size:15pt;">เขียนที่โรงพยาบาลศรีวิไล</div>
        <div style="padding-left: 400px; font-size:15pt;">วันที่&nbsp;&nbsp;&nbsp;<?= thainumDigit(DateThaiLong($model->createDate));?></div>
             
             
              <div style="font-size:15pt;">
                  เรื่อง&nbsp;&nbsp;&nbsp;&nbsp;
                  ขอเบิกพัสดุ<br>
                  เรียน&nbsp;&nbsp;&nbsp;&nbsp;
                  ผู้อำนวยการโรงพยาบาลศรีวิไล
              </div>
            <p>
           <div style="font-size:15pt;">
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               ข้าพเจ้า <?= $model->repairuser->profile->name;?>&nbsp;หน่วยงาน&nbsp;&nbsp;<?= $model->repairdep->name;?>
               &nbsp;&nbsp;
               
           </div>
            <p>
           
           <div style="font-size:15pt;">           
               ลงชื่อ..............................................<br>
               ( <?= $model->repairprofile->name;?> )
               
               <?php echo Yii::$app->user->identity->profile->department_id; ?>
           </div>            
           
            
           
               

                <div style="padding-left: 200px; font-size:15pt;"><u><b>คำสั่ง</b></u> &nbsp;&nbsp; &nbsp;&nbsp;<b>[ ] อนุญาต</b> &nbsp;&nbsp;  &nbsp;&nbsp;<b>[ ] ไม่อนุญาต</b>  &nbsp;&nbsp;&nbsp;<br><p><p><p><p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>ความเห็นผู้บังคับบัญชา</b> <br><p><p>
                
                ลงชื่อ...............................................<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( นายแพทย์กฤษณพงษ์  ชุมพล )<br>               
                นายแพทย์ ชำนาญการ รักษาการในตำแหน่ง<br>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ผู้อำนวยการโรงพยาบาลศรีวิไล
              
                <p>
                

              </div>
        </div>


    </body>
</html>
<?php

function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		//$strYear=substr($strYear,2,2);
		return "$strDay $strMonthThai $strYear";
	}
       // echo DateThai(date('Y-m-d'));
?>
<?php

function DateThaiLong($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธํนวาคม");
		$strMonthThai=$strMonthCut[$strMonth];
		//$strYear=substr($strYear,2,2);
		return "$strDay $strMonthThai $strYear";
	}
       // echo DateThai(date('Y-m-d'));
?>


<?php
function thainumDigit($num){
    return str_replace(array( '0' , '1' , '2' , '3' , '4' , '5' , '6' ,'7' , '8' , '9' ),
    array( "o" , "๑" , "๒" , "๓" , "๔" , "๕" , "๖" , "๗" , "๘" , "๙" ),
    $num);
};
?>


