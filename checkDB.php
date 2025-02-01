<?php 
    session_start();
    require_once('database/db.php');

    // check -> sign up
    if (isset($_POST['btnConfirm'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $housenumber = $_POST['housenumber'];
        $village = $_POST['village'];
        $district = $_POST['district'];
        $district2 = $_POST['district2'];
        $province = $_POST['province'];
        $building = $_POST['building'];
        $phonenumber = $_POST['phonenumber'];
        $conpassword = $_POST['conpassword'];

        if (empty($username)) {
            $_SESSION['error'] = 'Please enter username.';
            header("location: signUp.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'Please enter password.';
            header("location: signUp.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'Password must be between 5 and 20 characters long.';
            header("location: signUp.php");
        }else if (empty($housenumber)) {
            $_SESSION['error'] = 'Please enter housenumber.';
            header("location: signUp.php");
        } else if (empty($village)) {
            $_SESSION['error'] = 'Please enter village.';
            header("location: signUp.php");
        } else if (empty($district)) {
            $_SESSION['error'] = 'Please enter district.';
            header("location: signUp.php");
        } else if (empty($district2)) {
            $_SESSION['error'] = 'Please enter district2.';
            header("location: signUp.php");
        } else if (empty($province)) {
            $_SESSION['error'] = 'Please enter province.';
            header("location: signUp.php");
        } else if (empty($phonenumber)) {
            $_SESSION['error'] = 'Please enter phonenumber.';
            header("location: signUp.php");
        } else if (empty($conpassword)) {
            $_SESSION['error'] = 'Please enter confrim password.';
            header("location: signUp.php");
        } else if ($password != $conpassword) {
            $_SESSION['error'] = 'Passwords don\'t match.';
            header("location: signUp.php");
        } 
        // for check email :>
        // else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     $_SESSION['error'] = 'Please enter confrim password';
        //     header("location: signUp.php");
        // }
        else {
            try {
                $check_username = $conn->prepare("SELECT username FROM users WHERE username = :username"); // or query
                $check_username->bindParam(":username",$username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);

                if ($row['username'] == $username) {
                    $_SESSION['warning'] = 'This username is not available.';
                    header("location: signUp.php");
                } else if (!isset($_SESSION['error'])) {
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users(username, password, housenumber, 
                            village, district, district2, province, building, phonenumber) 
                            VALUES (:username, :password, :housenumber, :village, :district, 
                            :district2, :province, :building, :phonenumber)");
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":housenumber", $housenumber);
                    $stmt->bindParam(":village", $village);
                    $stmt->bindParam(":district", $district);
                    $stmt->bindParam(":district2", $district2);
                    $stmt->bindParam(":province", $province);
                    $stmt->bindParam(":building", $building);
                    $stmt->bindParam(":phonenumber", $phonenumber);
                    $stmt->execute();
                    $_SESSION['success'] = "You have successfully registered. <a href='login.php' class='alert-link'> Click here </a> to login";
                    header("location: signUp.php");
                } else {
                    $_SESSION['error'] = "something went wrong.";
                    header("location: signUp.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    } 

    // check -> login
    else if (isset($_POST['btnOK'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $_SESSION['autoLOG'] = 1;

        if (empty($username)) {
            $_SESSION['error'] = 'Please enter username.';
            header("location: login.php");
        } else if (empty($password)) {
            $_SESSION['error'] = 'Please enter password.';
            header("location: login.php");
        } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
            $_SESSION['error'] = 'Password must be between 5 and 20 characters long.';
            header("location: login.php");
        } else {
            try {
                $check_username = $conn->prepare("SELECT * FROM users WHERE username = :username"); 
                $check_username->bindParam(":username", $username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);

                if ($check_username->rowCount() > 0) {
                    if ($username == $row['username']) {
                        if (password_verify($password, $row['password'])) {
                            setcookie('user', $row['id'], time() + 3600, "/");
                            header("location: home.php");
                        } else {
                            $_SESSION['error'] = 'Entered wrong password.';
                            header("location: login.php");
                        }
                    } else {
                        $_SESSION['error'] = 'Entered wrong username.';
                        header("location: login.php");
                    }
                } else {
                    $_SESSION['error'] = "There is no user information. <a href='signUp.php' class='alert-link'> Click here </a> to signUp";
                    header("location: login.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    } 

    // check -> Reset password
    else if (isset($_POST['btnCSD'])) {
        $username = $_POST['username'];
        $phonenumber = $_POST['phonenumber'];
        $newpassword = $_POST['newpassword'];

        if (empty($username)) {
            $_SESSION['error'] = 'Please enter username.';
            header("location: consider.php");
        } else if (empty($phonenumber)) {
            $_SESSION['error'] = 'Please enter phonenumber.';
            header("location: consider.php");
        } else if (empty($newpassword)) {
            $_SESSION['error'] = 'Please enter password.';
            header("location: consider.php");
        } else if (strlen($_POST['newpassword']) > 20 || strlen($_POST['newpassword']) < 5) {
            $_SESSION['error'] = 'Password must be between 5 and 20 characters long.';
            header("location: consider.php");
        } else {
            try {
                $check_username = $conn->prepare("SELECT * FROM users WHERE username = :username"); 
                $check_username->bindParam(":username", $username);
                $check_username->execute();
                $row = $check_username->fetch(PDO::FETCH_ASSOC);

                if ($check_username->rowCount() > 0) {
                    if ($username == $row['username']) {
                        if ($phonenumber == $row['phonenumber']) {
                            $newpasswordHash = password_hash($newpassword, PASSWORD_DEFAULT);
                            $stmt = $conn->prepare("UPDATE users SET password = :password WHERE id = :id");
                            $stmt->bindParam(":id", $row['id']);
                            $stmt->bindParam(":password", $newpasswordHash);
                            $stmt->execute();

                            $_SESSION['success'] = "You have successfully changed your password. Log in. <a href='login.php'> Click here. </a>";
                            header("location: consider.php");
                        } else {
                            $_SESSION['error'] = 'Entered wrong phonenumber.';
                            header("location: consider.php");
                        }
                    } else {
                        $_SESSION['error'] = 'Entered wrong username.';
                        header("location: consider.php");
                    }
                } else {
                    $_SESSION['error'] = "There is no user information. <a href='signUp.php' class='alert-link'> Click here </a> to signUp";
                    header("location: consider.php");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
    
    else {
        // check if there is a login
        if (isset($_COOKIE['user'])) {

            // check -> edit information
            if (isset($_POST['btnEdit'])) {
                $new_housenumber = $_POST['new_housenumber'];
                $new_village = $_POST['new_village'];
                $new_district = $_POST['new_district'];
                $new_district2 = $_POST['new_district2'];
                $new_province = $_POST['new_province'];
                $new_building = $_POST['new_building'];
                $new_phonenumber = $_POST['new_phonenumber'];
        
                if (empty($new_housenumber)) {
                    $_SESSION['error'] = 'Please enter housenumber.';
                    header("location: person2.php");
                } else if (empty($new_village)) {
                    $_SESSION['error'] = 'Please enter village.';
                    header("location: person2.php");
                } else if (empty($new_district)) {
                    $_SESSION['error'] = 'Please enter district.';
                    header("location: person2.php");
                } else if (empty($new_district2)) {
                    $_SESSION['error'] = 'Please enter district2.';
                    header("location: person2.php");
                } else if (empty($new_province)) {
                    $_SESSION['error'] = 'Please enter province.';
                    header("location: person2.php");
                } else if (empty($new_phonenumber)) {
                    $_SESSION['error'] = 'Please enter phonenumber.';
                    header("location: person2.php");
                } else {
                    try {
                        $id = $_COOKIE['user'];
                        $stmt = $conn->prepare("UPDATE users SET housenumber = :housenumber,  village = :village,  district = :district, 
                                district2 = :district2, province = :province, building = :building, phonenumber = :phonenumber WHERE id = :id");
                        $stmt->bindParam(":id", $id);
                        $stmt->bindParam(":housenumber", $new_housenumber);
                        $stmt->bindParam(":village", $new_village);
                        $stmt->bindParam(":district", $new_district);
                        $stmt->bindParam(":district2", $new_district2);
                        $stmt->bindParam(":province", $new_province);
                        $stmt->bindParam(":building", $new_building);
                        $stmt->bindParam(":phonenumber", $new_phonenumber);
                        $stmt->execute();
        
                        $_SESSION['success'] = "You have now edited your information. Please <a href='login.php'> login </a> again.";
                        header("location: person2.php");
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }

            // check -> shop
            else if (isset($_POST['sub']) || $_SESSION['shop'] > 0 || $_COOKIE['cart'] == 0 || $_SESSION['autoLOG'] == 1) {
                try {
                    $id = $_COOKIE['user'];
                    $check_cart = $conn->prepare("SELECT * FROM carts WHERE id = :id"); 
                    $check_cart->bindParam(":id", $id);
                    $check_cart->execute();
                    $row = $check_cart->fetch(PDO::FETCH_ASSOC);
    
                    $rubber = intval($_POST['rubber']) + $row['rubber'];
                    $nutset = intval($_POST['nutset']) + $row['nutset'];
                    $sparkplug = intval($_POST['sparkplug']) + $row['sparkplug'];
                    $filter = intval($_POST['filter']) + $row['filter'];
                    $shockabsorber = intval($_POST['shockabsorber']) + $row['shockabsorber'];
                    $headlight = intval($_POST['headlight']) + $row['headlight'];
                    $discbrekes = intval($_POST['discbrekes']) + $row['discbrekes'];
                    
                    if ($check_cart->rowCount() > 0) {
                        if ($id == $row['id']) {
                            $stmt = $conn->prepare("UPDATE carts SET rubber = :rubber, nutset = :nutset, 
                                    sparkplug = :sparkplug, filter = :filter, shockabsorber = :shockabsorber, 
                                    headlight = :headlight, discbrekes = :discbrekes WHERE id = :id");
                            $stmt->bindParam(":id", $id);
                            $stmt->bindParam(":rubber", $rubber);
                            $stmt->bindParam(":nutset", $nutset);
                            $stmt->bindParam(":sparkplug", $sparkplug);
                            $stmt->bindParam(":filter", $filter);
                            $stmt->bindParam(":shockabsorber", $shockabsorber);
                            $stmt->bindParam(":headlight", $headlight);
                            $stmt->bindParam(":discbrekes", $discbrekes);
                            $stmt->execute();

                            $cart = 0;
                            if (!empty($rubber)) setcookie('cart', $cart += 1, time() + (10 * 365 * 24 * 60 * 3600));
                            if (!empty($nutset)) setcookie('cart', $cart += 1, time() + (10 * 365 * 24 * 60 * 3600));
                            if (!empty($sparkplug)) setcookie('cart', $cart += 1, time() + (10 * 365 * 24 * 60 * 3600)); 
                            if (!empty($filter))  setcookie('cart', $cart += 1, time() + (10 * 365 * 24 * 60 * 3600));
                            if (!empty($shockabsorber)) setcookie('cart', $cart += 1, time() + (10 * 365 * 24 * 60 * 3600));
                            if (!empty($headlight)) setcookie('cart', $cart += 1, time() + (10 * 365 * 24 * 60 * 3600));
                            if (!empty($discbrekes)) setcookie('cart', $cart += 1, time() + (10 * 365 * 24 * 60 * 3600));

                            $_SESSION['autoLOG'] = 0;
                            $_SESSION['shop'] = 0;
                            header("location: shop.php");
                        } else {
                            $_SESSION['error'] = 'An internal error occurred. Please come back again.';
                            header("location: shop.php");
                        }
                    } else {
                        $stmt = $conn->prepare("INSERT INTO carts(id, rubber, nutset, sparkplug, filter, 
                                shockabsorber, headlight, discbrekes) VALUES (:id, :rubber, :nutset, 
                                :sparkplug, :filter, :shockabsorber, :headlight, :discbrekes)");
                        $stmt->bindParam(":id", $id);
                        $stmt->bindParam(":rubber", $rubber);
                        $stmt->bindParam(":nutset", $nutset);
                        $stmt->bindParam(":sparkplug", $sparkplug);
                        $stmt->bindParam(":filter", $filter);
                        $stmt->bindParam(":shockabsorber", $shockabsorber);
                        $stmt->bindParam(":headlight", $headlight);
                        $stmt->bindParam(":discbrekes", $discbrekes);
                        $stmt->execute();
                        $_SESSION['shop'] = 1;
                        header("location: checkDB.php");
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }    

            // check -> cart && order
            else if (isset($_POST['Scon']) || isset($_POST['Scer'])) {
                try {
                    $id = $_COOKIE['user'];
                    $check_cart = $conn->prepare("SELECT * FROM carts WHERE id = :id"); 
                    $check_cart->bindParam(":id", $id);
                    $check_cart->execute();
                    $row = $check_cart->fetch(PDO::FETCH_ASSOC);
    
                    if ($check_cart->rowCount() > 0) {
                        if ($id == $row['id']) {  
                            if (isset($_POST['Scon'])) {
                                $stmt = $conn->prepare("INSERT INTO orders(list, id, rubber, nutset, sparkplug, filter, 
                                        shockabsorber, headlight, discbrekes) VALUES (:list ,:id, :rubber, :nutset, 
                                        :sparkplug, :filter, :shockabsorber, :headlight, :discbrekes)");
                                $stmt->bindParam(":list", $row['list']);
                                $stmt->bindParam(":id", $id);
                                $stmt->bindParam(":rubber", $row['rubber']);
                                $stmt->bindParam(":nutset", $row['nutset']);
                                $stmt->bindParam(":sparkplug", $row['sparkplug']);
                                $stmt->bindParam(":filter", $row['filter']);
                                $stmt->bindParam(":shockabsorber", $row['shockabsorber']);
                                $stmt->bindParam(":headlight", $row['headlight']);
                                $stmt->bindParam(":discbrekes", $row['discbrekes']);
                                $stmt->execute();

                                $stmt = $conn->prepare("DELETE FROM carts WHERE id = :id");
                                $stmt->bindParam(":id", $id);
                                $stmt->execute();

                                setcookie('cart', 0, time() - (10 * 365 * 24 * 60 * 3600));
                                $_SESSION['success'] = "To view ordering details, <a href='orders.php'> click here. </a>";
                                header("location: shop.php");

                            } else if (isset($_POST['Scer'])) {
                                $stmt = $conn->prepare("DELETE FROM carts WHERE id = :id");
                                $stmt->bindParam(":id", $id);
                                $stmt->execute();

                                setcookie('cart', 0, time() - (10 * 365 * 24 * 60 * 3600));
                                header("location: shop.php");
                            } else {
                                $_SESSION['error'] = 'An internal error occurred. Please come back again.';
                                header("location: shop.php");
                            }
                        } else {
                            $_SESSION['error'] = 'An internal error occurred. Please come back again.';
                            header("location: shop.php");
                        }
                    } else {
                        $_SESSION['error'] = 'An internal error occurred. Please come back again.';
                        header("location: shop.php");
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }

            // check -> edit cart
            else if (isset($_POST['editcart'])) {
                try {
                    $id = $_COOKIE['user'];
                    $check_cart = $conn->prepare("SELECT * FROM carts WHERE id = :id"); 
                    $check_cart->bindParam(":id", $id);
                    $check_cart->execute();
                    $row = $check_cart->fetch(PDO::FETCH_ASSOC);

                    $new_rubber = $_POST['new_rubber'] == '' ? $row['rubber'] : $_POST['new_rubber'];
                    $new_nutset = $_POST['new_nutset'] == '' ? $row['nutset'] : $_POST['new_nutset'];
                    $new_sparkplug = $_POST['new_sparkplug'] == '' ? $row['sparkplug'] : $_POST['new_sparkplug'];
                    $new_filter = $_POST['new_filter'] == '' ? $row['filter'] : $_POST['new_filter'];
                    $new_shockabsorber = $_POST['new_shockabsorber'] == '' ? $row['shockabsorber'] : $_POST['new_shockabsorber'];
                    $new_headlight = $_POST['new_headlight'] == '' ? $row['headlight'] : $_POST['new_headlight'];
                    $new_discbrakes = $_POST['new_discbrakes'] == '' ? $row['discbrekes'] : $_POST['new_discbrakes'];
    
                    if ($check_cart->rowCount() > 0) {
                        if ($id == $row['id']) {  
                            $stmt = $conn->prepare("UPDATE carts SET rubber = :rubber, nutset = :nutset, sparkplug = :sparkplug, 
                                    filter = :filter, shockabsorber = :shockabsorber, headlight = :headlight, discbrekes = :discbrekes WHERE id = :id");
                            $stmt->bindParam(":id", $id);
                            $stmt->bindParam(":rubber", $new_rubber);
                            $stmt->bindParam(":nutset", $new_nutset);
                            $stmt->bindParam(":sparkplug", $new_sparkplug);
                            $stmt->bindParam(":filter", $new_filter);
                            $stmt->bindParam(":shockabsorber", $new_shockabsorber);
                            $stmt->bindParam(":headlight", $new_headlight);
                            $stmt->bindParam(":discbrekes", $new_discbrakes);
                            $stmt->execute();

                            setcookie('cart', 0, time() - (10 * 365 * 24 * 60 * 3600));
                            header("location: cart.php");
                        } else {
                            $_SESSION['error'] = 'An internal error occurred. Please come back again.';
                            header("location: shop.php");
                        }
                    } else {
                        $_SESSION['error'] = 'An internal error occurred. Please come back again.';
                        header("location: shop.php");
                    }
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }

            // check -> repair
            else if (isset($_POST['Sc'])) {
                try {
                    $id = $_COOKIE['user'];
                    $car = $_POST['car'];
                    $problem = $_POST['problem'];
                    $problemDT = $_POST['problemDT'];

                    $stmt = $conn->prepare("INSERT INTO repairs(id, car, problem, problemDT) VALUES (:id, :car, :problem, :problemDT)");
                    $stmt->bindParam(":id", $id);
                    $stmt->bindParam(":car", $car);
                    $stmt->bindParam(":problem", $problem);
                    $stmt->bindParam(":problemDT", $problemDT);
                    $stmt->execute();
                    
                    $_SESSION['success'] = "Please wait for the admin to check and contact you back. <a href='details.php' class='alert-link'> Check status </a>";
                    header("location: repair.php");
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }

            // check -> cancel rapair
            else if (isset($_REQUEST['list'])) {
                try {
                    $list = $_REQUEST['list'];

                    $stmt = $conn->prepare("DELETE FROM repairs WHERE list = :list");
                    $stmt->bindParam(":list", $list);
                    $stmt->execute();
                    
                    header("location: details.php");
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }  
        } else {
            header("location: login.php");
        }
    }
?>