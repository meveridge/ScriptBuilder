function showEndpointFields(name) {
  // Array of items that will NOT require the Plural Module Name field to display.
  var requiresPluralModule_array = new Array('search', 'ping', 'whattimeisit', 'token', 'logout', 'updatePassword', 'getMostActiveUsers', 'requestPassword', 'validateEmailAddresses', '-blank-');

  if (requiresPluralModule_array.indexOf(name) >= 0) {
    document.getElementById('moduleName_span').innerHTML = '';
  } else {
    document.getElementById('moduleName_span').innerHTML = '<label class="span4" for="moduleName">Plural Module Name</label><input class="span8" type="text" id="moduleName" name="moduleName" tabindex="9" required/>';
  }

  // Display the Username field when 'requestPassword' is selected.
  if (name == 'requestPassword') {
    document.getElementById('username_span').innerHTML = '<label class="span4" for="username">Username</label><input class="span8" type="text" id="username" name="username" tabindex="9" required/>';
  } else {
    document.getElementById('username_span').innerHTML = '';
  }

  // Array of items that will require the Email Address field to display.
  var requiresEmailAddress_array = new Array('createMail', 'requestPassword', 'validateEmailAddresses');

  if (requiresEmailAddress_array.indexOf(name) >= 0) {
    document.getElementById('emailAddress_span').innerHTML = '<label class="span4" for="emailAddress">Email Address</label><input class="span8" type="text" id="emailAddress" name="emailAddress" tabindex="10" required/>';
  } else {
    document.getElementById('emailAddress_span').innerHTML = '';
  }

  // Array of items that will require the Record ID field to display.
  var requiresID_array = new Array('retrieveRecord', 'viewChangeLog', 'setFavorite', 'unsetFavorite', 'getFileList', 'subscribeToRecord', 'saveFilePut', 'getFile', 'saveFilePost', 'unsetFavorite', 'unsubscribeFromRecord', 'updateRecord', 'deleteRecord', 'getRecordActivities', 'createMail');

  if (requiresID_array.indexOf(name) >= 0) {
    document.getElementById('recordID_span').innerHTML = '<label class="span4" for="recordID">Record ID</label><input class="span8" type="text" id="recordID" name="recordID" tabindex="11" required/>';
  } else {
    document.getElementById('recordID_span').innerHTML = '';
  }

  // Display Field Name, Operators, and Filter String fields when 'filterList' is selected.
  if (name == 'filterList') {
    document.getElementById('fieldName_span').innerHTML = '<label class="span4" for="fieldName">Field Name</label><input class="span8" type="text" id="fieldName" name="fieldName" value="field_name" tabindex="11"/>';
    document.getElementById('operator_span').innerHTML = '<label class="span4" for="operator">Operator</label><select class="span8" id="operator" name="operator" tabindex="12"><option>-Select an Operator-</option><option value="$equals">Equals</option><option value="$not_equals">Does not Equal</option><option value="starts">Starts With</option><option value="$ends">Ends With</option><option value="$contains">Contains</option><option value="$in">Is In</option><option value="$not_in">Is not In</option><option value="$is_null">Is NULL</option><option value="$not_null">Is not NULL</option><option value="$lt">Is Less Than</option><option value="$lte">Less Than or Equal</option><option value="$gt">Is Greater Than</option><option value="$gte">Greater Than or Equal</option></select>';
  } else {
    document.getElementById('fieldName_span').innerHTML = '';
    document.getElementById('operator_span').innerHTML = '';
    document.getElementById('searchString_span').innerHTML = '';
  }

  // An Array of items that will require the Search String to display.
  var requiresSearchString_array = new Array('filterList', 'search');

  if (requiresSearchString_array.indexOf(name) >= 0) {
    document.getElementById('searchString_span').innerHTML = '<label class="span4" for="searchString">Filter/Search String</label><input class="span8" type="text" id="searchString" name="searchString" tabindex="13" required/>';
  } else {
    document.getElementById('searchString_span').innerHTML = '';
  }

  // Display 'New Password' field when 'updatePassword' is selected.
  if (name == 'updatePassword') {
    document.getElementById('newPassword_span').innerHTML = '<label class="span4" for="newPassword">New Password</label><input class="span8" type="text" id="newPassword" name="newPassword" tabindex="9" required/>';
  }
  else {
    document.getElementById('newPassword_span').innerHTML = '';
  }
}