<?php
    // @@@@ Importing api classes for infobit @@@@

    // use infobip\Configuration;
    // use infobip\Api\SmsApi;
    // use infobip\Model\SmsDestination;
    // use infobip\model\SmsTextualMessage;
    // use infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__ . "/../vendor/autoload.php";

    include_once("../PHP/databaseconnect.php");
    if(isset($_GET["id"]))
    { 
        $id = $_GET["id"];
        $sql = "UPDATE `create_project` SET Status = 'Accept' where ID = $id";
        $result = mysqli_query($conn,$sql);
        // header("location: admin_dashboard.php");
        echo "<script> alert('Project has been accepted') </script>";

        // @@ Infobip api implementation @@ 
        // $base_url = "https://3g4mgj.api.infobip.com";
        // $api_key = "6682f9a8a496c561af94e45b9974a3d7-b101cd5e-f20d-40e0-a74d-3ae524d76db3";
        // $configuration = new Configuration(host: $base_url, apiKey: $api_key);
        // $api = new SmsApi(config: $configuration);
        // $destination = new SmsDestination(to: '237672280977');
        // $message = new SmsTextualMessage
        // (
        //     destinations: [$destination], 
        //     text: "You just received 100000"
        // );
        // $request = new SmsAdvancedTextualRequest(messages: [$message]);
        // $response = $api->sendSmsMessage($request);

        // echo "<script> alert('Customer has been notified via SMS') </script>";

        require_once '../vendor/pear/http_request2/HTTP/Request2.php';
        $request = new HTTP_Request2();
        $request->setUrl('https://3g4mgj.api.infobip.com/sms/2/text/advanced');
        $request->setMethod(HTTP_Request2::METHOD_POST);
        $request->setConfig(array(
            'follow_redirects' => TRUE
        ));
        $request->setHeader(array(
            'Authorization' => 'App 6682f9a8a496c561af94e45b9974a3d7-b101cd5e-f20d-40e0-a74d-3ae524d76db3',
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ));
        $request->setBody('{"messages":[{"destinations":[{"to":"237672280977"}],"from":"VitnaCRM","text":"Hello, this is to let you know that your project has been accepted. Make the necessary payments so that we can start working on your project as soon as possible"}]}');
        try {
            $response = $request->send();
            if ($response->getStatus() == 200) {
                echo $response->getBody();
            }
            else {
                echo 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
                $response->getReasonPhrase();
            }
        }
        catch(HTTP_Request2_Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
?>