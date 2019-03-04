<?php

$this->title = Yii::t('app', 'Gitc Yerevan');
$this->params['breadcrumbs'][] = $this->title;

$this->registerMetaTag(['name' => 'keywords', 'content' => Yii::t('app', 'Gitc Yerevan')]);
$this->registerMetaTag(['name' => 'description', 'content' => Yii::t('app', 'Gitc Yerevan')]);
?>

<section class="gitc_wrapper">

    <div>
        <article>
            <?php
            $getRequest = Yii::$app->request->get(); ?>

            <div>
                <h3 class="gitc_training_title">
                    <?= Yii::t('app', 'Բարի գալուստ ԳՏՏԿ Երևան') ?>
                </h3>
                <article class="gitc_news_more_content">
                    <img src='http://gitc.am/uploads/pages/gitc-yerevan.png' alt="" class="gitc_news_image">

                    <p>Ուրախ ենք տեղեկացնել, որ Գյումրիի տեղեկատվական տեխնոլոգիաների կենտրոնը այսուհետ կգործի նաև
                        Երևանում։ Մեզ մոտ դասավանդում են ոլորտի լավագույն ընկերությունների բարձրակարգ մասնագետները։ Դուք
                        հնարավորություն կունենաք ութամսյա դասըթացների արդյունքում ստանալ ծրագրավորման հմտություններ և
                        համագործակցել բիզնես ոլորտի ներկյացուցիչների հետ։</p>

                </article>
                <div class="gitc_clear"></div>

                <div class="addthis_native_toolbox"></div>
            </div>
        </article>
    </div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="slider-for">
                    <?php if (!empty($result)): ?>
                        <?php foreach ($result[0] as $k => $item): ?>
                            <div>
                                <img <?= $item ?> alt="carousel" class="news_img">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>


<?php
$nameErr = $surnameErr=$emailErr = $adrErr =$phoneErr="";
$name = $email = $surname = $address = $phone = "";


            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                  if (empty($_POST["username"])) {
                    $nameErr = "Name is required";
                  } else {
                    $name = test_input($_POST["username"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                      $nameErr = "Only letters and white space allowed"; 
                    }
                  }
                     if (empty($_POST["surname"])) {
                    $surnameErr = "Surname is required";
                  } else {
                    $surname = test_input($_POST["surname"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z ]*$/",$surname)) {
                      $surnameErr = "Only letters and white space allowed"; 
                    }
                  }
                  
                  if (empty($_POST["address"])) {
                    $adrErr = "Address is required";
                  } 
                 
                 
                  if (empty($_POST["email"])) {
                    $emailErr = "Email is required";
                  } else {
                    $email = test_input($_POST["email"]);
                     $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
                    // check if e-mail address is well-formed
                   
                   if (!preg_match($email_exp, $email)) {
                         $emailErr = "Invalid email format"; 
                     }
       
                  }
                    
                  if (empty($_POST["phone"])) {
                    $phoneErr = "Phone number is required";
                  } 
             }
        
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
?>



<section class="gitc_wrapper">
    <div class="menu_header">
        <div class="gitc_container">
            <h2>Գրանցվել մեր դասընթացներին</h2>
        </div>
    </div>
    <article class="gitc_container  ">

        <!--<div class="col-md-6">-->
        <form id="w0" action="" method="post">
            <input type="hidden" name="_csrf" value="UTRuck5QWnYlWjoEAyIZO2B4GCojJRAOAHcYJgE8LzcmAxY.ezciJA==">
    <div class="gitc_inputs-first-block">
            <div class="form-group field-enroll-firstname required">
                <label class="control-label" for="enroll-firstname">Անուն</label>
                <input type="text" id="enroll-firstname" class="form-control" name="username" maxlength="80">
                    <span style="color:red"> <?php echo $nameErr;?></span>
                <div>
                    <div>
                    </div>
                    <div class="form-group field-enroll-lastname required">
                        <label class="control-label" for="enroll-lastname">Ազգանուն</label>
                        <input type="text" id="enroll-lastname" class="form-control" name="surname" maxlength="80">

                         <span style="color:red"> <?php echo $surnameErr;?></span>
                    </div>
                    <div class="form-group field-enroll-state required">
                        <label class="control-label" for="enroll-state">Հասցե</label>
                        <input id="enroll-state" class="form-control" name="address" type="text">

                         <span style="color:red"> <?php echo $adrErr;?></span>
                    </div>
                    <label for="gitc_w1-kvdate">Ծննդյան ամսաթիվ</label>

                    <div style="width:100%" class="input-group date"><input type="date" id="w1"
                                                                                         class="krajee-datepicker form-control"
                                                                                         name="dob" value="1998-01-01"
                                                                                         data-datepicker-source="w1-kvdate"
                                                                                         data-datepicker-type="2"
                                                                                         data-krajee-kvdatepicker="kvDatepicker_44c07868">
                    </div>
                    

                </div>

                <div class="">
                    <div class="form-group field-enroll-phone required">
                        <label class="control-label" for="enroll-phone">Հեռախոսահամար</label>
                        <input type="text" id="enroll-phone" class="form-control" name="phone">

                         <span style="color:red"> <?php echo $phoneErr;?></span>
                    </div>

                    <div class="form-group field-enroll-email">
                        <label class="control-label" for="enroll-email">Էլ․ հասցե</label>
                        <input type="text" id="enroll-email" class="form-control" name="email" maxlength="70">

                        <span style="color:red"> <?php echo $emailErr;?></span>
                    </div>

                    <!-- Home Content End -->
                    <div class="form-group field-enroll-course_id required">
                        <label class="control-label" for="enroll-course_id">Մասնագիտացում</label>
                        <select id="enroll-course_id" class="form-control" name="course" onchange="
                            $.get(&quot;/frontend/web/dependent/getsubjects&quot;, { id: $(this).val() })
                                .done(function(data){
                                    $(&quot;#enroll-subject_ids&quot;).html( data );
                                });">
                            <option value="">Ո՞ր մասնագիտությանն եք ցանկանում տիրապետել</option>
                            <option value="Mobole Development">Mobile Development
                            </option>
                            <option value="Softweare Development">Softweare Development
                                </option>
                        </select>

                       
                    </div>
                    <div class="gitc_form-group ">
                        <button type="submit" class="send_button" name="submit">Գրանցվել</button>
                    </div>
                    </div>
        </form>
        <!--</div>-->
        
        
        <?php
        if(isset($_POST['submit'])){
            if($nameErr =="" && $surnameErr=="" && $emailErr == "" && $adrErr=="" && $phoneErr==""){
        
                $username = $_POST['username'];
                $surname = $_POST['surname'];
                $address = $_POST['address'];
                $dob = $_POST['dob'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $course=$_POST['course'];
          
                
                        $to = "gitcyerevan@gitc.am";
                        $subject = "Student application form";
                         $email_body = '
                		  <table cellpadding="5" border="1">
                		    <tr>
                		      <td>Name</td>
                		      <td>'.$username.'</td>
                		    </tr>
                		    <tr>
                		      <td>Surname</td>
                		      <td>'.$surname.'</td>
                		    </tr>
                		    <tr>
                		      <td>Address</td>
                		      <td>'.$address.'</td>
                		    </tr>
                		    <tr>
                		      <td>DOB</td>
                		      <td>'.$dob.'</td>
                		    </tr>
                		    <tr>
                		      <td>Phone Number</td>
                		      <td>'.$phone.'</td>
                		    </tr>
                		    <tr>
                		      <td>Email</td>
                		      <td>'.$email.'</td>
                		    </tr>
                		    <tr>
                		      <td>Course</td>
                		      <td>'. $course.'</td>
                		    </tr>
                		  
                		    
                		    
                		  </table>';
                
                    $headers = 'From:GITC <gitcyerevan@gitc.am>' . "\r\n" .
                'Reply-To: for you' . "\r\n" .
                'MIME-Version: 1.0' . "\r\n" .
                'Content-Type: text/html; charset=utf-8' . "\r\n" .
                'List-Unsubscribe: <mailto:gitcyerevan@gitc.am>' . "\r\n";
        
                    mail($to,$subject,$email_body,$headers);
            }   
        
        }
        ?>



    </article>

    
</section>