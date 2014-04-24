function showMethodEndpoints(name) {
  if (name == "GET") {
    document.getElementById('get_span').innerHTML = '<label class="span4" for="getEndpoints">GET Endpoints</label><select class="span8" id="getEndpoints" name="get_endpoints" onchange="showEndpointFields(this.options[this.selectedIndex].value)" tabindex="8"><option value="">-Select-</option><option value="filterList">List of Records</option><option value="retrieveRecord">Retrieve Record</option><option value="viewChangeLog">View Change Log</option><option value="getFileList">Related File List</option><option value="getFile">File from Record</option><option value="getRecordActivities">Record\'s Activities</option><option value="getModuleActivities">Module\'s Activities</option><option value="config">Forecast Config</option><option value="getMostActiveUsers">Most Active Users</option><option value="requestPassword">Email Password Reset</option><option value="ping">Check Login</option><option value="whattimeisit">Current Server Time</option><option value="search">Search Globally</option></select>';
  	document.getElementById('post_span').innerHTML = '';
  	document.getElementById('put_span').innerHTML = '';
  	document.getElementById('delete_span').innerHTML = '';
    document.getElementById('moduleName_span').innerHTML = '';
    document.getElementById('username_span').innerHTML = '';
    document.getElementById('emailAddress_span').innerHTML = '';
    document.getElementById('recordID_span').innerHTML = '';
    document.getElementById('fieldName_span').innerHTML = '';
    document.getElementById('operator_span').innerHTML = '';
    document.getElementById('searchString_span').innerHTML = '';
    document.getElementById('newPassword_span').innerHTML = '';
  } else if (name == "POST") {
  	document.getElementById('get_span').innerHTML = '';
  	document.getElementById('post_span').innerHTML = '<label class="span4" for="postEndpoints">POST Endpoints</label><select class="span8" id="postEndpoints" name="post_endpoints" onchange="showEndpointFields(this.options[this.selectedIndex].value)" tabindex="8"><option value="">-Select-</option><option value="createRecord">Create Record</option><option value="saveFilePost">Save a File</option><option value="subscribeToRecord">Subscribe to Record</option><option value="configSave">Save Forecast Config</option><option value="checkForDuplicates">Check for Duplicates</option><option value="createMail">Send an Email</option><option value="validateEmailAddresses">Validate Email Address</option><option value="logout">Logout using OAuth2.0</option><option value="token">Login using OAuth2.0</option></select>';
  	document.getElementById('put_span').innerHTML = '';
  	document.getElementById('delete_span').innerHTML = '';
    document.getElementById('moduleName_span').innerHTML = '';
    document.getElementById('username_span').innerHTML = '';
    document.getElementById('emailAddress_span').innerHTML = '';
    document.getElementById('recordID_span').innerHTML = '';
    document.getElementById('fieldName_span').innerHTML = '';
    document.getElementById('operator_span').innerHTML = '';
    document.getElementById('searchString_span').innerHTML = '';
    document.getElementById('newPassword_span').innerHTML = '';
  } else if (name == "PUT") {
  	document.getElementById('get_span').innerHTML = '';
  	document.getElementById('post_span').innerHTML = '';
  	document.getElementById('put_span').innerHTML = '<label class="span4" for="putEndpoints">PUT Endpoints</label><select class="span8" id="putEndpoints" name="put_endpoints" onchange="showEndpointFields(this.options[this.selectedIndex].value)" tabindex="8"><option value="">-Select-</option><option value="updateRecord">Update Record</option><option value="setFavorite">Set Favorite</option><option value="unsetFavorite"> Unset Favorite</option><option value="configSave">Update Forecast Config</option><option value="updatePassword">Update Your Password</option></select>';
  	document.getElementById('delete_span').innerHTML = '';
    document.getElementById('moduleName_span').innerHTML = '';
    document.getElementById('username_span').innerHTML = '';
    document.getElementById('emailAddress_span').innerHTML = '';
    document.getElementById('recordID_span').innerHTML = '';
    document.getElementById('fieldName_span').innerHTML = '';
    document.getElementById('operator_span').innerHTML = '';
    document.getElementById('searchString_span').innerHTML = '';
    document.getElementById('newPassword_span').innerHTML = '';
  } else if (name == "DELETE") {
  	document.getElementById('get_span').innerHTML = '';
  	document.getElementById('post_span').innerHTML = '';
  	document.getElementById('put_span').innerHTML = '';
  	document.getElementById('delete_span').innerHTML = '<label class="span4" for="deleteEndpoints">DELETE Endpoints</label><select class="span8" id="deleteEndpoints" name="delete_endpoints" onchange="showEndpointFields(this.options[this.selectedIndex].value)" tabindex="8"><option value="">-Select-</option><option value="deleteRecord">Delete Record</option><option value="unsetFavorite">Unfavorite</option><option value="removeFile">Remove Related File</option><option value="unsubscribeFromRecord">Unsubscribe from Record</option></select>';
    document.getElementById('moduleName_span').innerHTML = '';
    document.getElementById('username_span').innerHTML = '';
    document.getElementById('emailAddress_span').innerHTML = '';
    document.getElementById('recordID_span').innerHTML = '';
    document.getElementById('fieldName_span').innerHTML = '';
    document.getElementById('operator_span').innerHTML = '';
    document.getElementById('searchString_span').innerHTML = '';
    document.getElementById('newPassword_span').innerHTML = '';
  } else {
  	document.getElementById('get_span').innerHTML = '<label class="span4"></label><select class="span8"><option value="-blank-">Select a Method</option></select>';
  	document.getElementById('post_span').innerHTML = '';
  	document.getElementById('put_span').innerHTML = '';
  	document.getElementById('delete_span').innerHTML = '';
    document.getElementById('moduleName_span').innerHTML = '';
    document.getElementById('username_span').innerHTML = '';
    document.getElementById('emailAddress_span').innerHTML = '';
    document.getElementById('recordID_span').innerHTML = '';
    document.getElementById('fieldName_span').innerHTML = '';
    document.getElementById('operator_span').innerHTML = '';
    document.getElementById('searchString_span').innerHTML = '';
    document.getElementById('newPassword_span').innerHTML = '';
  }
}

// Need to figure out and add link and link_name endpoinds.