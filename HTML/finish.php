<?php
    // @@@@ Importing api classes for infobit @@@@

    use infobip\Configuration;
    use infobip\Api\SmsApi;
    use infobip\Model\SmsDestination;
    use infobip\model\SmsTextualMessage;
    use infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__ . "/../vendor/autoload.php";

    include_once("../PHP/databaseconnect.php");
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];

        // @@@ SMS API @@ 
        $base_url = "https://3g4mgj.api.infobip.com";
        $api_key = "6682f9a8a496c561af94e45b9974a3d7-b101cd5e-f20d-40e0-a74d-3ae524d76db3";
        $configuration = new Configuration(host: $base_url, apiKey: $api_key);
        $api = new SmsApi(config: $configuration);
        $destination = new SmsDestination(to: '237672280977');
        $message = new SmsTextualMessage
        (
            destinations: [$destination], 
            text: "Your project is now completed and has been mailed to you"
        );
        $request = new SmsAdvancedTextualRequest(messages: [$message]);
        $response = $api->sendSmsMessage($request);

        echo "<script> alert('Customer has been notified via SMS') </script>";

    }
?>