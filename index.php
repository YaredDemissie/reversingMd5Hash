<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Yared Demissie MD5 Cracker</title>
</head>
<body>
<h1>MD5 Cracker</h1>
<p>This application takes an MD5 hash of four digit pin and check 
all 10,000 possible four digit PINs to determine the PIN.</p>
<pre>
Debug Output: 
<?php
    $goodtext = "Not found";
    if (isset($_GET['md5'])){
        $time_pre = microtime(true);
        $md5 = $_GET['md5'];

        $txt = "0123456789";
        $show = 15;

        for($index1 =0; $index1 < strlen($txt); $index1++){
            $ch1 = $txt[$index1];

            for($index2 =0; $index2 < strlen($txt); $index2++){
                $ch2 = $txt[$index2];

                for($index3 =0; $index3 < strlen($txt); $index3++){
                    $ch3 = $txt[$index3];

                    for($index4 =0; $index4 < strlen($txt); $index4++){
                        $ch4 = $txt[$index4];
                        $try = $ch1.$ch2.$ch3.$ch4;

                        $check = hash('md5', $try);
                        if($check == $md5){
                            $goodtext = $try; 
                            break;
                        }
                        if($show > 0){
                            print "$check $try\n";
                            $show = $show - 1;
                        }
                    } 
                } 
            }   
        }
        $time_post = microtime(true);
        print "Elapsed time: ";
        print $time_post-$time_pre;
        print "\n";
    }
?>
    </pre>
    <p>PIN: <?=htmlentities($goodtext)?></p>
    <form>
        <input type="text" name="md5" size="60" />
        <input type="submit" value="Crack MD5" />
    </form>
</body>
</html>
