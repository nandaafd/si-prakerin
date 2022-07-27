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
                      
                        <tr>
                            <td>1</td>
                            <td>Generate Data Siswa</td>
                            <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ratione, quas?</td>
                            <td>
                              <a href="/generate_siswa" class="btn icon icon-left btn-success"><i class="bi bi-list"></i>
                              Success</a>
                            </td>
                        </tr>
                      
                        
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
@endpush
