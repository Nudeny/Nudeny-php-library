<?php

namespace Nudeny\Nudeny;


final class Nudeny
{
    private static $LOCALHOST_URL = "http://127.0.0.1:8000/";
    private static $URL = "http://ec2-18-142-227-173.ap-southeast-1.compute.amazonaws.com/";

    /**
     * Function that accepts array of URLs as argument and returns
     * classification prediction.
     *
     * @param array $urls array of image url sources.
     * @return JSON Response.
     */
    public static function classifyUrl($urls)
    {
        if (is_array($urls)) {
            $endpoint = "classify-url/";
            $url = self::$URL . $endpoint;

            $postData = array();
            foreach ($urls as $source) {
                array_push($postData, array('source' => $source));
            }

            // Prepare curl options
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'accept: application/json',
                'Content-Type: application/json'
            ));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

            // Send the request
            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                $error = curl_error($curl);
                // Handle the error, e.g. by logging or displaying an error message
                echo "cURL error: " . $error;
            }

            // Close curl
            curl_close($curl);

            // Handle the response
            if ($response) {
                // Handle the response, e.g. by parsing the JSON or displaying the result
                // echo "Response: " . $response;
                return $response;
            } else {
                // Handle the error, e.g. by logging or displaying an error message
                echo "Error sending HTTP request";
            }
        } else {
            echo "Error: Argument is not an array";
        }
    }

    /**
     * Function that accepts $_FILE superglobal as argument and returns
     * classification prediction.
     *
     * @param $_FILE $file Image file.
     * @return JSON Response.
     */

    public static function classifyMultiPartForm($file)
    {
        $endpoint = "classify/";
        $url = self::$URL . $endpoint;

        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];

        if ($fileError === UPLOAD_ERR_OK) {
            // Prepare curl options
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'accept: application/json',
                'Content-Type: multipart/form-data'
            ));
            // Set the request body as a multipart/form-data
            $postData = array(
                'files' => curl_file_create($fileTmpName, $fileType, $fileName)
            );
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
            // Send the request
            $response = curl_exec($curl);

            // Check for curl errors
            if (curl_errno($curl)) {
                $error = curl_error($curl);
                // Handle the error, e.g. by logging or displaying an error message
                echo "cURL error: " . $error;
            }

            // Close curl
            curl_close($curl);

            // Handle the response
            if ($response) {
                // Handle the response, e.g. by parsing the JSON or displaying the result
                // echo "Response: " . $response;
                return $response;
            } else {
                // Handle the error, e.g. by logging or displaying an error message
                echo "Error sending HTTP request";
            }
        } else {
            // Handle file upload error, e.g. by logging or displaying an error message
            echo "File upload failed with error code: " . $fileError;
        }
    }

    /**
     * Function that accepts array of URLs as argument and returns
     * detection prediction.
     *
     * @param array $urls array of image url sources.
     * @return JSON Response.
     */
    public static function detectUrl($urls)
    {
        if (is_array($urls)) {
            $endpoint = "detect-url/";
            $url = self::$URL . $endpoint;

            $postData = array();
            foreach ($urls as $source) {
                array_push($postData, array('source' => $source));
            }

            // Prepare curl options
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'accept: application/json',
                'Content-Type: application/json'
            ));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

            // Send the request
            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                $error = curl_error($curl);
                // Handle the error, e.g. by logging or displaying an error message
                echo "cURL error: " . $error;
            }

            // Close curl
            curl_close($curl);

            // Handle the response
            if ($response) {
                // Handle the response, e.g. by parsing the JSON or displaying the result
                // echo "Response: " . $response;
                return $response;
            } else {
                // Handle the error, e.g. by logging or displaying an error message
                echo "Error sending HTTP request";
            }
        } else {
            echo "Error: Argument is not an array";
        }
    }

    /**
     * Function that accepts $_FILE superglobal as argument and returns
     * detection prediction.
     *
     * @param $_FILE $file Image file.
     * @return JSON Response.
     */

    public static function detectMultiPartForm($file)
    {
        $endpoint = "detect/";
        $url = self::$URL . $endpoint;

        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTmpName = $file['tmp_name'];
        $fileError = $file['error'];

        if ($fileError === UPLOAD_ERR_OK) {
            // Prepare curl options
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'accept: application/json',
                'Content-Type: multipart/form-data'
            ));
            // Set the request body as a multipart/form-data
            $postData = array(
                'files' => curl_file_create($fileTmpName, $fileType, $fileName)
            );
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
            // Send the request
            $response = curl_exec($curl);

            // Check for curl errors
            if (curl_errno($curl)) {
                $error = curl_error($curl);
                // Handle the error, e.g. by logging or displaying an error message
                echo "cURL error: " . $error;
            }

            // Close curl
            curl_close($curl);

            // Handle the response
            if ($response) {
                // Handle the response, e.g. by parsing the JSON or displaying the result
                // echo "Response: " . $response;
                return $response;
            } else {
                // Handle the error, e.g. by logging or displaying an error message
                echo "Error sending HTTP request";
            }
        } else {
            // Handle file upload error, e.g. by logging or displaying an error message
            echo "File upload failed with error code: " . $fileError;
        }
    }

    /**
     * Function that accepts array of URLs as argument and returns
     * detection prediction as well as censored image URL.
     *
     * @param array $urls array of image url sources.
     * @return JSON Response.
     */
    public static function censorUrl($urls)
    {
        if (is_array($urls)) {
            $endpoint = "censor-url/";
            $url = self::$URL . $endpoint;

            $postData = array();
            foreach ($urls as $source) {
                array_push($postData, array('source' => $source));
            }

            // Prepare curl options
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'accept: application/json',
                'Content-Type: application/json'
            ));
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

            // Send the request
            $response = curl_exec($curl);

            if (curl_errno($curl)) {
                $error = curl_error($curl);
                // Handle the error, e.g. by logging or displaying an error message
                echo "cURL error: " . $error;
            }

            // Close curl
            curl_close($curl);

            // Handle the response
            if ($response) {
                // Handle the response, e.g. by parsing the JSON or displaying the result
                // echo "Response: " . $response;
                return $response;
            } else {
                // Handle the error, e.g. by logging or displaying an error message
                echo "Error sending HTTP request";
            }
        } else {
            echo "Error: Argument is not an array";
        }
    }

    /**
     * Function that accepts $_FILE superglobal as argument and returns
     * detection prediction as well as censored image URL.
     *
     * @param $_FILE $file Image file.
     * @return JSON Response.
     */

     public static function censorMultiPartForm($file)
     {
         $endpoint = "censor/";
         $url = self::$URL . $endpoint;
 
         $fileName = $file['name'];
         $fileType = $file['type'];
         $fileTmpName = $file['tmp_name'];
         $fileError = $file['error'];
 
         if ($fileError === UPLOAD_ERR_OK) {
             // Prepare curl options
             $curl = curl_init();
             curl_setopt($curl, CURLOPT_URL, $url);
             curl_setopt($curl, CURLOPT_POST, 1);
             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
             curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                 'accept: application/json',
                 'Content-Type: multipart/form-data'
             ));
             // Set the request body as a multipart/form-data
             $postData = array(
                 'files' => curl_file_create($fileTmpName, $fileType, $fileName)
             );
             curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
             // Send the request
             $response = curl_exec($curl);
 
             // Check for curl errors
             if (curl_errno($curl)) {
                 $error = curl_error($curl);
                 // Handle the error, e.g. by logging or displaying an error message
                 echo "cURL error: " . $error;
             }
 
             // Close curl
             curl_close($curl);
 
             // Handle the response
             if ($response) {
                 // Handle the response, e.g. by parsing the JSON or displaying the result
                 // echo "Response: " . $response;
                 return $response;
             } else {
                 // Handle the error, e.g. by logging or displaying an error message
                 echo "Error sending HTTP request";
             }
         } else {
             // Handle file upload error, e.g. by logging or displaying an error message
             echo "File upload failed with error code: " . $fileError;
         }
     }
}
