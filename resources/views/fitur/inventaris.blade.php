@extends('layouts.main');

@section('content')
    <div class="header">
        <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form" id="btn-inventaris">Pinjam Inventaris</button>
    </div>
    <div class="header-tittle">
        <h1 id="tittle">Peminjaman Inventaris</h1>
    </div>
    
    <div class="main">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="tb-tittle">Inventory Booking Lists</h4>
                        <h5 class="card-subtitle" id="tb-subtittle">Senin, 34 Desember 2022</h5>
                    </div>
                    <div class="card-content">

                        {{-- Tabel --}}
                        <div class="table-responsive">
                        
                            <table class="table mb-0 text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>NO</th>
                                        <th>TANGGAL PINJAM</th>
                                        <th>NAMA</th>
                                        <th>DEPARTEMEN</th>
                                        <th>KETERANGAN</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $penyewa = 2;
                                    for ($penyewa; $penyewa < 5; $penyewa++) { 
                                        # code...
                                    
                                    ?>
                                    <tr>
                                        <td class="text-bold-500"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#pengembalian">
                                            Kembalikan
                                        </button></td>
                                    </tr>
                                    
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                            
                        </div>
                   
                    </div>
                </div>
            </div>
        </div>

        
                        <!-- Modal -->
                        <div class="modal fade" id="form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Peminjaman Inventaris</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Name"
                                                                id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Departement</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="Department"
                                                                id="first-name-icon">
                                                            <div class="form-control-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard" viewBox="0 0 16 16">
                                                                    <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5ZM9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8Zm1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5Z"/>
                                                                    <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2ZM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96c.026-.163.04-.33.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1.006 1.006 0 0 1 1 12V4Z"/>
                                                                  </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Tanggal</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="position-relative">
                                                            <input type="date" class="form-control" placeholder="">
                                                            <div class="form-control-icon">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                                                    <path d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z"/>
                                                                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                                                                  </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Item Inventaris 1</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="input-group mb-3">
                                                            <select class="form-select" id="inputGroupSelect02">
                                                              <option selected>Choose...</option>
                                                              <option value="1">Proyektor</option>
                                                              <option value="2">Laptop</option>
                                                              <option value="3">Monitor</option>
                                                              <option value="4">Converter HDMI to VGA</option>
                                                              <option value="5">Converter VGA to HDMI</option>
                                                              <option value="6">Kabel HDMI</option>
                                                              <option value="7">Charger laptop</option>
                                                            </select>
                                                          </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Item Inventaris 2</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="input-group mb-3">
                                                            <select class="form-select" id="inputGroupSelect02">
                                                              <option selected>Choose...</option>
                                                              <option value="1">Proyektor</option>
                                                              <option value="2">Laptop</option>
                                                              <option value="3">Monitor</option>
                                                              <option value="4">Converter HDMI to VGA</option>
                                                              <option value="5">Converter VGA to HDMI</option>
                                                              <option value="6">Kabel HDMI</option>
                                                              <option value="7">Charger laptop</option>
                                                            </select>
                                                          </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Item Inventaris 3</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group has-icon-left">
                                                        <div class="input-group mb-3">
                                                            <select class="form-select" id="inputGroupSelect02">
                                                              <option selected>Choose...</option>
                                                              <option value="1">Proyektor</option>
                                                              <option value="2">Laptop</option>
                                                              <option value="3">Monitor</option>
                                                              <option value="4">Converter HDMI to VGA</option>
                                                              <option value="5">Converter VGA to HDMI</option>
                                                              <option value="6">Kabel HDMI</option>
                                                              <option value="7">Charger laptop</option>
                                                            </select>
                                                          </div>
                                                    </div>
                                                </div>
                                            
                                                
                                                <div class="col-12 d-flex justify-content-end">
                                                    
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            </div>
                        </div>

                       
                    
                        
                        <!-- Modal -->
                        <div class="modal fade" id="pengembalian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Apakah Anda Yakin Ingin Mengembalikan Inventaris?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <p>Pastikan inventaris yang anda pinjam tidak terdapat kerusakan dan masih berfungsi dengan baik. <br>
                                Kembalikan inventaris ke IT Behaestex dengan tepat waktu!</p>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="button" class="btn btn-primary">Kembalikan</button>
                                </div>
                            </div>
                            </div>
                        </div>
    </div>


@endsection