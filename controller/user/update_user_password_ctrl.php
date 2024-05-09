<?php 
    include_once "../../model/pdo.php";
    include_once "../../model/functions.php";
    session_start();

//                                             ..--.       ...                                         
//                                            .=*-..      ..*:.                                        
//                                           .=#-.   ..   ..*-...                                      
//                                          .-#+..  .:.   ..+=-..                                      
//                                        . :#*... ..=-.  ..===..                                      
//                                        ..+#-.   .-*-    .===..                                      
//                                       ..:#*..  ..#=:    .=--.                                       
//                                       ..##-.+. .-#+.  ...+::..                                      
//                        ...            .-#*.-=. .+*+. .-..*::..                                      
//                    .....-....        ..=#+.--: .**+...+..+--.                                       
//                    :-::+:.=-:        ..*#-.---=****..:*..=-:.                                       
//                    ==:==-*-:.:..     ..##:-+-**##+*=-**.:-:.                           ...-.....:...
//                  ..*==*+#+==--..     .:##*#*=####**+*#+=--=.                            .=*::-..++-.
//                  .=++.:++-*+-.       ..=###*+####*=:*#***=-.                           ..**=-*.=**-.
//                  .+****#+-+=.          :####*#***+-==*+**=:.                           .-**.=#..**=.
//                  ..##%%#*#*:.         .-*##%%##-+=-:-*-+=...                          ..++=.**::#*=.
//                  ..*#*#*#*+...:..    ..=*###@#*#%*-%#=-+:                              :*++:*#-***=.
//                  ..*###***-.. =-..:.  ..****###**==++:=*:                            ..+**#%%####*=.
//                  .:#@@%%**-+..-+:.-=  ..*#%####%#-==++*..     ..                     .-#+*%@%*%##*=.
//                  ..******..+*::++--*:...-##%**%##+++++-..   ...:    ...            ...**+#%@%*###*=.
//                  .:**+++-..***=+**+#*:.=.%#%#*%++*+-*+..=....-:.....-.             ...+-+=%%#**%+*+.
//                  .-***+*-.:**########:=* *#%%*#=**=**..+=..==-...-+=...             ..+++:*##*#%**+:
//                  .=+++=*-..+*###%#*#####-#*%%#*=*+*+-.*+****#+-=:+:.:=.              .+=+.*##**#*+:.
//                  .+#*+=+=...*###+=+%%*#*%##%##=+*+++*#+*#*-#####=.:*=..              .==*:*#*#*#+=..
//                ..:*#*+=+*#******##%#*###%%%%##==*+++*###*-*#*###*+*:..               .=+*##%*%#*+:. 
//                ..=+*==++*%@@%**=*#++*#***#%%%%*+-.:++*#%%##+#####=..                 .:=*###*#*+-.. 
//                ..-*#*+++*#%@%*--#*-=-+-:=*#%%#*-=--:+***#@%*+*##*:.                    .-****+:.    
//                .=**==-=*%#**+###+=:==+-:::-*##*=:::-=**+**##+=***=..                   ..**==.      
//               ..=+***++###***#*==:.:*=.:...:---:=*=:-++=+*##+*=++*:.                    .+*+=..     
//               ...*###*++*####%%@=-++=:.:..:+=-....:*++**+%#+******+..                    +*+:.      
//                ...*#%##*###+*#*%*++=--=+#****+:...-.-#*=+++#******=..                   .**+..      
//                  .:-+**##%%%##%@#@@@@@@%%%##***+=:...-=+--++##***+=:..                  .*++..      
//                  ..-+=..:+*#%%#%@@@@@@@%%%###***++=--::--===@@%#+=..                   .:*+=.       
//                  .-++......#@@@@@@@@@@@@%##*##**++*++---=++*@@@@#+#:..                 .-*+-        
//                  ..=:..   .#@@@@@@@@@@@@%#*****++*+++*###%##@@@@%*#@#=..               .=*+:..      
//                           .#@@@@@@@@@@@@@#+*++++++++==+++##*%@@@@*+#@@%#=.             :**+:..      
//                           .#@@@@@@@@@@@@@@@*=====+=-+=+++##*#@@@@%*@%@@%=.        ...:-=**+-..      
//                           .#@@@@@@@@@@@@@@@%#*-:====+=+++##*%@@@@@##@#===--:.....:-+%%*+#**+=..     
//                         ..:%@@%@@@@@@@@@@@%%#**+=:-=+++++**%@@@@@@@#%%%#*#########%%%##=#+*--.      
//                          .=%@%%@@@@@%@@@@@%%#####***+**##%@@@@@@@@@@%%%###*#*#*#**%%#*%%*+*-:..     
//                          .+%%@@@@@@%%@@@@@%%###*=-+==+*++%@@@@@@@@%%@%@##%##*#****###**#***=-.      
//                         ..%%@@@@@@@@%@@@@%%###**==*==+*+*%@@@@@@@@*=+****==*=..++:.....**+-=:.      
//                         .*%@@@@@@@@%@@@@@%%###**+=+=++*++@@@@@@@@@*.  .-+-.-**-:==:...-*+=.         
//                         :%%@@@@@@@%@@@@@@%##***++=+=+++*+@@@@@@@@@@-....+**=......  ..+*+=.         
//                        .=%@@%@@@@@%@@@@%#%###*+++++=+****@%@@@@@@@@%.. ......      ...+*+-..        
//                        ..:*%%@@@@%%@@@%#+*****+--=+*++*###*@@@@@@@@@#..            ...**=:.         
//                         ..%%%@@@%%@@@@%*==*+**+-..---+**=%*=@@@@@@@@@+.            ...#+=..         
//                         .+%%@@@@%@@@@@%*+----==+-=.*++*--%***@@@@@@@@@=.           ..:*+-..         
//                         .#@%%%@%@@@@@@%%#*=:.---=:=+**+.+#*=-%@@@@@@@@%=..         ..-*=:           
//                        .=@%%%@%%@@@@@@%##*+-:.::=.=***++**%+-#@@@@@@@@@%-..        ..**=:           
//                       ..*%%%@%@@@@@@@@*#++=-=+:-:-=+=++**#@++*@@@@@@@@@%%=.        ..#+=.           
//                       .-%%%@@@@@@@@@%**+*==---=+:--++=+**#@%**%@@@@@@@@%+:.         .#+=.           
//                      .:%##%%@@@@@@@@@%+*-*=-:::--=-++:.*++++*##%@@@@@@@%:.         .=#=-.           
//                    ...+#%@@@%@@@%@%%@@%**+=:=:::**++=:=-=-=++=#*#@@@@@@@*.        ..**+:.           
//                    ..-%@@@@@@@@@#*@@%%###=-=::+%=++==:..+-==--#%+%@@@@@@%-.       ..**=:.           
//                   ..*@@@@@@@@@@@@@%%*#****+=:-++@*===-:.======#@#%@@@@@@@#..      .:#+=.            
//                 ...#@@@@@@@@@@@@@@%*#+*++-:++*=#%@++++=::*-=-==@#*@@@@@@@%+..     .:#+-.            
//                  .:%@@@@@@@@@@@@@@%#+*=--++--+*#%@@*+===+====+=+#*#@@@@@@@%..      ....             
//                  .#@@%%%@@@@@@@@@%###==.+=..=+#@@@@%*=======-===*%**@@@@@@%+.                       
//                  .#%%%%@@@@@@@@@#%####:=#+:-++%@@@@%%#+==-+-=*==+@%*%@@@@@@%..                      
//                  .*%%#@@@@@@@@%%###***###*=++*%@@@%@%##+======+-+*%*@@@@@@@%+..                     
//                 ..*%%%@@@@@@@@%#****%#+*+--+:#@@@@%@@%%#+=-=+-+=++**#@@@@@@%%-.                     
//                ...#%%@@@@@@@@@@#+*+%**-++==++#@@@@%@@@%%%+==*+=++%#**@@@@@@%%*...                   
//                ..*%%@@@@@@@@@@@@#+@#*+*%#+*++#@@@@%@@@@%%%*+*++**++#@@@@@@@@%%=.                    
//               ..+%%@@@@@@@@@@@@@@%%#**#*#**+*@@@@@@@@@@@@%%%#*+%*++#@@@@@@@@%%%-.                   
//               .-##@@@@@@@@@@@@@@%#%%%##****+%@@@@@@@@@@@%%%%#+*#*+**@@@@@@@@@%%#..                  
//              .:##%@@@@@@@@@@@@%%#*%##%##+**#@@@@@@@%@@@@@%#*#%*+***#%%%@@@@@@@%%+..                 
//             ..*#%%@@@@@@@@@@@@%@%%%##%%@%#*@@@@@@@@@@@@@%%@%#**+***#%%#*@@%@%@@%%*.                 
//             .-#%%@@@@@@@@@@@@@@@@%%#######%@@@@@@@@@@@@@@%##*##*+++%@@%#@@@@@@@%%%*..               
//            .:#%%%%@@@@@@@@@@@@@@@#=###**##@@@@@@@@@@@@@@%#****+%*+*%@@@%@@@@%%%@%%%#:..             
//           ..*%%@@@@@%@@@@@@@@@@@@#*###**#@@@@@@@@@@@@@@@%#****+#%#%@@@@@@@@@%%%%%%%%%#:..           
//          ..+%%%@@@@%%@@@@@@@@@@@%***###*@@@@@@@@@@@@@@@@##******+#@@@@@@@@@@@@%%%%%%%%%%=..         
//         ..=%%%@@@@%%@@@@@@@@@%%%##*+*+*%@@@@@@@@@@@@@@@@#***+***+*@@@@@@@@@@@@%%%%%%%%%%%*..        
//        ..=%@%%@@%@%@@@@@@@@@@@%#*#%#*%@@@@@@@@@@@@@@@@@%#***+**##*=@@@@@@@@@@@@%%%%%%%%%%%*..       
//        .-%@%%%@%%%%@@@@@@@@@%%%#*%%%%%@@@@@@@@@@@@@@@@@#********%%#**@@@@@@@@@@@%%%%%%%%%%#.        
//      ..-%@%%%@@%%%@@@@@@@@@%%%#*##*###@@@@@@@@@%@@%@@@@%***++**#@@++@@@@@@@@@@@%%%%%%%%%%%-..       
//     ..:%@%%%@%%%%%%@@@@@@@@@%#**#*+**%@@@@@@@@%%%%%@@@%#***+**#%@@#%@@@@@@@@@@@%%%%%%%%%%+..        
//     .:%@%%%%%%%%%@@@@@@@@@@%%#**#*+*%@@@@@@@@@%%%%%%%@%#******###%@@@@@@@@@@@@@%%%%%%%%%*..         
//   ...*@%%%%%%%%%%@@@@@@@@@%%###%%#*@@@@@@@@@@%%%%%%%%@%#*#****%%+#@@@@%%%%%%@@@@@%%%%%%*..          
//   ..+%@%%%%%%%%%%@@@@@@@@%%#####%#*@@@@@@%@@@%%%%%%%%%%#***#**%%#%%##%%%+#%%%@@@@@%%*##..           
//   .-%@@%%%@%@%@%%@@@@@@@@#####**#*@@@@@*.-%@#=.:=+*%*#%#****##*=-:..........%%#-+##:....            
//  ..*@@%%%@@@@@%%%@@@@%@@%%*##**+*%@%#%%=..+*...    . .:##****++..          ......                   
// ..+%@@%%%@@@@%%%%@@@@@@%%%#-##*+.-*:.... ...         .-%****+...                                    
// .*%%@@@%%@@@%%%%%%%%%@@%%%###%*.. ...               . =%***#-=..                                    
// -%@%%@@%%@%%#---:%*.:+*@%#+***-..                   ..%%###*:=+:..                                  
// :%%%%@%%%%+..   ... ..-%#**+++..                     :###**#*++##*-:....                            
// ..%%@@@%*..         ..*%#*+##-                       .###*****#####%%##=.......                     
// ..*%%%%*...         ..+#*=::*.                       .#*****##%#*##+++*#*###*=...                   
//  ..=%-...          .:#%%*-:.=..                    ...####**#########*=+=--==:..                    
//   . ..             .*%%%+=--+.                      ..-=++**###########***+=...                     
//                    -%%@@##*##=                        .     ........:::-=+=..                       
//                  ..*%%%%%#####-.                                                                    
//                 ..=*%%%#%%#####-..                                                                  
//                  .+**#%#####%%%#:.                                                                  
//                  ..:******##**#*=.                                                                  
//                    ..:+*********=.                                                                  
//                      ....-+***+-..                                                                  

if (!empty($_POST["oldpsw"]) && !empty($_POST["newpsw"])) {
  $id = $_POST['id_user'];
  $sql_old_psw = "SELECT password FROM User WHERE id_user=$id";
  $stmt_old_psw = $pdo->query($sql_old_psw);
  $password = $stmt_old_psw->fetch(PDO::FETCH_ASSOC);
  $password = $password['password'];
    if (password_verify($_POST["oldpsw"], $password)){
        if ($_POST["oldpsw"] != $_POST["newpsw"]) {
            $psw = password_hash($_POST["newpsw"], PASSWORD_ARGON2I);
            try {
                $sql = "UPDATE User SET password=? WHERE id_user=? ";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$psw, $id])) {
                    alert("Le mot de passe a été modifié avec succès", "success", "../../view/user/update_user_password.php?id_user=$_SESSION[id_user]", true);
                } else {
                    alert("Le mot de passe n'a pas été modifié", "failed", "../../view/user/update_user_password.php?id_user=$_SESSION[id_user]", true);
                }
            }catch (PDOException $e) {
                // echo "<h2>Une erreur est survenue: </h2>". $e->getMessage();
                alert("Une erreur est survenue", "failed", "../../view/user/update_user_password.php?id_user=$_SESSION[id_user]", true);
            }
        }else {
            alert("Vous avez utilisé le même mot de passe, veuillez en choisir un nouveau", "failed", "../../view/user/update_user_password.php?id_user=$_SESSION[id_user]", true);
        }
    }else {
        alert("Le mot de passe renseigné est incorrect", "failed", "../../view/user/update_user_password.php?id_user=$_SESSION[id_user]", true);
    }
}else {
    alert("Veuillez renseigner votre mot de passe ainsi que le nouveau mot de passe", "failed", "../../view/user/update_user_password.php?id_user=$_SESSION[id_user]", true);
}