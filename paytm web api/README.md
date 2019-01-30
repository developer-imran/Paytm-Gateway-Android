  
  FIRST THING YOU HAVE TO DO GET PAYTM CREDENTIALS.

 **** Follow this steps to get success in this task***

      https://developer.paytm.com/docs


# ** I have done all the things you just copy and paste, if you are doing project with local host while testing you just paste this folder in web directory.


# ** URL of local host server or your web server must change in project while you are going to Run.


# Prerequisite
 1. Provide the value for PAYTM_MERCHANT_KEY in /lib/config_paytm.php file. (The value for MERCHANT_KEY will be provided after the onboarding process is completed).
 
 
# Installation steps
 1. The generateChecksum.php file uses the /lib/encdec_paytm.php file and provides the module to generate the checksum. Copy these files to the location on your server which will be used for the Checksum Generation URL.
 2. The verifyChecksum.php file uses the /lib/encdec_paytm.php file and provides the module to verify the checksum. Copy these files to the location on your server which will be used for the Checksum Verify URL.
 3. Copy the /lib folder into the same directory as the generateChecksum.php and verifyChecksum.php.

 
# For Offline(Wallet Api) Checksum Utility below are the methods:
  1. getChecksumFromString : For generating the checksum
  2. verifychecksum_eFromStr : For verifing the checksum
