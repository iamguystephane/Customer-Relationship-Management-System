<?php
    // @@@@ Importing api classes for infobit @@@@

    use Infobip\Configuration;
    use Infobip\Api\SmsApi;
    use Infobip\Model\SmsDestination;
    use Infobip\model\SmsTextualMessage;
    use Infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__ . "/../vendor/autoload.php";

    include_once("../PHP/databaseconnect.php");
    if(isset($_GET["id"]))
    { 
        $id = $_GET["id"];
        $sql = "UPDATE `create_project` SET Status = 'Accept' where ID = $id";
        $result = mysqli_query($conn,$sql);

        // @@ Infobip api implementation @@ 


        $base_url = "https://3g4mgj.api.infobip.com";
        $api_key = "6682f9a8a496c561af94e45b9974a3d7-b101cd5e-f20d-40e0-a74d-3ae524d76db3";
        $configuration = new Configuration(host: $base_url, apiKey: $api_key);
        $api = new SmsApi(config: $configuration);
        $destination = new SmsDestination(to: '237672280977');
        $message = new SmsTextualMessage
        (
            destinations: [$destination], 
            text: "Your project has been accepted",
            from: "VITNACRM"
        );
        $request = new SmsAdvancedTextualRequest(messages: [$message]);
        $response = $api->sendSmsMessage($request);

        echo "<script> alert('Customer has been notified via SMS') </script>";
        header("Location: admin_dashboard.php");
    }
    
?>