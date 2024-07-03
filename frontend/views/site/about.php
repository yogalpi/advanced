<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use frontend\assets\AppAsset;

$this->title = 'Katalog Buku';
$this->params['breadcrumbs'][] = $this->title;
AppAsset::register($this);

?>
<?php $this->head() ?>
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="#" class="logo">
                        <h1>Ferfustakaan</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li class="scroll-to-section"><?= Html::a('Beranda',['/site/index'])?></li>
                      <li class="scroll-to-section"><?= Html::a('Katalog Buku',['/site/about'], ['class' => 'active'])?></li>
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner" id="top">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <!-- <div class="search-input"> -->
            <fieldset class="d-flex flex-column align-items-center">  
              <p class="h1 text-white">Cari Buku</p>  
              <input class="form-control form-control-lg mt-3 p-3" type="text" placeholder="Judul Buku" id='cari_buku' name="cari">
              <!-- <div class="col-"> -->
                <button class="btn btn-light mt-4" id="button_cari">Cari Buku</button>
              <!-- </div> -->
            </fieldset>
          <!-- </div> -->
        </div>
      </div>
    </div>
  </div>
<div class="container my-5 d-flex justify-content-center">
    <div class="card col-10">
        <div class="card-body">
        <table class="table table-hover" id="tabel">
          <thead>
            <tr class="table-primary">
              <th scope="col">KODE BUKU</th>
              <th scope="col" class="col-5">JUDUL</th>
              <th scope="col">KATEGORI</th>
              <!-- <th scope="col">PENGARANG</th>
              <th scope="col">PENERBIT</th>
              <th scope="col">TAHUN TERBIT</th> -->
              <th scope="col">DETAIL</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex>
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Buku</h1>
        </div>
        <div class="modal-body d-flex justify-content-center flex-column align-items-center">
          <img id="img_sampul" src="" alt="Sampul Buku" style="width: 13vw;">
          <p class="h5 mt-3 text-center" id="judul"></p>
          <p class="text-center" id="kategori"></p>
          <div class="container">
            <p class="mt-3" id="penerbit"></p>
            <p class="" id="pengarang"></p>
            <p class="" id="thterbit"></p>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>
        </div>
    </div>
</div>
<?php 

$dataBuku = (new \yii\db\Query())->select(['*'])
                                ->from('buku')
                                ->all();
?>

  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2024 Ferfustakaan. All rights reserved. &nbsp;&nbsp;&nbsp;</p>
      </div>
    </div>
  </footer>

<script>
    let judul;
    let judulBuku;
    let kategoriBuku;
    let kodeBuku;
    let penerbitBuku;
    let pengarangBuku;
    let tahunTerbit;
    let cariJudul;
    let tombolDetail;
    let indexTable = 0;
    let i = 1;

    var input = document.getElementById("cari_buku");

    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("button_cari").click();
      }
    });


    cariJudul = document.getElementById('cari_buku').value;
        let dataBuku = <?= json_encode($dataBuku); ?>;
        let kd_buku;

        function detailBuku(kdBuku){
          kd_buku = kdBuku;

          dataBuku.forEach(findBuku);
          function findBuku(buku){
            let kode = buku.kd_buku;
            if(kode == kd_buku){

              kodeBuku         = buku.kd_buku;
              judulBuku        = buku.judul;
              kategoriBuku     = buku.kategori;
              penerbitBuku     = buku.penerbit;
              pengarangBuku    = buku.pengarang;
              tahunTerbit      = buku.tahun_terbit;
              sampul           = buku.sampul;

              document.getElementById('img_sampul').src = window.location.origin+'/advanced/backend/web/uploads/'+sampul;
              document.getElementById('judul').innerHTML = judulBuku;
              document.getElementById('kategori').innerHTML = kategoriBuku;
              document.getElementById('staticBackdropLabel').innerHTML = 'Detail Buku [ '+kodeBuku+' ]';
              document.getElementById('penerbit').innerHTML = '<strong>Penerbit</strong> : '+penerbitBuku;
              document.getElementById('pengarang').innerHTML = '<strong>Pengarang</strong> : '+pengarangBuku;
              document.getElementById('thterbit').innerHTML = '<strong>Tahun Terbit</strong> : '+tahunTerbit;
            }
        }
        }


          dataBuku.forEach(findBuku);
          function findBuku(buku){
            let judul = buku.judul;
            if(judul.includes(cariJudul)){

                  indexTable+=1;

                  kodeBuku         = buku.kd_buku;
                  judulBuku        = buku.judul;
                  kategoriBuku     = buku.kategori;
                  penerbitBuku     = buku.penerbit;
                  pengarangBuku    = buku.pengarang;
                  tahunTerbit      = buku.tahun_terbit;
                  sampul           = buku.sampul;

                  tombolDetail     = `<button type="button" value=${kodeBuku} id=sampul onclick="detailBuku(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Detail</button>`;


                  var tabel = document.getElementById('tabel');
                  var row = tabel.insertRow(1);
                  var cell1 = row.insertCell(0);
                  var cell2 = row.insertCell(1);
                  var cell3 = row.insertCell(2);
                  var cell4 = row.insertCell(3);
                  // var cell5 = row.insertCell(4);
                  // var cell6 = row.insertCell(5);
                  // var cell7 = row.insertCell(6);

                  cell1.innerHTML = kodeBuku;
                  cell2.innerHTML = judulBuku;
                  cell3.innerHTML = kategoriBuku;
                  // cell4.innerHTML = pengarangBuku;
                  // cell5.innerHTML = penerbitBuku;
                  // cell6.innerHTML = tahunTerbit;
                  cell4.innerHTML = tombolDetail;
              }
            }

    document.getElementById('button_cari').onclick = function(){
      if(document.getElementById('tabel').rows.length >= indexTable){
          // indexTable = 0;
          o = 1;
          for(i = 1; i <= indexTable; i++){
            document.getElementById('tabel').deleteRow(o);
          }
          indexTable = 0;
      }
      if(document.getElementById('cari_buku').value == '' && document.getElementById('tabel').rows.length < <?= json_encode($dataBuku); ?>.length){
        cariJudul = document.getElementById('cari_buku').value;
        let dataBuku = <?= json_encode($dataBuku); ?>;
          dataBuku.forEach(findBuku);
          function findBuku(buku){
            let judul = buku.judul;
            if(judul.includes(cariJudul)){

                  indexTable+=1;

                  judulBuku        = buku.judul;
                  kategoriBuku     = buku.kategori;
                  kodeBuku         = buku.kd_buku;
                  penerbitBuku     = buku.penerbit;
                  pengarangBuku    = buku.pengarang;
                  tahunTerbit      = buku.tahun_terbit;
                  tombolDetail     = `<button type="button" value=${kodeBuku} id=sampul onclick="detailBuku(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Detail</button>`;

                  var tabel = document.getElementById('tabel');
                  var row = tabel.insertRow(1);
                  var cell1 = row.insertCell(0);
                  var cell2 = row.insertCell(1);
                  var cell3 = row.insertCell(2);
                  // var cell4 = row.insertCell(3);
                  // var cell5 = row.insertCell(4);
                  // var cell6 = row.insertCell(5);
                  var cell4 = row.insertCell(3);

                  cell1.innerHTML = kodeBuku;
                  cell2.innerHTML = judulBuku;
                  cell3.innerHTML = kategoriBuku;
                  // cell4.innerHTML = pengarangBuku;
                  // cell5.innerHTML = penerbitBuku;
                  // cell6.innerHTML = tahunTerbit;
                  cell4.innerHTML = tombolDetail;
              }
            }
            
      }else{
        // console.log(indexTable);
      //   if(document.getElementById('tabel').rows.length >= indexTable){
      //     // indexTable = 0;
      //     o = 1;
      //     for(i = 1; i <= indexTable; i++){
      //       document.getElementById('tabel').deleteRow(o);
      //     }
      //     indexTable = 0;
      // }
        
      cariJudul = document.getElementById('cari_buku').value.toLowerCase();
        // console.log(cariJudul);
    
      let dataBuku = <?= json_encode($dataBuku); ?>;
      dataBuku.forEach(findBuku);
      function findBuku(buku){
      let judul = buku.judul.toLowerCase();
      if(judul.includes(cariJudul)){
            
            indexTable+=1;

            judulBuku        = buku.judul;
            kategoriBuku     = buku.kategori;
            kodeBuku         = buku.kd_buku;
            penerbitBuku     = buku.penerbit;
            pengarangBuku    = buku.pengarang;
            tahunTerbit      = buku.tahun_terbit;
            tombolDetail     = `<button type="button" value=${kodeBuku} id=sampul onclick="detailBuku(this.value)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Detail</button>`;

            console.log(judulBuku);
            var tabel = document.getElementById('tabel');
            var row = tabel.insertRow(1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            // var cell4 = row.insertCell(3);
            // var cell5 = row.insertCell(4);
            // var cell6 = row.insertCell(5);
            var cell4 = row.insertCell(3);

            cell1.innerHTML = kodeBuku;
            cell2.innerHTML = judulBuku;
            cell3.innerHTML = kategoriBuku;
            // cell4.innerHTML = pengarangBuku;
            // cell5.innerHTML = penerbitBuku;
            // cell6.innerHTML = tahunTerbit;
            cell4.innerHTML = tombolDetail;
        }
      }

      }

    }
    // console.log(indexTable)
</script>