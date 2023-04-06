<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@600&family=Montserrat:ital,wght@0,300;0,500;1,800;1,900&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="content">

        <h3>Srilankan ID Card Detail Suplier</h3>
        <form action="index.php" method="post">
            <label for="">enter your id number :</label>
            <input class = "box"type="text" name="id_no"><br>
            <input class ="btn" type="submit">
        </form> 

            <?php 
        if(isset($_POST["id_no"])){
            
            $id_num = $_POST["id_no"];
            if(strlen($id_num) == 12){
                new_sys($id_num);
            }
            else if (strlen($id_num) == 10){
                old_sys($id_num);
            }
            else{
                echo "<h4>you enterd invalid number<h4>";
            }
            
        }

        function new_sys($id_num){
            $year = substr($id_num,0,4);
            $key = substr($id_num,4,3);

            echo "year :".$year;
            gender($key);
            b_day($key);
            
        }

        function old_sys($id_num){
            $year = "year : 19".substr($id_num,0,2);
            $key = substr($id_num,2,3);

            echo $year;
            gender($key);
            b_day($key);
        }
        
        function gender($key){
            if($key <= 500){
                return true;
            }
            else{
                return false;
            }

        }
        
        function findFirstNearestSmallerNumber($arr, $target) {
            $nearestNumber = null;
        
        
            for ($i = 0; $i < count($arr); $i++) {
                if ($arr[$i] < $target) {
                    $nearestNumber = $i;
                } else {
                    $months=$i;
                    break;
                }
            }
        
            return $nearestNumber;
            
            
        }

        function b_day($key){
            $sumday =  array(31,60,91,121,152,182,213,244,274,305,335,366);
            if(gender($key)== true){
                $n_day = $sumday[findFirstNearestSmallerNumber($sumday,intval($key))];
                $birth_day =$key - $n_day;
                
                echo "<br>";
                echo "Gender : male";
                echo "<br>";
                echo "Birthday : $birth_day";

                months(findFirstNearestSmallerNumber($sumday,intval($key)));
            }
            else{
                $g_day = intval($key)-500;
                $n_day = $sumday[findFirstNearestSmallerNumber($sumday,$g_day)];
                $birth_day = $g_day - $n_day;

                echo "<br>";
                echo "Gender : female";
                echo "<br>";
                echo "Birthday : $birth_day";

                months(findFirstNearestSmallerNumber($sumday,$g_day));
            }
        }
        
        function months($index){
            $index+=1;

            $mo_en = array ("January","February","March","April","May","June","July","August","September","October","November","December");

            echo "<br>";
            echo "month  : $mo_en[$index]";
        }
        
        
        ?>
    </div>

    <div class="botom">
           
        <div class="cont">
            <h2>Contact Me</h2>
            <hr>
        </div>
        <div class="ico">
            <ul>
            <li><a href="https://github.com/ranjula12"><i class="fa-2xl fa-brands fa-github fa-fw"></i></a></li>
            <li><a href="https://www.facebook.com/ranjula.bandara.54/"><i class="fa-2xl fa-brands fa-facebook fa-fw"></i></a></li>
            <li><a href="https://www.linkedin.com/in/ranjula-bandara-a87745226/"><i class="fa-2xl fa-brands fa-linkedin fa-fw"></i></a></li>
            </ul>
        </div>
        
        <p>Copyright © 2023 Ranjula(lucifer)Dev. All Rights Reserved!</p>
    </div>

    
</body>
</html>