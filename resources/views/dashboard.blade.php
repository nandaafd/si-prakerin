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
                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="date" class="validate[required] form-control" id="date" name="date" required/>
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
                                <input type="hidden" id="wokikppc" name="wokikppc">
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
    
        // function gen_dbf_by_tanggal(params) {       
        //     if(params === 'dbf_wokikppc'){
        //     url = "{{ url('/dbf_wokikppc') }}";
        //     }
        //     var form_dt = $('#form_date').serialize();
        //     var date_param = $('#date').val();
        //     // var formData = new FormData();
        //     // formData.append('tanggal', $('#date').val());
        // console.log(date_param);
        // $.ajax({
        //     url: url,
        //     data: {'tgl' : date_param, 
        //     '_token' : "{{ csrf_token() }}"
        //     },
        //     dataType: 'json',
        //     processData: false,
        //     contentType: false,
        //     type: 'GET',
        //     success: function (data) {
        //         console.log(data);
        //         if(data.status===true){
        //             alert("Berhasil dijalankan dan Sukses !");
        //         }else{
        //             alert("Ada Kesalahan Program!!");
        //         }
        //     },
        //     error: function (jqXHR, textStatus, errorThrown, json)
        //     {
        //         console.log(textStatus);
        //         alert("Gagal diupdate!");

        //     }
        // });
        // }
    </script>

    <script>
        let select = document.querySelector('#date');
        let result = document.getElementById('wokikppc');
        select.addEventListener('change', function() {
            result.value = this.value;
        });
    </script>
@endpush
