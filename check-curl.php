<?php
if (function_exists('curl_version')) {
    echo "✅ cURL is enabled on this server.<br><br>";
    echo "<pre>";
    print_r(curl_version());
    echo "</pre>";
} else {
    echo "❌ cURL is NOT enabled. Please enable it in your php.ini file.";
}
?>
