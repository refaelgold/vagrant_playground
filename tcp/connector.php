<?php
/**
 * Created by FiSHa
 * Project test-dev
 * Date: 4/30/14
 * Time: 5:39 PM
 */

$fp = fsockopen("82.80.58.217", 53456, $errno, $errstr, 30);
if (!$fp) {
    echo "Login";
} else {
    $out = "<LD_XML_API>
<Version>1.0</Version>
<MsgType>Request</MsgType>
<MsgId>0</MsgId>
<MsgActor>Employee</MsgActor>
<MsgOperation>LogIn</MsgOperation>
<UserName>guy</UserName>
<PassWord>123</PassWord>
<StationIdUniqueID>1</StationIdUniqueID>
</LD_XML_API>";

    echo fgets($fp);
    fwrite($fp, $out);
    while (!feof($fp)) {
        print fread($fp, 128);
    }
    fclose($fp);
}
