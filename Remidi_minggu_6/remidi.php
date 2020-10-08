<?php

$song = [
    ["Dan","Sheila on 7","Pop",1000000],
    ["Tentang Rindu","Virzha","Pop",1200000],
    ["Titip Rindu Buat Ayah","Ebiet G Ade","Pop",960000],
    ["Stay","Zedd","EDM",24000000],
    ["Silence","Marshmello","EDM",27000000],
    ["Sorry","Justin Bieber","R&B",29500000],
    ["Perfect","Ed Sheeran","Pop",34000000]
];

$temp_arr=[];

foreach ($song as $key) {
  // echo $key[2];
  $temp_arr[]=$key[2];
}

$temp_new=array_unique($temp_arr);

$show_song=[];
if (isset($_POST['filter'])) {
  $filter=$_POST['filter'];
  if ($filter=="") {
    $show_song=$song;
  }else {
    foreach ($song as $key) {
      if ($key[2]==$filter) {
        $show_song[]=[$key[0],$key[1],$key[2],$key[3]];
      }
    }
  }
}else {
  $show_song=$song;
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    <div class="row">
      <div class="col-12 d-flex">
        <h2 class="d-flex flex-column mx-auto">Musisi</h2>
      </div>
    <div class="col-12">
      <form action="remidi.php" method="post">
      <select name="filter" id="" class="w-75">
        <option value="">All</option>
      <?php foreach ($temp_new as $key) : ?>
        <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
      <?php endforeach; ?>
      </select>
      <input type="submit" value="filter">
      </form>
    </div>

    <table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col-3">Judul Lagu</th>
      <th scope="col-3">Penyanyi</th>
      <th scope="col-3">Genre</th>
      <th scope="col-3">Penjualan</th>
    </tr>
</thead>
<?php $grandTotal=0; ?>
<?php foreach ($show_song as $key) : ?>
  <tbody>
    <tr>
      <td class="lead"><?php echo $key[0]; ?></td>
      <td class="lead"><?php echo $key[1]; ?></td>
      <td class="lead"><?php echo $key[2]; ?></td>
      <td class="lead"><?php echo $key[3]; ?></td>
    </tr>
  </tbody>
  <?php $grandTotal+=$key[3]; ?>
  <?php endforeach; ?>
  <thead>
  <tr>
     <th></th>
     <th></th>
     <th scope="col">Total Penjualan Lagu : </th>
     <th scope="col"><?php echo $grandTotal; ?></th>
  </tr>
  </thead>
</table>


    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>