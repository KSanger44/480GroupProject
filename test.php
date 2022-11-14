<DOCTYPE html>
         <!--php Cookies -------------------------------------------------->
        <?php
            $cookie_name = "username";
            $cookie_value = "KSanger";
            // syntax: setcookie(name, value, expire, path, domain, secure, httponly); only name is required
            //setcookie() function must appear BEFORE the <html> tag
            setcookie($cookie_name, $cookie_value, 10000, "/"); // 86400 = 1 day
        ?>


        <?php
            if(!isset($_COOKIE[$cookie_name])) {
                echo "Cookie named '" . $cookie_name . "' is not set!";
            } else {
                echo "Cookie '" . $cookie_name . "' is set!<br>";
                echo "Value is: " . $_COOKIE[$cookie_name];
            }
        ?>
    <html>
        <?php
        phpinfo()
        ?>

        <!--File Handling--------------------------------------------------->
        <?php
        echo readfile("drugScreen.txt");
        
        //opens file and sets it read
        $file = fopen("drugScreen.txt", "r") or die("File unable to open");;

        //output one character at the time, until end-of-file.
        //feof() function checks if the end of file 'eof' has been reached.
        //The fgetc() function reads a single character from a file.

        while(!feof($file)){
            echo fgetc($file);
        }
        fclose($file);
        ?>

        <!--Exception Handling--------------------------------------------->
        <?php
            class ZIPException extends Exception {
            public function ZIPerror() {
                //error message
                $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
                .': <b>'.$this->getMessage().'</b> is not a valid ZIP code';
                return $errorMsg;
            }
            }

            $ZIP = "1234";

            try {
            //check if
            if(strlen($ZIP) != 5) {
                //throw exception if ZIP code is not valid
                throw new ZIPException($ZIP);
            }
            }

            catch (ZIPException $e) {
            //display custom message
            echo $e->ZIPerror();
            }
        ?>


    </html>    