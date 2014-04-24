<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>REST v10 Script Builder</title>
  <link rel="shortcut icon" href="./badge_256nmd.png">

  <!-- Bootstrap -->
  <link href="./bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <style type="text/css">

      /* Large desktop */
      @media (min-width: 980px) {
        body {
          padding-top: 60px;
        }
        .linediv-l {
          border-right: 1px white solid;
        }
        .linediv-r {
          border-left: 1px white solid;
        }
        
        .container{
          padding-left:10px;
        }
      }

      /* Landscape phones and down */
      @media (max-width: 480px) {
        .copy {
          padding: 2.5% 10%;
        }
        .linediv-l {
          border-bottom: 1px white solid;
        }
        .linediv-r {
          border-top: 1px white solid;
        }
      }

          /* All form factors */
      /* Main body and headings */
      body{
        font-family: 'Open Sans', Helvetica, Arial, sans-serif;
      }
      .heading, .subheading {
        font-family: 'Ubuntu', Helvetica, Arial, sans-serif;
        text-align: center;
      }
      
      ul.treeAction{
        list-style-type: none;
        padding: 0px;
        font-size: 12px;
      }
      
      label{
        cursor:default;
      }
    </style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style>
  <input type="hidden" id="activeDocRecordIndex">
  <input type="hidden" id="activeDocRecordType">
  <input type="hidden" id="activeDocRecordId">
  <input type="hidden" id="previousContentId" value="1">
  <!-- Navbar -->
  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container" style="width:95%; padding-left:5%;">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="brand" href="./index.php" tabindex="1"><img id="sugarCube" src="./badge_256nmd.png" height="24" width="24"/> REST v10 Script Builder</a>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="active"><a href="./index.php" tabindex="2">Home</a></li>
            <li><a href="./about.php" tabindex="3">About</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <!-- Main Body -->
  <div class="container-fluid" style="padding-left:5%;">
    <div class="row-fluid">
      <div class="span5 well">
        <!-- Sidebar -->
        <!-- Script Form -->
      	<form action="index.php" class="form-inline" id="updateScriptForm" method="post" name="updateScriptForm">
        	<div class="row-fluid">
            <label class="span4" for="url">Instance</label>
            <input class="span8" type="url" id="url" name="url" size="35" value="" tabindex="4">
          </div>
        	<div class="row-fluid">
            <label class="span4" for="username">Username</label>
            <input class="span8" type="text" id="username" name="username" value="" tabindex="5"><br/>
          </div>
          <div class="row-fluid">
            <label class="span4" for="password">Password</label>
        		<input class="span8" type="password" id="password" name="password" value="" tabindex="6"><br/>
        	</div>
        	<div class="row-fluid">
            <label class="span4" for="methodType">Methods</label>
            <select class="span8" id="methodType" name="method_type" onchange="showMethodEndpoints(this.options[this.selectedIndex].value);" tabindex="7" required><option selected></option><option value="GET">GET</option><option value="POST">POST</option><option value="PUT">PUT</option><option value="DELETE">DELETE</option>
        		</select>
          </div>
          <div class="row-fluid">
            <span id="get_span"><label class="span4"></label><select class="span8" ><option value="-blank-">Select a Method</option></select></span>
          </div>
        	<div class="row-fluid">
            <span id="post_span"></span>
          </div>
        	<div class="row-fluid">
            <span id="put_span"></span>
          </div>
          <div class="row-fluid">
            <span id="delete_span"></span>
          </div>
          <div class="row-fluid">
            <span id="moduleName_span"></span>
          </div>
          <div class="row-fluid">
            <span id="username_span"></span>
          </div>
          <div class="row-fluid">
            <span id="emailAddress_span"></span>
          </div>
        	<div class="row-fluid">
            <span id="recordID_span"></span>
          </div>
          <div class="row-fluid">
            <span id="fieldName_span"></span>
          </div>
          <div class="row-fluid">
            <span id="operator_span"></span>
          </div>
          <div class="row-fluid">
            <span id="searchString_span"></span>
          </div>
          <div class="row-fluid">
            <span id="newPassword_span"></span>
          </div>
          <br/>
          <button class="btn btn-primary pull-right" id="serverConnectionSubmit" type="submit" name="scriptBuilder" tabindex="14">Create Script</button>
        	<script type="text/javascript" src="httpMethod_DropDowns.js"></script>
        	<script type="text/javascript" src="endpointFields_check.js"></script>
      	</form>
      </div>
      <!-- Display Output from Sidebar -->
      <div id="bodyContent"style="padding-left: 15%">
  	    <div class="row-fluid">
          <form name="scriptBuilderOutputForm" action="fileBuilder.php" method="post">
            <div class="span8 well">
              <span style="color: #990000;"><b>Note:</b> Many Endpoints will require additional input, look for '< >' and update accordingly.</span>
              <br/><br/>
<textarea class="span12" id="toFile" name="toFile" rows="20" tabindex="16">
<?php
  if (isset($_POST["build_script"])) {
    $url = $_POST["url"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $method_type = $_POST["method_type"];
    $get_endpoints = $_POST["get_endpoints"];
    $post_endpoints = $_POST["post_endpoints"];
    $put_endpoints = $_POST["put_endpoints"];
    $delete_endpoints = $_POST["delete_endpoints"];
    $moduleName = $_POST["moduleName"];
    $username = $_POST["username"];
    $emailAddress = $_POST["emailAddress"];
    $recordID = $_POST["recordID"];
    $fieldName = $_POST["fieldName"];
    $operations = $_POST["operator"];
    $searchString = $_POST["searchString"];
    $newPassword = $_POST["newPassword"];
  }

  $base_url = $_POST['url'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $method_type = $_POST['method_type'];
  $get_endpoints = $_POST['get_endpoints'];
  $post_endpoints = $_POST['post_endpoints'];
  $put_endpoints = $_POST['put_endpoints'];
  $delete_endpoints = $_POST['delete_endpoints'];
  $module = $_POST['moduleName'];
  $username = $_POST['username'];
  $emailAddress = $_POST['emailAddress'];
  $id = $_POST['recordID'];
  $fieldName = $_POST['fieldName'];
  $operations = $_POST['operator'];
  $searchString = $_POST['searchString'];
  $newPassword = $_POST['newPassword'];

echo '<?php'."\n";
echo '  $base_url = "'.$base_url.'/rest/v10";'."\n";
echo '  $username = "'.$username.'";'."\n";
echo '  $password = "'.$password.'";'."\n";
echo "\n";
echo '  /**'."\n";
echo '  * Generic function to make cURL request.'."\n";
echo '  * @param $url - The URL route to use.'."\n";
echo '  * @param string $oauthtoken - The oauth token.'."\n";
echo '  * @param string $type - GET, POST, PUT, DELETE. Defaults to GET.'."\n";
echo '  * @param array $arguments - Endpoint arguments.'."\n";
echo '  * @param array $encodeData - Whether or not to JSON encode the data.'."\n";
echo '  * @param array $returnHeaders - Whether or not to return the headers.'."\n";
echo '  * @return mixed'."\n";
echo '  */'."\n";
echo '  function call('."\n";
echo '    $url,'."\n";
echo '    $oauthtoken=\'\','."\n";
echo '    $type=\'GET\','."\n";
echo '    $arguments=array(),'."\n";
echo '    $encodeData=true,'."\n";
echo '    $returnHeaders=false'."\n";
echo '  )'."\n";
echo '  {'."\n";
echo '    $type = strtoupper($type);'."\n";
echo "\n";
echo '    if ($type == \'GET\')'."\n";
echo '    {'."\n";
echo '      $url .= "?" . http_build_query($arguments);'."\n";
echo '    }'."\n";
echo "\n";
echo '    $curl_request = curl_init($url);'."\n";
echo "\n";
echo '    if ($type == \'POST\')'."\n";
echo '    {'."\n";
echo '        curl_setopt($curl_request, CURLOPT_POST, 1);'."\n";
echo '    }'."\n";
echo '    elseif ($type == \'PUT\')'."\n";
echo '    {'."\n";
echo '      curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "PUT");'."\n";
echo '    }'."\n";
echo '    elseif ($type == \'DELETE\')'."\n";
echo '    {'."\n";
echo '        curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "DELETE");'."\n";
echo '    }'."\n";
echo "\n";
echo '    curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);'."\n";
echo '    curl_setopt($curl_request, CURLOPT_HEADER, $returnHeaders);'."\n";
echo '    curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);'."\n";
echo '    curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);'."\n";
echo '    curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);'."\n";
echo "\n";
echo '    if (!empty($oauthtoken))'."\n";
echo '    {'."\n";
echo '      $token = array("oauth-token: {$oauthtoken}");'."\n";
echo '      curl_setopt($curl_request, CURLOPT_HTTPHEADER, $token);'."\n";
echo '    }'."\n";
echo "\n";
echo '    if (!empty($arguments) && $type !== \'GET\')'."\n";
echo '    {'."\n";
echo '      if ($encodeData)'."\n";
echo '      {'."\n";
echo '        //encode the arguments as JSON'."\n";
echo '        $arguments = json_encode($arguments);'."\n";
echo '      }'."\n";
echo '      curl_setopt($curl_request, CURLOPT_POSTFIELDS, $arguments);'."\n";
echo '    }'."\n";
echo "\n";
echo '    $result = curl_exec($curl_request);'."\n";
echo "\n";
echo '    if ($returnHeaders)'."\n";
echo '    {'."\n";
echo '      //set headers from response'."\n";
echo '      list($headers, $content) = explode("\r\n\r\n", $result ,2);'."\n";
echo '      foreach (explode("\r\n",$headers) as $header)'."\n";
echo '      {'."\n";
echo '        header($header);'."\n";
echo '      }'."\n";
echo "\n";
echo '      //return the nonheader data'."\n";
echo '      return trim($content);'."\n";
echo '    }'."\n";
echo "\n";
echo '    curl_close($curl_request);'."\n";
echo "\n";
echo '    //decode the response from JSON'."\n";
echo '    $response = json_decode($result);'."\n";
echo "\n";
echo '    return $response;'."\n";
echo '  }'."\n";
echo "\n";
echo '  //Login - POST /oauth2/token'."\n";
echo "\n";
echo '  $url = $base_url . "/oauth2/token";'."\n";
echo "\n";
echo '  $oauth2_token_arguments = array('."\n";
echo '    "grant_type" => "password",'."\n";
echo '    "client_id" => "sugar",'."\n";
echo '    "client_secret" => "",'."\n";
echo '    "username" => $username,'."\n";
echo '    "password" => $password,'."\n";
echo '    "platform" => "base"'."\n";
echo '  );'."\n";
echo "\n";
echo '  $oauth2_token_response = call($url, \'\', \'POST\', $oauth2_token_arguments);'."\n";
echo "\n";

if ($method_type == 'GET') {
  if ($get_endpoints == 'filterList') {
    echo '  // Filtered list of all records in '.$module."\n";
    echo '  $filter_arguments = array('."\n";
    echo '    "filter" => array('."\n";
    echo '      array('."\n";
    echo '        "'.$fieldName.'" => array('."\n";
    echo '          \''.$operator.'\' => "'.$searchString.'"'."\n";
    echo '        )'."\n";
    echo '      ),'."\n";
    echo '    ),'."\n";
    echo '    // These items can be modified as required'."\n";
    echo '    "max_num" => 2,'."\n";
    echo '    "offset" => 0,'."\n";
    echo '    "fields" => "",'."\n";
    echo '    "order_by" => "id:DESC",'."\n";
    echo '    "favorites" => false,'."\n";
    echo '    "my_items" => false,'."\n";
    echo "  );"."\n";
    echo '  $url = $base_url . "/'.$module.'/filter";'."\n\n";
    echo '  $get_record_result = call($url, $oauth2_token_response->access_token, \'GET\', $filter_arguments);'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($get_record_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'retrieveRecord') {
    echo '  // Returns a single record from '.$module."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'";'."\n\n";
    echo '  $get_record_result = call($url, $oauth2_token_response->access_token, \'GET\');'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($get_record_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'viewChangeLog') {
    echo '  // View change log of record in '.$module."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/audit";'."\n\n";
    echo '  $get_record_result = call($url, $oauth2_token_response->access_token, \'GET\');'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($get_record_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'getFileList') {
    echo '  // Gets a listing of files related to a field for a '.$module.' record.'."\n";
    echo '  $url = $base_url ."/'.$module.'/'.$id.'/file";'."\n\n";
    echo '  $get_record_result = call($url, $oauth2_token_response->access_token, \'GET\');'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($get_record_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'getFile') {
    echo '  // Gets the contents of a single file related to a field for a '.$module.' record.'."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/file/filename";'."\n\n";
    echo '  $get_record_result = call($url, $oauth2_token_response->access_token, \'GET\');'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($get_record_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'getRecordActivities') {
    echo '  // This method retrieves a record\'s activities'."\n";
    echo '  $get_record_parameters = array('."\n";
    echo '    "max_num" => 2,'."\n";
    echo '    "offset" => 0,'."\n";
    echo '  );'."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/link/activities";'."\n\n";
    echo '  $get_record_result = call($url, $oauth2_token_response->access_token, \'GET\', $get_record_parameters);'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($get_record_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'getModuleActivities') {
    echo '  // Retrieves a '.$module.'\'s Activities'."\n";
    echo '  $url = $base_url ."/'.$module.'/Activities";'."\n\n";
    echo '  $get_record_result = call($url, $oauth2_token_response->access_token, \'GET\');'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($get_record_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'config') {
    echo '  // Retrieves the Forecasts module config'."\n";
    echo '  $url = $base_url ."/'.$module.'/config";'."\n\n";
    echo '  $get_record_result = call($url, $oauth2_token_response->access_token, \'GET\');'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($get_record_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'getMostActiveUsers') {
    echo '  // Returns most active users'."\n";
    echo '  $active_users_arguments = array(',"\n";
    echo '    "days" => "30", // Can be Updated as Desired.'."\n";
    echo '  );'."\n\n";
    echo '  $url = $base_url . "/mostactiveusers";'."\n\n";
    echo '  $active_users_result = call($url, $oauth2_token_response->access_token, \'GET\', $active_users_arguments);'."\n\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($active_users_result);'."\n";
    echo '  echo "<pre>";'."\n";
  } else if ($get_endpoints == 'requestPassword') {
    echo '  // This method sends a Password Reset request via email'."\n";
    echo '  $password_reset_arguments = array('."\n";
    echo '    "email" => "'.$emailAddress.'",'."\n";
    echo '    "username" => "'.$username.'",'."\n";
    echo '  );'."\n";
    echo '  $url = $base_url . "/password/request";'."\n\n";
    echo '  $password_reset_result = call($url, $oauth2_token_response->access_token, \'GET\', $password_reset_arguments);'."\n\n";
    echo '  // Display the results of the script'."\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($password_reset_result);'."\n";
    echo '  echo "</pre>";'."\n";
  } else if ($get_endpoints == 'ping') {
    echo '  // An example API only responds with pong'."\n";
    echo '  $url = $base_url . "/ping";'."\n\n";
    echo '  $ping_result = call($url, $oauth2_token_response->access_token, \'GET\');'."\n\n";
    echo '  // Display the results of the script'."\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($ping_result);'."\n";
    echo '  echo "</pre>";'."\n";
  } else if ($get_endpoints == 'whattimeisit') {
    echo '  // An example API only responds with the current time in server format.'."\n";
    echo '  $url = $base_url . "/ping/whattimeisit";'."\n\n";
    echo '  $ping_result = call($url, $oauth2_token_response->access_token, \'GET\');'."\n\n";
    echo '  // Display the results of the script'."\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($ping_result);'."\n";
    echo '  echo "</pre>";'."\n";
  } else if ($get_endpoints == 'search') {
    echo '  // Globally search records'."\n";
    echo '  $search_arguments = array('."\n";
    echo '    "q" => "'.$searchString.'",'."\n";
    echo '    "max_num" => 2,'."\n";
    echo '    "offset" => 0,'."\n";
    echo '    "fields" => "",'."\n";
    echo '    "order_by" => "",'."\n";
    echo '    "favorites" => false,'."\n";
    echo '    "my_items" => false,'."\n";
    echo '  );'."\n\n";
    echo '  $url = $base_url . "/search";'."\n\n";
    echo '  $search_response = call($url, $oauth2_token_response->access_token, \'GET\', $search_arguments);'."\n\n";
    echo "  // Display the results of the script\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($search_response);'."\n";
    echo '  echo "<pre>";'."\n";
  } 
}
else if ($method_type == 'POST') {
  if ($post_endpoints == 'createRecord') {
    echo '  // This method creates a new record in the specified '.$module."\n";
    echo '  $url = $base_url . "/'.$module.'";'."\n\n";
    echo "  // Field(s) and their Value(s) in name/value Pairs\n";
    echo '  $post_record_parameters = array('."\n";
    echo '    "<field_name>" => "<Value>",'."\n";
    echo '  );'."\n";
  } else if ($post_endpoints == 'saveFilePost') {
    echo '  // Saves a file to a field in the '.$module.'. The file can be a new file or a file override.'."\n";
    echo '  $post_record_parameters = array('."\n";
    echo '    "format" => "sugar-html-json",'."\n";
    echo '    "filename" => "@\/path\/to\/file.type",'."\n";
    echo '  );'."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/filename";'."\n\n";
  } else if ($post_endpoints == 'subscribeToRecord') {
    echo '  // This method subscribes the user to the current record, for activity stream updates.'."\n";
    echo '  $post_record_parameters = "";'."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/subscribe";'."\n\n";
    echo '  $post_record_result = call($url, $oauth2_token_response->access_token, \'POST\', $post_record_parameters);'."\n\n";
  } else if ($post_endpoints == 'configSave') {
    echo '  // Creates the config entries for the given module (Forecasts)'."\n";
    echo '    "<Config Option>" => "<Config Variable">;'."\n";
    echo '  );'."\n";
    echo '  $url = $base_url . "/'.$module.'/configSave";'."\n";
    echo '  $post_record_result = call($url, $oauth2_token_response->access_token, \'POST\');'."\n\n";
  } else if ($post_endpoints == 'checkForDuplicates') {
    echo '  // Check for duplicate records within '.$module."\n";
    echo '  $post_record_parameters = array('."\n";
    echo '    "name":"<Enter Value>"'."\n";
    echo '   );'."\n";
    echo '  $url = $base_url . "/'.$module.'/duplicateCheck";'."\n\n";
    echo '  $post_record_result = call($url, $oauth2_token_response->access_token, \'POST\', $post_record_parameters);'."\n\n";
  } else if ($post_endpoints == 'createMail') {
    echo '  // Create a new Email message and Send it or save it as a Draft.'."\n";
    echo '  $post_record_parameters = array('."\n";
    echo '    "email_config" => "<SMTP Mailbox ID>",'."\n";
    echo '    "to_addresses" => array(  // Each "name" and "email" pair requires an array()'."\n";
    echo '      array('."\n";
    echo '        "name" => "'.$value.'",'."\n";
    echo '        "email" => "'.$emailAddress.'",'."\n";
    echo '      ),'."\n";
    echo '    ),'."\n";
    echo '    "cc_addresses" => null,'."\n";
    echo '    "bcc_addresses" => null,'."\n";
    echo '    "subject" => "'.$value.'",'."\n";
    echo '    "html_body" => "<html><body>Hello World</body></html>",'."\n";
    echo '    "text_body" => "Hello World",'."\n";
    echo '    "status" => "ready",  // Indicates the status of the email, "draft" or "ready" (ready to be sent)'."\n";
    echo '    "related" => array( // Contains "parent_type" and "parent_id" to relate this email to'."\n";
    echo '      "type" => "'.$module.'",'."\n";
    echo '      "id" => "'.$id.'",'."\n";
    echo '    ),'."\n";
    echo '    // Team(s) to assign this email to.'."\n";
    echo '    "teams" => array('."\n";
    echo '      "primary" => "<Primary Team ID>",'."\n";
    echo '      // The "other" attribute is an array of id strings for the other teams - only primary is required'."\n";
    echo '      "other" => array('."\n";
    echo '        "<Non-Primary Team ID">,'."\n";
    echo '      ),'."\n";
    echo '    ),'."\n";
    echo '      // Array of file attachments - each attachment consists of a "type"'."\n";
    echo '      // (where the attachment came from: upload, document, or template), "id"'."\n";
    echo '      // (of the file upload, note, document revision, etc), and "name" (the file name)'."\n";
    echo '    "attachments" => null,'."\n";
    echo '  );'."\n\n";
    echo '  $url = $base_url . "/Mail";'."\n\n";
    echo '  $post_record_result = call($url, $oauth2_token_response->access_token, \'POST\', $post_record_parameters);'."\n\n";
  } else if ($post_endpoints == 'validateEmailAddresses') {
    echo '  // Validate an Email Address'."\n";
    echo '  $post_record_parameters = array('."\n";
    echo '    "address" => "'.$emailAddress.'",'."\n";
    echo '  );'."\n";
    echo '  $url = $base_url . "/Mail/address/validate";'."\n\n";
    echo '  $post_record_result = call($url, $oauth2_token_response->access_token, \'POST\', $post_record_parameters);'."\n\n";
  } else if ($post_endpoints == 'logout') {
    echo '  // Display Login Result'."\n";
    echo '  echo "<pre>";'."\n";
    echo '  print_r($oauth2_token_response);'."\n";
    echo '  echo "</pre>";'."\n\n";
    echo '  // OAuth2 logout.'."\n";
    echo '  $url = $base_url . "/oauth2/logout";'."\n\n";
    echo '  $post_record_result = call($url, $oauth2_token_response->access_token, \'POST\') . "You have been logged out.";'."\n\n";
  } else if ($post_endpoints == 'token') {
    echo '  $post_record_result = $oauth2_token_response;'."\n\n";
  }

  echo "  // Display the result of the script\n";
  echo '  echo "<pre>";'."\n";
  echo '  print_r($post_record_result);'."\n";
  echo '  echo "</pre>";'."\n"; 
}
else if ($method_type == 'PUT') {
  if ($put_endpoints == 'updateRecord') {
    echo '  // This method updates a record in the specified '.$module."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'";'."\n\n";
    echo "  // Field(s) and their Value(s) in name/value Pairs\n";
    echo '  $put_record_parameters = array('."\n";
    echo '    "<field_name>" => "<value>",'."\n";
    echo '  );'."\n";
  } else if ($put_endpoints == 'setFavorite') {
    echo '  // This method sets a record in '.$module.' as a favorite'."\n";
    echo '  $put_record_parameters = "";'."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'";'."\n\n";
  } else if ($put_endpoints == 'unsetFavorite') {
    echo '  // This method unsets a record of the specified type as a favorite'."\n";
    echo '  $put_record_parameters = "";'."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/unsetFavorite";'."\n\n";
  } else if ($put_endpoints == 'updatePassword') {
    echo '  // Updates current user\'s password'."\n";
    echo '  $put_record_parameters = array('."\n";
    echo '    "old_password" => "'.$password.'",'."\n";
    echo '    "new_password" => "'.$newPassword.'"'."\n";
    echo '  );'."\n";
    echo '  $url = $base_url . "/me/password";'."\n\n";
  }
  
  echo '  $put_record_result = call($url, $oauth2_token_response->access_token, \'PUT\', $put_record_parameters);'."\n\n";
  echo "  // Display the result of the script\n";
  echo '  echo "<pre>";'."\n";
  echo '  print_r($put_record_result);'."\n";
  echo '  echo "<pre>";'."\n";
}
else if ($method_type == 'DELETE') {
  if ($delete_endpoints == 'deleteRecord') {
    echo '  // This method deletes a record from '.$module."\n\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'";'."\n\n";
  } else if ($delete_endpoints == 'unsetFavorite') {
    echo '  // This method unsets a record in '.$module.' as a favorite'."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/favorite";'."\n\n";
  } else if ($delete_endpoints == 'removeFile') {
    echo '  // Removes a file from a field in '.$module."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/file/filename";'."\n\n";
  } else if ($delete_endpoints == 'unsubscribeFromRecord') {
    echo '  // This method unsubscribes the user from the current record, for activity stream updates.'."\n";
    echo '  $url = $base_url . "/'.$module.'/'.$id.'/unsubscribe";'."\n\n";
  }
  
  echo '  $delete_record_result = call($url, $oauth2_token_response->access_token, \'DELETE\');'."\n\n";
  echo "  // Display the result of the script\n";
  echo '  echo "<pre>";'."\n";
  echo '  print_r($delete_record_result);'."\n";
  echo '  echo "<pre>";'."\n";
}
echo "\n?>";
?>
</textarea>
              <script type="text/javascript">
                var textarea = document.getElementById('toFile');
                textarea.scrollTop = textarea.scrollHeight;
              </script>
              <br/><br/>
              <button class="btn btn-primary pull-right" type="submit" name="writeToFile" id="toFile" tabindex="14">Create File</button>
            </div>
          <input type="hidden" name="functionType" value="<?php echo $_POST['method_type']; ?>"/>
          <input type="hidden" name="moduleName" value="<?php echo $_POST['moduleName']; ?>"/>
          <input type="hidden" name="methodType" value="<?php echo $_POST['get_endpoints'].$_POST['delete_endpoints'].$_POST['post_endpoints'].$_POST['put_endpoints']; ?>"/>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="./bootstrap/js/bootstrap.min.js"></script>
  <script src="./bootstrap/js/bootstrap-affix.js"></script>
  <script src="./bootstrap/js/bootstrap-alert.js"></script>
  <script src="./bootstrap/js/bootstrap-button.js"></script>
  <script src="./bootstrap/js/bootstrap-carousel.js"></script>
  <script src="./bootstrap/js/bootstrap-collapse.js"></script>
  <script src="./bootstrap/js/bootstrap-dropdown.js"></script>
  <script src="./bootstrap/js/bootstrap-modal.js"></script>
  <script src="./bootstrap/js/bootstrap-popover.js"></script>
  <script src="./bootstrap/js/bootstrap-scrollspy.js"></script>
  <script src="./bootstrap/js/bootstrap-tab.js"></script>
  <script src="./bootstrap/js/bootstrap-tooltip.js"></script>
  <script src="./bootstrap/js/bootstrap-transition.js"></script>
  <script src="./bootstrap/js/bootstrap-typeahead.js"></script>
  <script src="./bootstrap/js/jquery-2.0.3.min.map"></script>
  <script src="./bootstrap/js/jquery-2.0.3.min.js"></script>
</body>
</html>