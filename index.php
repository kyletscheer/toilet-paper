<?php include 'header.php'; ?>
</head>
<body>
<?php include 'nav.php'; ?>
  <!-- Page Content -->
  <div class="container" style="padding-top:50px">
<?php
if ($_POST){
$y = $_POST["yVal"];
$a = $_POST["aVal"];
$b = $_POST["bVal"];
}
else {}
?>
<h6><i>This website was made with a specific purpose.</i></h6><h1>Stop the toilet paper lies.</h1><br>
<a href="https://kyletscheer.medium.com/your-toilet-paper-is-lying-to-you-c7a360fecacc" target="_blank">Your toilet paper is lying to you.</a> Use the tool below to find the truth.<br>
<form action="index.php" method="post">
<br>
<table>
<tr><td>
% of toilet paper you want left (usually .5 or 50%):</td><td><input type="number" step="0.01" placeholder="decimal from 0-1" id="yVal" name="yVal" style="width:200px" value="<?php echo $y;?>" max="1" min="0"></td></tr>
<tr><td>
Diameter of toilet paper:</td><td><input type="number" step="0.01" placeholder="decimals or integers only" style="width:200px" id="aVal" class="aVal" name="aVal" value="<?php echo $a;?>"></td></tr>
<tr><td>
Diameter of inner tube:</td><td><input type="number" step="0.01" placeholder="decimals or integers only" style="width:200px" id="bVal" class="bVal" name="bVal" value="<?php echo $b;?>"></td>
</table>
<i>Note: Inner tube diameter can't be more that toilet paper diameter</i>
<br><br><input value="Find the Truth" type="submit">
<br><br>
<?php
if ($_POST){
$pi = 3.14159265359;
$diameter = 2 * sqrt((((($pi*(($a/2)**2))-($pi*(($b/2)**2)))/(1/$y))+($pi*(($b/2)**2)))/$pi);
$diameter = round($diameter, 3);
$distancefromtube = ($diameter - $b)/2;
$percentage = round(((1-($a-$diameter)/($a-$b))*100),3);
echo "<h5>The diameter of " . round($y,2)*100 . "% of the toilet paper left is <b>$diameter</b>. That is a distance of $distancefromtube from the edge of the toilet paper. This is equivalent to $percentage% of the distance from the edge of the cardboard to the edge of the full toilet paper.</h5>";
?>
<br><br>
<h2>A visual of the toilet paper.</h2>
<br>
<div class="row">
<div class="col-md-4">
<div class="visual" style="text-align: center;">
<span class="background"><span class="whole"><span class="midpoint"><span class="tube"></span></span></span></span>
<!--<div class="wholelength"><?php echo $a;?></div>
<div class="midpointlength"><?php echo $diameter;?></div>
<div class="tubelength"><?php echo $b;?></div>
<div class="line"></div>-->
</div>
</div>
</div>
<?php
$midpointsize = ($diameter/$a)*200;
$midpointoffset = (200-$midpointsize)/2;
$tubesize = ($b/$a)*200;
$tubeoffset = ($midpointsize-$tubesize)/2-2;
}
else {
}
?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--
<script>
$('.bVal').change(function(){
  checkValue();
});

$('.aVal').change(function(){
  checkValue();
});

function checkValue(){
  var maxValue = $('.aVal').val();
  if(maxValue > 0 && $('.bVal').val() > maxValue){
    $('.bVal').val(maxValue);
  }
}
</script>
-->
<style>
.background {
  position: absolute;
  left: 0px;
  top: 0px;
  height: 210px;
  width: 210px;
  background-color: black;
  display: inline-block;
  color: white;
}
.line {
  position: absolute;
  left: 5px;
  top: 106px;
  height: 2px;
  width: 200px;
  background-color: black;
  display: inline-block;
  color: white;
}
.whole {
  position: absolute;
  left: 5px;
  top: 5px;
  height: 200px;
  width: 200px;
  background-color: #fff;
  border-radius: 50%;
  display: inline-block;
  align-items: center;
  text-align: center;
}
.midpoint {
  position: absolute;
  left: <?php echo $midpointoffset;?>px;
  top: <?php echo $midpointoffset;?>px;
  height: <?php echo $midpointsize;?>px;
  width: <?php echo $midpointsize;?>px;
  background-color: #fff;
  border-radius: 50%;
  border: 2px dotted black;
  display: inline-block;
}

.tube {
  position: absolute;
  left: <?php echo $tubeoffset;?>px;
  top: <?php echo $tubeoffset;?>px;
  height: <?php echo $tubesize;?>px;
  width: <?php echo $tubesize;?>px;
  background-color: #a3733c;
  border-radius: 50%;
  display: inline-block;
}
.wholelength {
  position: absolute;
  top: 85px;
  left: 16px;
}
.midpointlength {
  position: absolute;
  top: 85px;
  left: <?php echo 50;?>px;
}
.tubelength {
  position: absolute;
  top: 85px;
  left: 100px;
}
</style>
  </div>
  <div style="height:150px">
  </div>
<?php include 'footer.php'; ?>