<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD menggunakan LIVEWIRE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @livewireStyles
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">CRUD dengan Livewire</a>
        </div>
    </nav>

    <div class="container">
        @php
            $activeTab = session('activeTab', 'mahasiswa');
        @endphp

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $activeTab == 'mahasiswa' ? 'active' : '' }}" id="mahasiswa-tab" href="{{ url('/tab/mahasiswa') }}" role="tab" aria-controls="mahasiswa" aria-selected="{{ $activeTab == 'mahasiswa' ? 'true' : 'false' }}">Mahasiswa</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $activeTab == 'dosen' ? 'active' : '' }}" id="dosen-tab" href="{{ url('/tab/dosen') }}" role="tab" aria-controls="dosen" aria-selected="{{ $activeTab == 'dosen' ? 'true' : 'false' }}">Dosen</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $activeTab == 'makul' ? 'active' : '' }}" id="makul-tab" href="{{ url('/tab/makul') }}" role="tab" aria-controls="makul" aria-selected="{{ $activeTab == 'makul' ? 'true' : 'false' }}">Makul</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade {{ $activeTab == 'mahasiswa' ? 'show active' : '' }}" id="mahasiswa" role="tabpanel" aria-labelledby="mahasiswa-tab">
                @livewire('mahasiswa')
            </div>
            <div class="tab-pane fade {{ $activeTab == 'dosen' ? 'show active' : '' }}" id="dosen" role="tabpanel" aria-labelledby="dosen-tab">
                @livewire('dosen')
            </div>
            <div class="tab-pane fade {{ $activeTab == 'makul' ? 'show active' : '' }}" id="makul" role="tabpanel" aria-labelledby="makul-tab">
                @livewire('makul')
            </div>
        </div>
    </div>

    @livewireScripts
</body>

</html>
