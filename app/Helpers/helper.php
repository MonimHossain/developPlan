<?php
if
	(!function_exists('required'))
{
function required(){
	echo "<span style='color:red;'>*</span>";
}
}
if
	(!function_exists('selected'))
{
function selected($id,$select_id){
	if($id==$select_id)
	{
		echo "selected";
	}
	else
	{
		return false;
	}
}
function check_date_equality($user_date,$mysql_date){
	if(app('CommonClass')->dateTomysql($user_date)==$mysql_date)
	return true;
	else
	return false;

}


}
 function attachement_type_array(){
	return $attachement_type_array=[1=>'Unapprove_Project',2=>'Approve_Project',3=>'Adp_Allocation',4=>'Radp_Allocation',5=>'guideline',6=>'Fa_budget_and_accounts'];
}

function download($file_name) :void{
	if(is_null($file_name)) {
        return;
    }
	$url=route('download');
	echo '<form action='."$url".'>';
    echo '<input name="file_name" type="hidden" value='."$file_name".'>';
    echo '<button class="btn btn-success" type="submit"><i class="icon icon-download"></i>Download!</button>';
    echo '</form>';

}

function custome_print($div_id,$orientadion=False,$name) :void{

	printf('<button style=" float: right;" class="btn btn-success span2" onClick="printDiv(\'%s\',\'%b\');">%s</button> ', $div_id, $orientadion,$name);
}

function convertToZiro($value)
{
	if($value==null)
		{
		return 0;
		}

		return $value;
}


 


 
