<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css" media="screen">
    body {
  font-family: 'Source Sans Pro', sans-serif;
  background: url(https://subtlepatterns.com/patterns/wood_pattern.png);
}

h3 {
  padding-left: 20px;
  text-transform: uppercase;
}

.box {
  position: relative;
  margin: 20px;
  padding: 30px 10px 5px;
  width: 400px;
  min-height: 150px;
  border: 1px solid grey;
  border-radius: 3px;
  background: #fff;
}

.editable {
  border-color: #bd0f18;
  box-shadow: inset 0 0 10px #555;
  background: #f2f2f2;
}

.text {
  outline: none;
}

.edit, .save {
  width: 30px;
  display: block;
  position: absolute;
  top: 0px;
  right: 0px;
  padding: 4px 10px;
  border-top-right-radius: 2px;
  border-bottom-left-radius: 10px;
  text-align: center;
  cursor: pointer;
  box-shadow: -1px 1px 4px rgba(0,0,0,0.5);
}

.edit { 
  background: #557a11;
  color: #f0f0f0;
  opacity: 0;
  transition: opacity .2s ease-in-out;
}

.save {
  display: none;
  background: #bd0f18;
  color: #f0f0f0;
}

.calltext:hover .edit {
  opacity: 1;
}


.mybox {
  margin-top: 11px;
}

#calladdr:hover{
 opacity: 1;
 background-color: red;
}


  </style>
</head>
<body>

<!-- <span class="edit">edit</span>
<span class="save">save</span> -->


<!-- <div class="box"> -->
<letter class="mybox">
  <header>
    <address>
      
      <from>
        <name><?= $name ?></name>
        <street><?= $street ?></street>
        <city><?= $city ?></city>
        <?php if(!empty($country)): ?>
        <country><?= $country ?></country>
        <?php endif ?>
      </from>

      <!-- <text style="background-color: grey; text-align: center;" >OFFER LETTER</text> -->

      <to contenteditable="true" id="calladdr"><?= $placeholders['address'] ?></to>
    </address>
  </header>

  <main>
    <subject contenteditable="true" id="callsubj"><?= $placeholders['subject'] ?></subject>
    <date contenteditable="true" id="calldate"><?= $date ?></date>
    <text contenteditable="true" class="calltext" id="calltext"><?= $placeholders['text'] ?></text>
    <signature>
      <closing contenteditable><?= $closing ?></closing>
      <name contenteditable><?= $name ?></name>
      <?php if($signature): ?>
      <img src="<?= $signature ?>">
      <?php endif ?>
    </signature>


    <contact style="font-size: 16px;" >This is system generated Template</contact>
  </main>

  <footer>
    
    <address>
      <name><?= $name ?></name>
      <street><?= $street ?></street>
      <city><?= $city ?></city>
      <?php if(!empty($country)): ?>
      <country><?= $country ?></country>
      <?php endif ?>
    </address>
    
    <contact>
      
      <?php if(!empty($phone)): ?>
      <phone>
        <label><?= $labels['phone'] ?></label> <?= $phone ?>
      </phone>
      <?php endif ?>

      <?php if(!empty($mobile)): ?>
      <mobile>
        <label><?= $labels['mobile'] ?></label> <?= $mobile ?>
      </mobile>
      <?php endif ?>
      
      <?php if(!empty($email)): ?>
      <email>
        <label><?= $labels['email'] ?></label> <?= $email ?>
      </email>
      <?php endif ?>

      <?php if(!empty($website)): ?>
      <website>
        <label><?= $labels['website'] ?></label> <?= $website ?>
      </website>
      <?php endif ?>
    
    </contact>
    
    <?php if($bank !== false): ?>
    <bank>

      <?php if(!empty($bank)): ?>
      <name>
        <label><?= $labels['bank'] ?></label> <?= $bank ?>
      </name>
      <?php endif ?>

      <?php if(!empty($iban)): ?>
      <iban>
        <label><?= $labels['iban'] ?></label> <?= $iban ?>
      </iban>
      <?php endif ?>

      <?php if(!empty($bic)): ?>
      <bic>
        <label><?= $labels['bic'] ?></label> <?= $bic ?>
      </bic>
      <?php endif ?>

    </bank>
    <?php endif ?>

    <?php if(!empty($vatId) || !empty($taxId)): ?>
    <info>

      <?php if(!empty($vatId)): ?>
      <vatid>
        <label><?= $labels['vatId'] ?></label> <?= $vatId ?>
      </vatid>
      <?php endif ?>

      <?php if(!empty($taxId)): ?>
      <taxid>
        <label><?= $labels['taxId'] ?></label> <?= $taxId ?>
      </taxid>
      <?php endif ?>

    </info>
    <?php endif ?>





  </footer>
</letter>

<!-- </div> -->
<selectiontools id="selectiontools">
  <button id="btn-bold"><strong>B</strong></button>
  <button id="btn-italic"><em>I</em></button>
  <script src="app/js/selectiontools.js"></script>
</selectiontools>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript"> 
  $(document).ready(function() {

  $('.edit').click(function(){
    alert("test");
    $(this).hide();
    $('.box').addClass('editable');
    $('.text').attr('contenteditable', 'true');  
    $('.save').show();
  });

  $('.save').click(function(){
    alert("test");
    $(this).hide();
    $('.box').removeClass('editable');
    $('.text').removeAttr('contenteditable');
    $('.edit').show();
  });
    
    /*$('#calladdr').on('keyup', function(event) {

      var myTxt = $('#callsubj').html();
      var contenteditable = document.querySelector('[contenteditable]'),
      text = contenteditable.textContent;
      console.log('loaded'+text);
    
    
        // callsubj
        // calldate
        // calltext
    
        var name = $('#calladdr').val(); 
        var dataString = 'header_name='+text+'&text='+text;
        $.ajax({
        type:'POST',
        data: dataString,
        url:'app/save_addr.php',
        success:function(data) {
            alert(data);
        }
        });
    });  */



// $('#calltext').on('keyup', function(event) {
//     let conattr = $(this).attr('contenteditable');
//     header_body = conattr.textContent; 
//     console.log('loaded'+header_body);     

//         var dataString = 'header_body='+conattr;
//         $.ajax({
//         type:'POST',
//         data: dataString,
//         url:'app/save_addr.php',
//         success:function(data) {
//             alert(data);
//         }
//         });
//     }); 



  });  
</script>
</body>
</html>




