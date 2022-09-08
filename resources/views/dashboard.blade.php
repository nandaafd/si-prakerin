@extends('layout.main')



@section('content')

<div class="page-heading">
    <h3>Bridge List</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Bridge
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- <form action="" id="form_date" method="post"> --}}
                        <div class="row">
                            {{-- <div class="col-md-3">
                              <div class="form-group">
                                <input type="date" class="validate[required] form-control" id="date" name="date" required/>
                            </div> --}}
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select name="bulan" id="bulan" class="form-control" required>
                                        <option value="" disabled selected>Pilih Bulan</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Febuari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <?php
                                    $now=date('Y');
                                    $ymin=$now-4;
                                    echo "<select name='tahun' id='tahun' class=form-control required>";
                                    echo "<option value='' disabled selected>Pilih Tahun</option>";
                                    for($a=$now;$a>=$ymin;--$a)
                                    {
                                    echo "<option value='$a'>$a</option>";
                                    }
                                    echo "</select>";
                                ?>
                                </div>
                            </div>
                        </div>
                        <tr>
                            {{-- Firman Edit on 31 Agustus 2022 --}}
                            <td>1</td>
                            <td>Generate Data KIKPPC</td>
                            <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, quas?</td>
                            <td>
                            <form action="{{ url('/dbf_wokikppc') }}">
                                @csrf
                                <input type="hidden" id="bulan2" name="bulan2">
                                <input type="hidden" id="tahun2" name="tahun2">
                                <button class="btn icon icon-left btn-success" type="submit"><i class="bi bi-list"></i> Generate </button>
                            </form>
                            </td>
                        </tr>
                    {{-- </form> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>


@endsection

@push('js')
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script>
        let select = document.querySelector('#bulan');
        let select2 = document.querySelector('#tahun');
        let result = document.getElementById('bulan2');
        let result2 = document.getElementById('tahun2');
        select.addEventListener('change', function() {
            result.value = this.value;
        });
        select2.addEventListener('change', function() {
            result2.value = this.value;
        });
    </script>
@endpush
