<?php
    namespace doers;
    class stuff {
        public $return = array("error" => "0", "message" => "ouch");
        public function todo_get($params = array()) : array {
        $apiid = $_GET['apiid'];     
include_once 'db.php';
$result = mysqli_query($conn,"SELECT * FROM dawnwingapi WHERE id='$apiid'");
if (mysqli_num_rows($result) > 0) {

$i=0;
while($row = mysqli_fetch_array($result)) {
echo $row["WaybillNo"];
echo $row["SendAccNo"];

$i++;

$datawaybill = [
	'WaybillNo' => $WaybillNo, 
	'SendAccNo' => $SendAccNo, 
	'SendSite' => $SendSite, 
	'SendCompany' => $SendCompany, 
	'SenDAdd1' => $SenDAdd1, 
	'SendAdd2' => $SendAdd2, 
	'SendAdd3' => $SendAdd3,
	'SendAdd4' => $SendAdd4, 
	'SendAdd5' => $SendAdd5, 
	'SendContactPerson' => $SendContactPerson, 
	'SendHomeTel' => null, 
	'SendWorkTel' => $SendWorkTel, 
	'SendCell' =>	$SendCell, 
	'RecCompany' => '', 
	"RecAdd1"=> $RecAdd1,
	"RecAdd2"=> $RecAdd2,
	"RecAdd3"=> $RecAdd3,
	"RecAdd4"=> $RecAdd4,
	"RecAdd5"=> $RecAdd5,
	"RecContactPerson"=>$RecContactPerson,
	"RecHomeTel"=> "",
	"RecWorkTel"=> $RecWorkTel,
	"RecCell"=> $RecCell,
	'SpecialInstructions' => $SpecialInstructions, 
	'ServiceType' => $ServiceType, 
	'TotQTY' => '1',
	'TotMass' => '1',
	'Insurance' => 'false',
	'InsuranceValue' => '0',
	'CustomerRef' => $CustomerRef, 
	'StoreCode' => $StoreCode,
	'SecurityStamp' => null,
	'RequiredDocs' => null,	
	'WaybillInstructions' => null,
	'InstructionCode' => '',
	'IsSecureDelivery' => 'false',
	'VerificationNumbers' => null,
	'GenerateSecurePin' => 'false',
	'ColectionNo' => null,
	'invoiceRef' => null,
		"parcels" => [
			[


				"WaybillNo" => $WaybillNo,
				"Length" => $ParcelsLength,
				"Height" => $ParcelsHeight,
				"Width" => $ParcelsWidth,
				"Mass" => $ParcelsMass,
				"ParcelDescription" => "IAFRIKA",
				"ParcelNo" => $order_number . "_1",
				"ParcelCount" => 1,
			],
		],
		"CompleteWaybillAfterSave" => true,
	];

	// send API request via cURL
	$ch = curl_init();

	// set the complete URL, to process the order on the external system. Let’s consider http ->//example.com/buyitem.php is the URL, which invokes the API //
	curl_setopt($ch, CURLOPT_URL, 'http://swatws.dawnwing.co.za/dwwebservices/uat/api/waybill');
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datawaybill));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	$response = curl_exec($ch);

	curl_close($ch);

	// the handle response
	if (strpos($response, 'ERROR') !== false) {
		print_r('eror');
	} else {
		$datacompletewaybill = array(
			'waybillNo' => $WaybillNo,
			'storeCode' => $StoreCode,
			'securityStamp' => '',
			'generateLabel' => true,
		);

		// send API request via cURL
		$ch = curl_init();

		// set the complete URL, to process the order on the external system. Let’s consider http ->//example.com/buyitem.php is the URL, which invokes the API //
		curl_setopt($ch, CURLOPT_URL, 'http://swatws.dawnwing.co.za/dwwebservices/uat/api/waybill/completewaybill');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datacompletewaybill));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		$response = curl_exec($ch);

		curl_close($ch);
		$response_array = json_decode($response);
		echo $response_array->data[0];
}

}
            $this->return['messagea'] = "done";
            return $this->return;
        }
        public function todo_post($params = array()) : array {
            $this->return['message'] = "I just POST it.";
            return $this->return;
        }
        public function todo_put($params = array()) : array {
            $this->return['message'] = "I just PUT it.";
            return $this->return;
        }
        public function todo_delete($params = array()) : array {
            $this->return['message'] = "I just DELETE it.";
            return $this->return;
        }	
        }