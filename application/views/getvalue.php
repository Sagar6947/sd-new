<?php

if (mysqli_num_rows($web_url) > 0) {
    echo 'N';
    print_r($web_url);
} else {
    echo 'Y';
}
