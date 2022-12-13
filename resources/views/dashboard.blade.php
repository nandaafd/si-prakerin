@extends('layouts.main')

@section('content')
<div style="display:flex; flex-direction: row; justify-content: space-between;">
    <div class="page-heading">
        <h3>Bridge List</h3>
    </div>

    {{-- HIDUPKAN APABILA BUTUH LOGOUT --}}
    {{-- <div>
        <p>{{ Auth::user()->name }}
            (
            <u>
                <a href="{{ route('logout') }}"
                    style="color:red"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> {{ __('Logout') }}
                </a>
            </u>
            )
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </p>
    </div> --}}
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Dashboard
            </div>
            
        </div>
    </section>
</div>


@endsection

@push('js')
    
@endpush