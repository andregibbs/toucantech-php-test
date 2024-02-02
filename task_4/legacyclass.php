/*
* Checks if the default email is valid for a given user ID
* Return values:
* -1: Invalid user ID
* 0: Email is not valid
* 1: Email is valid
*/

private function checkDefaultEmailValid($userId = null) {
  // Comment 1: Check if the user ID is empty
  if (empty($userId)) {
    return -1;
  }

  // Comment 2: Retrieve the default email for the user
  $defaultEmail = $this->getDefaultEmailByUserId($userId);

  // Comment 3: If the default email is empty, set it as default
  if (empty($defaultEmail)) {
    $this->set_default_email($userId);
    $defaultEmail = $this->getDefaultEmailByUserId($userId);
  }

  // Comment 4: If the default email is still empty, return -1
  if (empty($defaultEmail)) {
    return -1;
  }

  // Comment 5: Check if the default email is valid and was validated within the last 12 months
  if ($defaultEmail['valid'] >= 1 and
    ($defaultEmail['validated_on'] > (time() - strtotime('-12 months')))) {
    return 1;
  }

  // Comment 6: Get the email address
  $email = $defaultEmail['email'];

  // Comment 7: Check if the email is empty or not a valid email address
  if (empty($email) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return 2;
  }

  // Comment 8: Check if the email is valid using an additional validation function
  $validationResults = $this->checkIfValid($email);

  // Comment 9: Return 0 if not valid, 1 if valid
  if (!$validationResults) {
    return 0;
  } else {
    return 1;
  }
}
