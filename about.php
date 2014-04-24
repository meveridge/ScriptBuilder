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
            <li><a href="./index.php" tabindex="2">Home</a></li>
            <li class="active"><a href="./about.php" tabindex="3">About</a></li>
          </ul>
        </div>
        <!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="container-fluid" style="padding-left:5%;">
    <div class="row-fluid">
      <span class="span8">The REST v10 Script Builder is designed to help you quickly create PHP scripts that leverage the REST v10 API built into Sugar 7.  For feature requests or assistance, please email <a href="mailto:dkallish@sugarcrm.com">dkallish@sugarcrm.com</a></span>
    </div>
    <br/>
    <div class="row-fluid">
      <span class="span8">Not all Endpoints are available at this time, but more will be added in the future.  Custom Endpoints are not supported, but could be added manually.  More information about Custom Endpoints is available in the Sugar Developer Documentation: <a href="http://support.sugarcrm.com/02_Documentation/04_Sugar_Developer/Sugar_Developer_Guide_7.1/70_API/Web_Services/15_Extending_Web_Services/">Extending Web Services</a>  The Script Builder includes all of the following endpoints:<br/>
      &nbsp;&nbsp;&nbsp;&nbsp;<b>Note:</b> These are visible by entering '&#60;Your Instance's URL&#62;/rest/v10/help' in your browser's Address Bar.</span>
    </div>
    <br/>
    <div class="span9 well">
      <ul style="list-style-type: none;">
        <li>GET Endpoints:</li>
        <ul style="list-style-type: none;">
          <li><b>filterList</b> (List of Records) - Filtered list of all records in this module</li>
          <li><b>retrieveRecord</b> (Retreive Record) - Returns a single record</li>
          <li><b>viewChangeLog</b> (View Change Log) - View change log in record view</li>
          <li><b>getFileList</b> (Related File List) - Gets a listing of files related to a field for a module record.</li>
          <li><b>getFile</b> (File from Record) - Gets the contents of a single file related to a field for a module record.</li>
          <li><b>getRecordActivities</b> (Record's Activities) - This method retrieves a record's activities</li>
          <li><b>getModuleActivities</b> (Module's Activities) - This method retrieves a module's activities</li>
          <li><b>config</b> (Forecast Config) - Retrieves the config settings for a given module (Forecasts)</li>
          <li><b>getMostActiveUsers</b> (Most Active Users) - This endpoint is used to most active users for Meetings, Calls, and Emails.</li>
          <li><b>requestPassword</b> (Email Password Request) - This method sends a Reset Password request email to the Username</li>
          <li><b>ping</b> (Check Login) - Responds with 'pong' to confirm that the access token is valid.</li>
          <li><b>whattimeisit</b> (Current Server Time) - Responds with the current time in server format.</li>
          <li><b>search</b> (Search Globally) - Globally search records</li>
        </ul>
        <br/>
        <li>POST Endpoints:</li>
        <ul style="list-style-type: none;">
          <li><b>createRecord</b> (Create Record) - This method creates a new record of the specified type</li>
          <li><b>saveFilePost</b> (Save a File) - Saves a file. The file can be a new file or a file override.</li>
          <li><b>subscribeToRecord</b> (Subscribe to Record) - This method subscribes the user to the current record, for activity stream updates.</li>
          <li><b>configSave</b> (Save Forecast Config) - Creates the config entries for the given module (Forecasts)</li>
          <li><b>checkForDuplicates</b> (Check for Duplicates) - Check for duplicate records within a module</li>
          <li><b>createMail</b> (Send an Email) - Create Mail Item</li>
          <li><b>validateEmailAddresses</b> (Validate Email Address) - Validate an Email Address</li>
          <li><b>logout</b> (Logout using OAuth2.0) - Expires the token portion of the OAuth 2.0 specification.</li>
          <li><b>token</b> (Login using OAuth2.0) - Retrieves the token portion of the OAuth 2.0 specification (Logs In).</li>
        </ul>
        <br/>
        <li>PUT Endpoints:</li>
        <ul style="list-style-type: none;">
          <li><b>updateRecord</b> - This method updates a record of the specified type</li>
          <li><b>setFavorite</b> - This method sets a record of the specified type as a favorite</li>
          <li><b>unsetFavorite</b> - This method unsets a record of the specified type as a favorite</li>
          <li><b>configSave</b> - Updates the config entries for given module (Forecasts)</li>
          <li><b>updatePassword</b> - Updates current user's password</li>
        </ul>
        <br/>
        <li>DELETE Endpoints:</li>
        <ul style="list-style-type: none;">
          <li><b>deleteRecord</b> - This method deletes a record of the specified type</li>
          <li><b>unsetFavorite</b> - This method unsets a record of the specified type as a favorite</li>
          <li><b>removeFile</b> - Removes a file from a field.</li>
          <li><b>unsubscribeFromRecord</b> - This method unsubscribes the user from the current record, for activity stream updates.</li>
      </ul>
    </div>
    <div class="row-fluid">
      <span class="span8"><b>REST v10 Script Builder</b> uses the following third party tools:</span>
    </div>
    <div class="row-fluid">
      <span class="span8"><a href="http://jquery.com/">jQuery</a> - jQuery is a fast and concise JavaScript Library that simplifies HTML document traversing, event handling, animating, and Ajax interactions for rapid web development.</span>
    </div>
    <div class="row-fluid">
      <span class="span8"><a href="http://getbootstrap.com/">Twitterbootstrap</a> - HTML, CSS, and JS toolkit from Twitter.</span>
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