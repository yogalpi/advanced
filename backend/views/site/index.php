<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<?php 
$date = date("m");

$peminjaman = (new \yii\db\Query())->select(['COUNT(*) AS jumlah'])
                                ->from('peminjaman')
                                ->where(['MONTH(tanggal_pinjam)' => $date])
                                ->all();
$pengembalian = (new \yii\db\Query())->select(['COUNT(*) AS jumlah'])
                                ->from('pengembalian')
                                ->where(['MONTH(tanggal_kembali)' => $date])
                                ->all();
// dd($peminjaman);
?>

            <div class="container flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-5">
                        <div class="card-body">
                          <div class="card overflow-hidden">
                            <div class="card-body p-4">
                              <h4 class="card-title text-dark mb-9 fw-semibold">Transaksi Peminjaman</h4>
                              <div class="row align-items-center">
                                <div class="col-8">
                                  <div class="d-flex align-items-end mb-3">
                                      <button class="btn btn-primary me-3"><i class="fa-solid fa-arrow-up-from-bracket fa-xl p-2"></i><?= $peminjaman[0]['jumlah'];?></button>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="d-flex justify-content-center">
                                    <div id="breakup"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <div class="card-body">
                          <div class="card overflow-hidden">
                            <div class="card-body p-4">
                              <h4 class="card-title text-dark mb-9 fw-semibold">Transaksi pengembalian</h4>
                              <div class="row align-items-center">
                                <div class="col-8">
                                  <div class="d-flex align-items-end mb-3">
                                      <button class="btn btn-primary me-3"><i class="fa-solid fa-inbox fa-xl p-2"></i><?= $pengembalian[0]['jumlah'];?></button>
                                  </div>
                                </div>
                                <div class="col-4">
                                  <div class="d-flex justify-content-center">
                                    <div id="breakup"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>


            <div class="content-backdrop fade"></div>
